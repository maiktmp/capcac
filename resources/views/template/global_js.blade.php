<script
    src="{{asset('CDN/jquery.js')}}"></script>

<script src="{{asset('CDN/popper.js')}}"></script>

<script src="{{asset('CDN/bootstrap-material-design.js')}}"></script>

<script src="{{asset('CDN/fontawesome/js/all.js')}}"></script>

<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });</script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
        $('.prices-update').click(function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $('#modal-update-price-header').html('Actualizar precios');
            // $('#modal-update-price-size').addClass('modal-lg');
            modalTools.renderView('modal-update-price', url, function () {
                formTools.useAjaxOnSubmit('form-update-prices', function () {
                    location.reload();
                })
            });
        });
    });</script>
