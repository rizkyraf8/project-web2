
var ref = $('#tableList').DataTable({
	"processing": true,
	"autoWidth": false,
	"ajax": {
		"dataType": 'json',
		"contentType": "application/json; charset=utf-8",
		"type": "GET",
		"url": getUrlEditProduct()
	},
	"columns": [
		{
			"data": "productId",
			"className": "text-center",
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1 + "<input type=\"hidden\" name=\"id[" + data + "]\"  value=\"" + data + "\">";
			}
		},
		{
			"data": 'productName',
			"className": "text-center"
		},
		{
			"data": 'productPrice',
			"className": "text-center"
		},
		{
			"data": 'productSalesPrice',
			"className": "text-center",
			render: function (data, type, row, meta) {
				return data + "<input type=\"hidden\" name=\"salesPrice[" + row.productId + "]\"  value=\"" + data + "\">";
			}
		},
		{
			"data": "qtyRequest",
			"className": "text-center",
			render: function (data, type, row) {
				return '<input type="number"  data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" class="form-control" name="qty[' + row.productId + ']" value="' + data + '">';
			}
		},
		{
			"data": null,
			"className": "text-center",
			"defaultContent": '<a href="#" class="btn btn-danger editor_remove"><i class="fa fa-trash"></i></a>'
		},
	],
});

var refProduct = $('#tableProduct').DataTable({
	"processing": true,
	"autoWidth": false,
	"ajax": {
		"dataType": 'json',
		"contentType": "application/json; charset=utf-8",
		"type": "GET",
		"url": getUrlProduct()
	},
	"columns": [
		{
			"data": "productId",
			"className": "text-center",
			render: function (data, type, row) {
				return '<input type="checkbox" name="id" value="' + $('<div/>').text(data).html() + '">';
			}
		},
		{
			"data": 'productName',
			"className": "text-center",
		},
		{
			"data": 'categoryName',
			"className": "text-center"
		},
		{
			"data": 'productPrice',
			"className": "text-center"
		},
		{
			"data": 'productSalesPrice',
			"className": "text-center"
		}
	],
	"select": {
		"style": 'os',
		"selector": 'td:not(:last-child)' // no row selection on last column
	}
});

$('#tableProduct tbody').on('click', '.checkbox', function () {
	if (this.checked == true) {
		// console.log(refProduct.row(this.closest('tr')).data());
	}
});

function getUrlProduct() {
	return base_url + 'product/json/';
}

function getUrlEditProduct() {
	return base_url + 'transaction/product_json/' + transactionId;
}

function getCheckData() {
	var rows = refProduct.rows().data();

	var data = refProduct.$('input[type="checkbox"]').serialize();
	var id = [];

	data.split("&").forEach(element => {
		var item = element.split("=");
		id.push(item[1]);
	});

	for (let index = 0; index < rows.length; index++) {
		id.forEach(element => {
			if (rows[index].productId == element) {
				addRow(rows[index]);
			}
		});
	}
}

function addRow(data) {
	var rows = ref.rows().data();
	var isAdd = true;

	for (let index = 0; index < rows.length; index++) {
		if (data.productId == rows[index].productId) {
			isAdd = false;
		}
	}

	if (isAdd) {
		ref.row.add(data).draw();
	}
}

function validate() {
	var rows = ref.rows().data();

	if (rows.length == 0) {
		swal("Alert!", "Please add minimum one product!", "info");
		return false;
	} else {
		return true;
	}
}

$('#tableList').on('click', 'a.editor_remove', function (e) {
	e.preventDefault();
	ref
		.row($(this).parents('tr'))
		.remove()
		.draw();
});