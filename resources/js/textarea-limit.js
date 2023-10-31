var count = document.getElementById('count');
var text = document.getElementById('txt');
var warning = document.getElementById('warning');
count.innerHTML = text.value.length;
text.addEventListener('input', () => {
    var inputText = text.value;
    if (inputText.length > 250) {
        var trimmedText = inputText.substring(0, 250);
        text.value = trimmedText;
        count.innerHTML = trimmedText.length;
    } else {
        count.innerHTML = inputText.length;
    }
});

