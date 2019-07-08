$(document).ready(function () {
    $('.btn-create').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-transaction-header').html('Registrar Transacción');
        $('#modal-transaction-size').addClass('modal-lg');

        modalTools.renderView('modal-transaction', url, function () {
            formTools.useAjaxOnSubmit('form_transaction_create', function (response) {
                    Swal.fire({
                        title: 'Transacción registrada',
                        html: 'Transacción generada con éxito',
                        timer: 1500,
                        onClose: () => {
                            location.reload();
                        }
                    });
            })
        });
    });
});
