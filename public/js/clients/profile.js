$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

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

    $('.btn-list-penalties').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-water-source-header').html('Multas registradas');
        $('#modal-water-source-size').addClass('modal-lg');
        modalTools.renderView('modal-water-source', url);
    });

});
