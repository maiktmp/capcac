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
                var url = $(this).attr('href');
                var startDate = $("#inp-start-date").val();
                var endDate = $("#inp-end-date").val();

                url = url.replace('FAKE_START_DATE', startDate);
                url = url.replace('FAKE_END_DATE', endDate);

                $.get(url, function (response) {
                    var total = response.total;
                    var months = response.months;
                    $("#lbl-total-payment").html("Total: $" + total);
                    $("#lbl-total-months").html("Meses calculados: " + months);
                    if (total > 0) {
                        $('.btn-pay').attr('disabled', false)
                    } else {
                        $('.btn-pay').attr('disabled', true)
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
        $('#modal-water-source-size').removeClass('modal-lg');
        modalTools.renderView('modal-water-source', url);
    });

});
