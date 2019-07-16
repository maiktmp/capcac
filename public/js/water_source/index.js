$(document).ready(function (e) {
    $('[data-toggle="tooltip"]').tooltip();

    $('.btn-upsert').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-water-source-header').html('Registrar toma de agua para el cliente');
        $('#modal-water-source-size').removeClass('modal-lg');

        modalTools.renderView('modal-water-source', url, function () {
            $("#inp-date-picker").bootstrapMaterialDatePicker({weekStart: 0, time: false, lang: 'es'});
            formTools.useAjaxOnSubmit('form-create-water-source', function (e) {
                location.reload();
            })
        });
    });

    $('.btn-create-payment').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-water-source-header').html('Registrar pago');
        $('#modal-water-source-size').addClass('modal-lg');

        modalTools.renderView('modal-water-source', url, function () {
            $(".inp-date-picker").bootstrapMaterialDatePicker({weekStart: 0, time: false, lang: 'es'});

            $(document).on('click', '.btn-compute-payment', function (e) {
                e.preventDefault();
                $(".errors-message").css({'display': 'none'});
                var url = $(this).attr('href');
                var startDate = $("#inp-start-date").val();
                var endDate = $("#inp-end-date").val();

                url = url.replace('FAKE_START_DATE', startDate);
                url = url.replace('FAKE_END_DATE', endDate);

                $.get(url, function (response) {
                    if (!response.success) {
                        $(".errors-message").css({'display': 'block'}).html(response.errors);
                        $('.btn-pay').attr('disabled', true);
                        $("#lbl-total-payment").html("Total: $" + 0);
                        $("#lbl-total-months").html("Meses calculados: " + 0);

                    } else {
                        var total = response.total;
                        var months = response.months;
                        $("#lbl-total-payment").html("Total: $" + total);
                        $("#lbl-total-months").html("Meses calculados: " + months);
                        if (total > 0) {
                            $('.btn-pay').attr('disabled', false)
                        } else {
                            $('.btn-pay').attr('disabled', true)
                        }
                    }

                });
            });

            formTools.useAjaxOnSubmit('form-create-payment', function (e) {
                location.reload();
            })
        });
    });

    $('.btn-index-payments').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-water-source-header').html('Pagos registrados');
        $('#modal-water-source-size').addClass('modal-lg');
        modalTools.renderView('modal-water-source', url);
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            modalTools.renderView('modal-water-source', $(this).attr('href'));
        });
    });

    $('.btn-create-penalty').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-water-source-header').html('Crear multa');
        $('#modal-water-source-size').removeClass('modal-lg');
        modalTools.renderView('modal-water-source', url, function () {
            formTools.useAjaxOnSubmit('form-penalty-create', function () {
                location.reload();
            })
        });
    });

    $('.btn-list-penalties').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-water-source-header').html('Multas registradas');
        $('#modal-water-source-size').addClass('modal-lg');
        modalTools.renderView('modal-water-source', url);
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            modalTools.renderView('modal-water-source', $(this).attr('href'));
        });

        $(document).on('click', '.btn-penalty-payment', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            Swal.fire({
                title: '¿Desea realizar el pago de la multa?',
                text: "La multa quedara pagada, esta acción no se podra revertir",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Pagar'
            }).then((result) => {
                if (result.value) {
                    $.get(url, function () {
                        $('#modal-water-source').modal('hide');
                    });
                }
            })
        });

        $(document).on('click', '.btn-upload-penalty-file', async function (e) {

        })
    });
});

