/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

// // Auto-hide success message after 5 seconds
// setTimeout(() => {
//     const successAlert = document.getElementById("success-alert");
//     if (successAlert) {
//         successAlert.style.display = "none";
//     }
// }, 3000);

// // Auto-hide error message after 5 seconds
// setTimeout(() => {
//     const errorAlert = document.getElementById("error-alert");
//     if (errorAlert) {
//         errorAlert.style.display = "none";
//     }
// }, 3000);

const successToast = document.getElementById("success-toast");
const errorToast = document.getElementById("error-toast");

// Initialize Bootstrap toasts
if (successToast) {
    const toast = new bootstrap.Toast(successToast);
    toast.show();

    // Auto-hide after 5 seconds
    setTimeout(() => {
        toast.hide();
    }, 3000);
}

if (errorToast) {
    const toast = new bootstrap.Toast(errorToast);
    toast.show();

    // Auto-hide after 5 seconds
    setTimeout(() => {
        toast.hide();
    }, 3000);
}
