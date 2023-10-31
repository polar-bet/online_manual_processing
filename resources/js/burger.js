const btnMenu = document.querySelector('.header__burger-menu-btn');
const menuBody = document.querySelector('.header__burger-menu');
btnMenu.addEventListener('click', function () {
    document.body.classList.toggle('lock');
    btnMenu.classList.toggle('active');
    menuBody.classList.toggle('active');
})
