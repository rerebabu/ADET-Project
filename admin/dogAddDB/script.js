let isEditingBasicInfo = false; // Track whether the user is editing Basic Info
let isEditingSpayVaccination = false; // Track whether the user is editing Spay/Neuter or Vaccination
let currentEntry = null; // Track the entry being edited for Spay/Neuter and Vaccination

// Function to handle Basic Information editing
document.querySelector('.editInput').addEventListener('click', function () {
    const nameInput = document.getElementById('animalName');
    const breedInput = document.getElementById('animalBreed');
    const ageInput = document.getElementById('animalAge');
    const bdayInput = document.getElementById('animalBday');
    const genderInput = document.getElementById('animalGender');

    // Toggle between editable fields and static display
    if (isEditingBasicInfo) {
        // Save changes if editing
        const name = nameInput.value.trim();
        const breed = breedInput.value.trim();
        const age = ageInput.value.trim();
        const bday = bdayInput.value.trim();
        const gender = genderInput.value.trim();

        if (name && breed && age && bday && gender) {
            // Update the fields with new values
            document.querySelector('.nameClass input').value = name;
            document.querySelector('.breedRow input').value = breed;
            document.querySelector('.ageRow input').value = age;
            document.querySelector('.bdayRow input').value = bday;
            document.querySelector('.genderRow select').value = gender;
        }
    }

    // Toggle the edit mode for Basic Info
    isEditingBasicInfo = !isEditingBasicInfo;

    // Enable or disable the input fields based on edit mode for Basic Info
    nameInput.disabled = !isEditingBasicInfo;
    breedInput.disabled = !isEditingBasicInfo;
    ageInput.disabled = !isEditingBasicInfo;
    bdayInput.disabled = !isEditingBasicInfo;
    genderInput.disabled = !isEditingBasicInfo;

});

function editEntry() {
    if (isEditingSpayVaccination && currentEntry) {
        // Remove existing buttons to prevent duplicate actions
        const editBtn = currentEntry.querySelector('.editBtn');
        const removeBtn = currentEntry.querySelector('.removeBtn');
        editBtn.remove();
        removeBtn.remove();

        const currentStatus = currentEntry.textContent.split(": ")[1].trim();
        const inputFieldsWrapper = document.createElement('div');
        inputFieldsWrapper.classList.add('inputFieldsWrapper');

        let inputFields = [];
        let isVaccination = currentStatus.includes(' - ');  // Check if it's a vaccination entry

        if (isVaccination) {
            const [vaccinationType, vaccinationDate] = currentStatus.split(' - ');

            const vaccinationTypeField = document.createElement('input');
            vaccinationTypeField.setAttribute('type', 'text');
            vaccinationTypeField.setAttribute('value', vaccinationType);
            vaccinationTypeField.classList.add('inputField');
            inputFields.push(vaccinationTypeField);

            const vaccinationDateField = document.createElement('input');
            vaccinationDateField.setAttribute('type', 'date');
            vaccinationDateField.setAttribute('value', vaccinationDate);
            vaccinationDateField.classList.add('inputField');
            inputFields.push(vaccinationDateField);
        } else {
            const dateField = document.createElement('input');
            dateField.setAttribute('type', 'date');
            dateField.setAttribute('value', currentStatus);
            dateField.classList.add('inputField');
            inputFields.push(dateField);
        }

        inputFields.forEach(field => inputFieldsWrapper.appendChild(field));

        const submitButton = document.createElement('button');
        submitButton.textContent = 'Update';
        submitButton.classList.add('submitBtn');
        
        inputFieldsWrapper.appendChild(submitButton);
        currentEntry.appendChild(inputFieldsWrapper);

        // When the submit button is clicked, update the entry
        submitButton.addEventListener('click', function () {
            let updatedStatus = '';
            
            if (isVaccination) {
                const vaccinationType = inputFields[0].value.trim();
                const vaccinationDate = inputFields[1].value.trim();
                if (vaccinationType && vaccinationDate) {
                    updatedStatus = `${vaccinationType} - ${vaccinationDate}`;
                }
            } else {
                const date = inputFields[0].value.trim();
                if (date) {
                    updatedStatus = date;
                }
            }

            if (updatedStatus) {
                // Update the entry's text content
                currentEntry.textContent = `${isVaccination ? 'Vaccination' : 'Spay/Neuter'}: ${updatedStatus}`;

                // Re-attach the Edit and Remove buttons after updating
                const editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.classList.add('editBtn');
                currentEntry.appendChild(editButton);

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.classList.add('removeBtn');
                currentEntry.appendChild(removeButton);

                // Add event listeners to the re-added buttons
                removeButton.addEventListener('click', function () {
                    currentEntry.remove(); // Properly remove the entry
                });

                // Remove the input fields and submit button after updating
                inputFieldsWrapper.remove();
                
                isEditingSpayVaccination = false;
            }
        });
    }
}
// Function to add entry (for Spay/Neuter and Vaccination)
function addEntry(rowSelector, displaySelector, placeholderText, isVaccination = false) {
    document.querySelector(rowSelector).querySelector('.addBtn').addEventListener('click', function () {
        // If we are not editing, allow adding a new entry
        if (!isEditingSpayVaccination) {
            const inputFieldsWrapper = document.createElement('div');
            inputFieldsWrapper.classList.add('inputFieldsWrapper');

            // Create input fields (type + date for vaccination)
            let inputFields = [];
            if (isVaccination) {
                const vaccinationTypeField = document.createElement('input');
                vaccinationTypeField.setAttribute('type', 'text');
                vaccinationTypeField.setAttribute('placeholder', 'Type of Vaccination');
                vaccinationTypeField.classList.add('inputField');
                inputFields.push(vaccinationTypeField);

                const vaccinationDateField = document.createElement('input');
                vaccinationDateField.setAttribute('type', 'date');
                vaccinationDateField.classList.add('inputField');
                inputFields.push(vaccinationDateField);
            } else {
                const dateField = document.createElement('input');
                dateField.setAttribute('type', 'date');
                dateField.setAttribute('placeholder', placeholderText);
                dateField.classList.add('inputField');
                inputFields.push(dateField);
            }

            // Add input fields to wrapper
            inputFields.forEach(field => inputFieldsWrapper.appendChild(field));

            // Create the submit button
            const submitButton = document.createElement('button');
            submitButton.textContent = 'Submit';
            submitButton.classList.add('submitBtn');
            
            inputFieldsWrapper.appendChild(submitButton);

            const row = document.querySelector(rowSelector);
            row.appendChild(inputFieldsWrapper);

            // Submit the entry when clicked
            submitButton.addEventListener('click', function () {
                let statusText = '';
                
                if (isVaccination) {
                    const vaccinationType = inputFields[0].value.trim();
                    const vaccinationDate = inputFields[1].value.trim();
                    if (vaccinationType && vaccinationDate) {
                        statusText = `${vaccinationType} - ${vaccinationDate}`;
                    }
                } else {
                    const date = inputFields[0].value.trim();
                    if (date) {
                        statusText = date;
                    }
                }

                if (statusText) {
                    // Create a new status entry
                    const newEntry = document.createElement('div');
                    newEntry.classList.add('addedItem');
                    newEntry.textContent = `${placeholderText}: ${statusText}`;

                    // Add edit and remove buttons to the entry
                    const editButton = document.createElement('button');
                    editButton.textContent = 'Edit';
                    editButton.classList.add('editBtn');
                    newEntry.appendChild(editButton);

                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Remove';
                    removeButton.classList.add('removeBtn');
                    newEntry.appendChild(removeButton);

                    // Append the new entry to the respective display section
                    document.querySelector(displaySelector).appendChild(newEntry);

                    // Add event listener to edit button
                    editButton.addEventListener('click', function () {
                        isEditingSpayVaccination = true;
                        currentEntry = newEntry;
                        editEntry(); // Activate edit mode for Spay/Neuter or Vaccination
                    });

                    // Add event listener to remove button
                    removeButton.addEventListener('click', function () {
                        currentEntry = newEntry;
                        newEntry.remove(); // This will properly remove the entry
                    });
                }

                // Remove the input fields and submit button after submitting
                inputFieldsWrapper.remove();
            });
        }
    });
}
// Initialize the addEntry function for Spay/Neuter and Vaccination Records
addEntry('.spayRow', '.displaySpay', 'Spay/Neuter Status');
addEntry('.vaccinationRow', '.displayVaccination', 'Vaccination Record', true);

document.addEventListener("DOMContentLoaded", () => {
    
    const profilePicOverlay = document.getElementById("profilePicOverlay");
    const uploadPicBtn = document.querySelector(".uploadPicBtn");
    const closeProfilePicOverlay = document.querySelector(".closeprofilePicOverlay");

    uploadPicBtn.addEventListener("click", () => {
        profilePicOverlay.style.display = "flex";
    });

    closeProfilePicOverlay.addEventListener("click", () => {
        profilePicOverlay.style.display = "none";
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const profilePicInput = document.getElementById("profilePic");
    const previewImage = document.getElementById("previewImage");
    const previewContainer = document.getElementById("previewContainer");

    profilePicInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
            previewImage.src = "";
        }
    });
});
