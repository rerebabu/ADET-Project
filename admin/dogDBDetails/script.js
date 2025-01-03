function toggleEdit() {
    const editSaveBtn = document.getElementById("editSaveBtn");
    const inputs = document.querySelectorAll("input, select");
    const addButtons = document.querySelectorAll(".addBtn");
    const editProfilePictureBtn = document.getElementById("editProfilePictureBtn");

    if (editSaveBtn.textContent.toLowerCase() === "edit") {
       
        inputs.forEach(input => input.disabled = false);
        addButtons.forEach(button => button.disabled = false);
        editProfilePictureBtn.hidden = false; 
        editSaveBtn.textContent = "save";
    } else {
        
        inputs.forEach(input => input.disabled = true);
        addButtons.forEach(button => button.disabled = true);
        editProfilePictureBtn.hidden = true; 
        editSaveBtn.textContent = "edit";
    }
}

document.addEventListener("DOMContentLoaded", () => {
    
    const profilePicOverlay = document.getElementById("profilePicOverlay");
    const editProfilePictureBtn = document.querySelector(".editProfilePictureBtn");
    const closeProfilePicOverlay = document.querySelector(".closeprofilePicOverlay");

    editProfilePictureBtn.addEventListener("click", () => {
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


document.addEventListener("DOMContentLoaded", () => {
    const inputs = document.querySelectorAll("input, select");
    const addButtons = document.querySelectorAll(".addBtn");
    inputs.forEach(input => input.disabled = true);
    addButtons.forEach(button => button.disabled = true);
});

let isEditingSpayVaccination = false; 
let currentEntry = null; 

function editEntry() {
    if (currentEntry) {
        const editBtn = currentEntry.querySelector('.editBtn');
        const removeBtn = currentEntry.querySelector('.removeBtn');
        editBtn.remove();
        removeBtn.remove();

        const currentStatus = currentEntry.textContent.split(": ")[1].trim();
        const inputFieldsWrapper = document.createElement('div');
        inputFieldsWrapper.classList.add('inputFieldsWrapper');

        let inputFields = [];
        let isVaccination = currentStatus.includes(' - '); 

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

        const updateButton = document.createElement('button');
        updateButton.textContent = 'Update';
        updateButton.classList.add('updateBtn');

        inputFieldsWrapper.appendChild(updateButton);
        currentEntry.appendChild(inputFieldsWrapper);

        updateButton.addEventListener('click', function () {
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
                currentEntry.textContent = `${isVaccination ? 'Vaccination' : 'Spay/Neuter'}: ${updatedStatus}`;

                const editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.classList.add('editBtn');
                currentEntry.appendChild(editButton);

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.classList.add('removeBtn');
                currentEntry.appendChild(removeButton);

                editButton.addEventListener('click', function () {
                    isEditingSpayVaccination = true;
                    currentEntry = currentEntry;
                    editEntry();
                });

                removeButton.addEventListener('click', function () {
                    currentEntry.remove();
                });

                inputFieldsWrapper.remove(); 
                isEditingSpayVaccination = false;
            }
        });
    }
}

function addEntry(rowSelector, displaySelector, placeholderText, isVaccination = false) {
    document.querySelector(rowSelector).querySelector('.addBtn').addEventListener('click', function () {
        const inputFieldsWrapper = document.createElement('div');
        inputFieldsWrapper.classList.add('inputFieldsWrapper');

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

        inputFields.forEach(field => inputFieldsWrapper.appendChild(field));

        const submitButton = document.createElement('button');
        submitButton.textContent = 'Submit';
        submitButton.classList.add('submitBtn');
        inputFieldsWrapper.appendChild(submitButton);

        const row = document.querySelector(rowSelector);
        row.appendChild(inputFieldsWrapper);

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
                const newEntry = document.createElement('div');
                newEntry.classList.add('addedItem');
                newEntry.textContent = `${placeholderText}: ${statusText}`;

                const editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.classList.add('editBtn');
                newEntry.appendChild(editButton);

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.classList.add('removeBtn');
                newEntry.appendChild(removeButton);

                document.querySelector(displaySelector).appendChild(newEntry);

                editButton.addEventListener('click', function () {
                    isEditingSpayVaccination = true;
                    currentEntry = newEntry;
                    editEntry();
                });

                removeButton.addEventListener('click', function () {
                    newEntry.remove();
                });
            }

            inputFieldsWrapper.remove(); 
        });
    });
}

addEntry('.spayRow', '.displaySpay', 'Spay/Neuter Status');
addEntry('.vaccinationRow', '.displayVaccination', 'Vaccination Record', true);
