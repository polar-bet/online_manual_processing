$(document).ready(function () {
    $('.s2').each(function () {
        $(this).select2({
            language: {
                noResults: function () {
                    return "Немає результатів";
                }
            }
        });
    });
});
