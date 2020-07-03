var ref = $('#tableList').DataTable({
	"processing": true,
	"autoWidth": false,
	"ajax": {
		"dataType": 'json',
		"contentType": "application/json; charset=utf-8",
		"type": "GET",
		"url": getUrl()
	},
	"columns": [
		{
			"data": "id",
			"className": "text-center",
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
		},
		{
			"data": 'customerName',
			"className": "text-center"
		},
		{
			"data": 'transactionDateTarget',
			"className": "text-center"
		},
		{
			"data": 'transactionDateActual',
			"className": "text-center"
		},
		{
			"data": 'status',
			"className": "text-center"
		},
		{
			"data": 'action',
			"className": "text-center"
		}
	]
});

function reloadTable() {
	ref.ajax.url(getUrl()).load();
}

function getUrl() {
	return base_url + 'report_transaction/json/';
}