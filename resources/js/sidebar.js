let button = document.getElementById('side-bar-button');
let copy_buttons = document.querySelectorAll('.example__copy-button');
let code = document.querySelectorAll('.language-java');
let side_bar = document.getElementById('side-bar');
let copy_buttons_text = document.querySelectorAll('.example__copy-button span');
let body = document.body;

copy_buttons.forEach((copy_button, index) => {
    copy_button.addEventListener('click', () => {
        // Копіюємо вміст контейнера в буфер обміну
        navigator.clipboard.writeText(code[index].innerText);

        // Змінюємо текст кнопки на "Скопійовано" на 2 секунди
        copy_button.classList.remove('default');
        copy_button.classList.add('success');
        copy_buttons_text[index].innerText = 'Скопійовано';

        setTimeout(() => {
            copy_buttons_text[index].innerText = 'Копіювати';
            copy_button.classList.toggle('default', true);
            copy_button.classList.toggle('success', false);
        }, 2000);
    });
});




