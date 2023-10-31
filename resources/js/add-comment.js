const addCommentSection = document.querySelector('.main__add-comment-section');
const btnCancel = document.querySelector('.main__cancel-button');

$('#createButton').click(function () {
    $('#comment-section').toggleClass('add-comment--active');
    $('#content').summernote('code', '');
    if (!addCommentSection.classList.contains('add-comment--active')) {
        addCommentSection.classList.toggle('add-comment--active');
    }
});

btnCancel.addEventListener('click', function () {
    addCommentSection.classList.toggle('add-comment--active');
});

$('#send').click(function () {
    $('#comment-section').toggleClass('add-comment--active');
});

