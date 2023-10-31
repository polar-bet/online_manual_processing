var fileInput = document.getElementById('exampleInputFile');
var label = document.querySelector('.custom-file-label');
var avatar = document.getElementById('avatar-img');

fileInput.addEventListener('change', function () {
    if (fileInput.files.length > 0) {
        label.innerHTML = fileInput.files[0].name;
        avatar.src = URL.createObjectURL(fileInput.files[0]);
    }
});

if (label.innerHTML.length > 20) {
    label.innerHTML = label.innerHTML.substring(0, 17) + '...';
}
