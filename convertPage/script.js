document.addEventListener("DOMContentLoaded", () => {
    const catOverlay = document.getElementById("catOverlay");
    const dogOverlay = document.getElementById("dogOverlay");
    const feedbackOverlay = document.getElementById("feedbackOverlay");

    const catBtn = document.querySelector(".catBtn");
    const dogBtn = document.querySelector(".dogBtn");
    const vetMedBtn = document.querySelector(".vetMedBtn");
    const petFoodBtn = document.querySelector(".petFoodBtn");
    const petSuppliesBtn = document.querySelector(".petSuppliesBtn")

    const closeCatBtn = document.querySelector(".closeCatOverlay");
    const closeDogBtn = document.querySelector(".closeDogOverlay");
    const closefeedbackBtn = document.querySelector(".closefeedbackOverlay");

    catBtn.addEventListener("click", () => {
        catOverlay.style.display = "flex";
    });

    dogBtn.addEventListener("click", () => {
        dogOverlay.style.display = "flex";
    });

    vetMedBtn.addEventListener("click", () => {
        feedbackOverlay.style.display = "flex";
    });

    petFoodBtn.addEventListener("click", () => {
        feedbackOverlay.style.display = "flex";
    });

    petSuppliesBtn.addEventListener("click", () => {
        feedbackOverlay.style.display = "flex";
    });

    closeCatBtn.addEventListener("click", () => {
        catOverlay.style.display = "none";
    });

    closeDogBtn.addEventListener("click", () => {
        dogOverlay.style.display = "none";
    });

    closefeedbackBtn.addEventListener("click", () => {
        feedbackOverlay.style.display = "none";
    });
});
