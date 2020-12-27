jQuery(function ($) {
    $(document).ready(function () {

        $('#table_helastel').DataTable();

        let form = $(".form-container");

        form.on("submit", function (event) {
            event.preventDefault();

            let formData = {
                action: 'hs_test_four',
                quantity: $('#hs_test_four_data').val(),
            }

            $.ajax({
                url: "/wp-admin/admin-ajax.php",
                method: 'post',
                data: formData,
                success: function (response) {
                    $('#table_helastel').html(response.data);
                },
                error: function () {
                    console.log('AJAX ERROR');
                }
            });

        });


    });


});