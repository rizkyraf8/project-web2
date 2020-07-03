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