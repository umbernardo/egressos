$(document).ready(function () {
    $('input.tags').tagsinput({
        confirmKeys: [13, 44]
    });

    $(document).on("keypress", "form", function (event) {
        return event.keyCode != 13;
    });

    $('#select-oportunidades').on('change', function () {
        var url = $(this).val();
        console.log(url);
        if (url && url !== '#') {
            window.location = url;
        }
        return false;
    });
});


