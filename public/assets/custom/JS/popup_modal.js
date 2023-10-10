const modal = document.getElementById("modal");
const confirmationDialog = document.getElementById("confirmationDialog");

document.getElementById("openModalBtn").addEventListener("click", function () {
    modal.style.display = "block";
});

document.getElementById("closeModalBtn").addEventListener("click", function () {
    confirmationDialog.style.display = "block";
});

document.getElementById("modal").addEventListener("click", function (event) {
    if (event.target === this) {
        confirmationDialog.style.display = "block";
    }
});

document
    .getElementById("cancelConfirmBtn")
    .addEventListener("click", function () {
        confirmationDialog.style.display = "none";
    });

document
    .getElementById("confirmChangesBtn")
    .addEventListener("click", function () {
        modal.style.display = "none";
        confirmationDialog.style.display = "none";
    });

//   Form submission

// document
//     .getElementById("editForm")
//     .addEventListener("submit", function (event) {
//         event.preventDefault();
//         // your code here for form submission
//
//         modal.style.display = "none";
//     });

