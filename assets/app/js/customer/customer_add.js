$("#customerProvince").change(function() {
    $("#customerCity").empty();
    $("#customerCity").append("<option value=\"\">-- Choose City --</option>");
    
	var customerProvince = $(this).val();
	if (customerProvince != "") {
		$.post(base_url + "city", {
			provinceId: customerProvince
		}, function(result) {
			var obj = jQuery.parseJSON(result);

			for (let index = 0; index < obj.length; index++) {
				var cityId = obj[index]['cityId'];
				var cityName = obj[index]['cityName'];

				$("#customerCity").append("<option value=\"" + cityId + "\">" + cityName + "</option>");
			}

		});
	}
});