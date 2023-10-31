// document.addEventListener('DOMContentLoaded', function() {
//     const shortcutLinks = document.querySelectorAll('.main__shortcuts-link[data-goto]');
//     const header = document.querySelector('.header');
//
//     shortcutLinks.forEach(shortcutLink => {
//         shortcutLink.addEventListener('click', onShortcutLinkClick);
//     });
//
//     function onShortcutLinkClick(e) {
//         const shortcutLink = e.target;
//         const gotoValue = shortcutLink.dataset.goto;
//         const gotoBlock = document.querySelector(gotoValue);
//
//         if (gotoBlock) {
//             const gotoBlockValue = gotoBlock.getBoundingClientRect().top + window.pageYOffset - header.offsetHeight;
//
//             window.scrollTo({
//                 top: gotoBlockValue,
//                 behavior: "smooth"
//             });
//
//             e.preventDefault();
//         }
//     }
//
//     if (window.location.hash) {
//         const gotoBlock = document.getElementById(decodeURIComponent(window.location.hash.substring(1)));
//
//         if (gotoBlock) {
//             const gotoBlockValue = gotoBlock.getBoundingClientRect().top + window.pageYOffset - header.offsetHeight;
//
//             window.scrollTo({
//                 top: gotoBlockValue,
//                 behavior: "smooth"
//             });
//         }
//     }
// });
