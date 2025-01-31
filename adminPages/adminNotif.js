document.addEventListener("DOMContentLoaded", () => {
    
    const tabs = document.querySelectorAll('.tab-link');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            const sectionId = tab.getAttribute('data-section');
            document.getElementById(sectionId).classList.add('active');
        });
    });

    
    const notifCards = document.querySelectorAll(".notifCard");
    const popup = document.getElementById("popup");
    const reportDetails = document.getElementById("reportDetails");
    const closeBtn = document.querySelector(".closeBtn");
    const acceptBtn = document.querySelector(".acceptBtn");
    const rejectBtn = document.querySelector(".rejectBtn");

    notifCards.forEach(card => {
        card.addEventListener("click", () => {
            const name = card.querySelector(".Name").innerText;
            const category = card.querySelector(".caseCategory").innerText;
            reportDetails.innerText = `${name} reported a case: ${category}`;
            popup.style.display = "flex";
        });
    });

    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });

    acceptBtn.addEventListener("click", () => {
        alert("Report Accepted!");
        popup.style.display = "none";
    });

    rejectBtn.addEventListener("click", () => {
        alert("Report Rejected!");
        popup.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });
});
