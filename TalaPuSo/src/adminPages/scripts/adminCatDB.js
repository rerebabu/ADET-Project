document.addEventListener("DOMContentLoaded", () => {
  const addButton = document.querySelector(".addButton");
  const formModal = document.querySelector(".formModal");
  const cancelButton = document.getElementById("cancelButton");

  // Show form modal when + button is clicked
  addButton.addEventListener("click", () => {
    formModal.classList.remove("hidden");
  });

  // Hide form modal when Cancel button is clicked
  cancelButton.addEventListener("click", () => {
    formModal.classList.add("hidden");
  });

  // Hide form modal when clicking outside the form
  formModal.addEventListener("click", (event) => {
    if (event.target === formModal) {
      formModal.classList.add("hidden");
    }
  });
});
