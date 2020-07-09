$('#form').submit(function (e) {
	e.preventDefault();
    $(".loader").css("display", "block");
    $("#submit").css("display", "none");

	$.ajax({
		type: $('#form').attr('method'),
		url: $('#form').attr('action'),
		data: $('#form').serialize(),
		success: function (data) {
			swal("Success saved data", {
				icon: "success",
			}).then((willDelete) => {
				window.location = base_url + "category";
			});
		},
		error: function (data) {
			$(".loader").css("display", "none");
			$("#submit").css("display", "block");
			
			swal("Failed saved data", {
				icon: "error",
			});
		},
	});
});