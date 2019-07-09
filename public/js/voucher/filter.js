$(document).ready(function () {

    $(".inp-date-picker").bootstrapMaterialDatePicker({weekStart: 0, time: false, lang: 'es'});
    $(".btn-search").click(function (e) {
        e.preventDefault();
        var id = $("#inp-id").val();
        var desc = $("#inp-description").val();
        var start = $("#inp-start").val();
        var end = $("#inp-end").val();
        var type = $("#inp-type").val();
        var url = $(this).attr('href');
        var params = url + "?";

        params = params + "id=" + id;
        params = params + "&description=" + desc;
        params = params + "&start=" + start;
        params = params + "&end=" + end;
        params = params + "&type=" + type;
        console.log(params);
        window.location.href = params;
    });
});
