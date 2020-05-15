$(document).ready(function () {
    $("#filter").change(function () {
        window.location.replace('/gallery/index/' + $(this).val());

    });

    $("#random").click(function () {
        window.location.reload();

    });

});