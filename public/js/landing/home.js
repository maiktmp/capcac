$(document).ready(function () {
    $(document).ready(function () {
        $('.carousel').carousel({
            interval: 2000
        })
    });

    $(".btn-login").click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-login-header').html('Inicio de sesión');

        modalTools.renderView('modal-login', url, function () {
            formTools.useAjaxOnSubmit('form-login', function (response) {
                // console.log(response);
                if (response.success) {
                    window.location.href = response.route;
                }
            })
        });
    });
});
