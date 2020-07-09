$('#form').submit(function (e) {
    e.preventDefault();
    $(".loader").css("display", "block");
    $("#submit").css("display", "none");

    $.ajax({
        type: $('#form').attr('method'),
        url: $('#form').attr('action'),
        data: $('#form').serialize(),
        success: function (data) {
        
            if (data.success) {
                swal("Berhasil login", {
                    icon: "success",
                }).then((willDelete) => {
                    window.location = base_url + "dashboard";
                });
            } else {
                $(".loader").css("display", "none");
                $("#submit").css("display", "block");

                swal("Username dan password salah", {
                    icon: "error",
                });
            }
        },
        error: function (data) {
            $(".loader").css("display", "none");
            $("#submit").css("display", "block");
            
            swal("Username dan password salah", {
                icon: "error",
            });
        },
    });
});