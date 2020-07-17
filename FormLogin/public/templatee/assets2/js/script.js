$(document).on('click', '#btn-edit', function () {
    $('.modal-body id-user').val($(this).data('id'));
    $('.modal-body nim').val($(this).data('nim'));
    $('.modal-body firstname').val($(this).data('firstname'));
    $('.modal-body lastname').val($(this).data('lastname'));
    $('.modal-body email').val($(this).data('email'));
})