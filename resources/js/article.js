import './select-2';
$(document).ready(function () {
    function appendChild(childHolder, type, name, placeholder) {
        let textarea;
        switch (type){
            case 'input':
                textarea = $('<input>').addClass('form-control').attr('name', name).attr('type', 'text').attr('placeholder', placeholder);
                break;
            case 'textarea':
                textarea = $('<textarea>').addClass('form-control').css('resize', 'none').attr('name', name).attr('placeholder', placeholder);
                break;
        }
        let deleteIcon = $('<i>').addClass('fas fa-trash-alt');
        let btnDelete = $('<button>').click(function () {
            $(this).parent().parent().remove();
        }).addClass('btn btn-danger').append(deleteIcon);
        let exampleHolder = $('<div>').addClass('input-group mb-2');
        let buttonHolder = $('<div>').addClass('input-group-append').append(btnDelete)
        let container = exampleHolder.append(textarea, buttonHolder);
        if (childHolder.children().length < 5) {
            childHolder.append(container);
        }
    }
    let count = 0;
    function addParameter(childHolder) {
        if(childHolder.children().length > 0)
        {
            count = childHolder.children().length;
        }
        let parameterName = $('<input>').addClass('form-control').attr('name', 'parameters[' + count + '][name]').attr('type', 'text').attr('placeholder', 'Назва');
        let type = $('<input>').addClass('form-control').attr('name', 'parameters[' + count + '][type]').attr('type', 'text').attr('placeholder', "Тип (не обов'язково)");
        let description = $('<input>').addClass('form-control').attr('name', 'parameters[' + count + '][description]').attr('type', 'text').attr('placeholder', "Опис");
        let deleteIcon = $('<i>').addClass('fas fa-trash-alt');
        let btnDelete = $('<button>').click(function () {
            $(this).parent().parent().remove();
        }).addClass('btn btn-danger').append(deleteIcon);
        let exampleHolder = $('<div>').addClass('input-group mb-2');
        let buttonHolder = $('<div>').addClass('input-group-append').append(btnDelete)
        let container = exampleHolder.append(parameterName, type, description, buttonHolder);
        if (childHolder.children().length < 5) {
            childHolder.append(container);
            count++;
        }
    }



    $('#btnAddExample').click(function () {
        appendChild($('#exampleHolder'), 'textarea', 'examples[]', 'Приклад');
    });

    $('#btnAddSyntax').click(function () {
        appendChild($('#syntaxHolder'), 'input', 'syntaxes[]', 'Синтаксис');
    });

    $('#btnAddConstructor').click(function () {
        appendChild($('#constructorHolder'), 'input', 'constructors[]', 'Конструктор');
    });

    $('#btnAddParameter').click(function () {
        addParameter($('#parameterHolder'));
    });

    $('.delete-button').click(function() {
        $(this).parent().parent().remove();
    });
});

