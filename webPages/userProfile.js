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
