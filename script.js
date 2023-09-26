// const menuList = document.querySelector('.menu-list');

// menuList.addEventListener('click', (event) => {
//     const clickedToggle = event.target.closest('.submenu > a');
    
//     if (clickedToggle) {
//         event.preventDefault();
        
//         const clickedSubMenu = clickedToggle.nextElementSibling;
        
//         // Close all other sub-menus
//         const allSubMenus = document.querySelectorAll('.sub-menu');
//         allSubMenus.forEach(subMenu => {
//             if (subMenu !== clickedSubMenu) {
//                 subMenu.classList.remove('active');
//             }
//         });

//         // Toggle the clicked sub-menu
//         clickedSubMenu.classList.toggle('active');
//     }
// });






// const submenuToggle = document.querySelectorAll('.submenu > a');

// submenuToggle.forEach(toggle => {
//     toggle.addEventListener('click', (event) => {
//         event.preventDefault();

//         const clickedSubMenu = toggle.nextElementSibling;

//         //close all other sub-menus
//         const allSubMenu = document.querySelectorAll('.sub-menu');
//         allSubMenu.forEach(subMenu => {
//             if (subMenu !== clickedSubMenu) {
//                 subMenu.classList.remove('active');
//             }
//         })
//         // toggle the clicked sub-menu
//         clickedSubMenu.classList.toggle('active');
//     });
// });