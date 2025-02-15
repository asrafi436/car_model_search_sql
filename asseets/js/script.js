$(document).ready(function() {
    $("#carForm").submit(function(event) {
        event.preventDefault();
        let formData = $(this).serialize();

        $.post("process.php", formData, function(response) {
            response = JSON.parse(response);
            if (response.status === "success") {
                toastr.success(response.message);
                setTimeout(() => location.reload(), 1000);
            } else {
                toastr.error(response.message);
            }
        });
    });

    $(".edit-btn").click(function() {
        $("#carId").val($(this).data("id"));
        $("#brand").val($(this).data("brand"));
        $("#model").val($(this).data("model"));
        $("#year").val($(this).data("year"));
        $("#price").val($(this).data("price"));
        $("button[type=submit]").text("Update Car");
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    // 🔍 Live Search Feature
    $('#search').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#carTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});