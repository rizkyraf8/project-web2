$("#vendorProvince").change(function() {
    $("#vendorCity").empty();
    $("#vendorCity").append("<option value=\"\">-- Choose City --</option>");
    
	var vendorProvince = $(this).val();
	if (vendorProvince != "") {
		$.post(base_url + "city", {
			provinceId: vendorProvince
		}, function(result) {
			var obj = jQuery.parseJSON(result);

			for (let index = 0; index < obj.length; index++) {
				var cityId = obj[index]['cityId'];
				var cityName = obj[index]['cityName'];

				$("#vendorCity").append("<option value=\"" + cityId + "\">" + cityName + "</option>");
			}

		});
	}
});

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
				window.location = base_url + "vendor";
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