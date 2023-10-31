const fileInput = document.getElementById('avatar-upload');
const placeholder = document.getElementById('avatar-placeholder');
const fileInput_small = document.getElementById('avatar-upload-small');
const placeholder_small = document.getElementById('avatar-placeholder-small');
const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
    var currentUrl = new URL(window.location.href);
    var urlParams = currentUrl.searchParams;
    urlParams.set('mode', 'reg');
    currentUrl.search = urlParams.toString();
    window.history.replaceState({}, '', currentUrl);
});

loginButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
    var currentUrl = new URL(window.location.href);
    var urlParams = currentUrl.searchParams;
    urlParams.set('mode', 'auth');
    currentUrl.search = urlParams.toString();
    window.history.replaceState({}, '', currentUrl);
});


fileInput.onchange = function (event) {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener('load', function () {
            placeholder.style.backgroundImage = 'url(' + reader.result + ')';
            placeholder.style.backgroundSize = 'cover';
            placeholder.style.backgroundPosition = 'center';
        });
        reader.readAsDataURL(file);
    }

}

fileInput_small.onchange = function (event) {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener('load', function () {
            placeholder_small.style.backgroundImage = 'url(' + reader.result + ')';
            placeholder_small.style.backgroundSize = 'cover';
            placeholder_small.style.backgroundPosition = 'center';
        });
        reader.readAsDataURL(file);
    }

}

var smallContainer = document.querySelector('.main__small-screen-container');
var chk = document.querySelector('#chk');
var currentUrl = new URL(window.location.href);
var urlParams = currentUrl.searchParams;

if (urlParams.get('mode') === 'auth') {
    chk.checked = false;
    smallContainer.style.maxHeight = '720px';
} else if (urlParams.get('mode') === 'reg') {
    chk.checked = true;
    smallContainer.style.maxHeight = '800px';
}

chk.addEventListener('change', function () {
    if (chk.checked) {
        urlParams.set('mode', 'reg');
        smallContainer.style.maxHeight = '800px';
    } else {
        urlParams.set('mode', 'auth');
        smallContainer.style.maxHeight = '720px';
    }

    currentUrl.search = urlParams.toString();
    window.history.replaceState({}, '', currentUrl);
});

