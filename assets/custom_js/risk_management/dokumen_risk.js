$(document).ready(function () {
	p_InitiateDataList();
});

function p_InitiateDataList() {
	var oTableDokumen = $('#dtList').DataTable({
		"bPaginate": true,
		"bSort": false,
		"iDisplayLength": 10,
		"lengthMenu": [20, 40, 80, 100, 120],
		"pageLength": 20,
		"processing": true,
		"serverSide": true,
		searching: true,
		"ajax": {
			"url": `${url}risk_register/Dokumen/getDataTable`,
			"method": "POST",
			"data": function (d) {
				// d.__RequestVerificationToken = $('#frmIndex input[name=__RequestVerificationToken]').val()                
			}
		},
		columns: [{
				"data": "no",
				"name": "no",
				className: 'text-center'
			},
			{
				"data": "txtDocNumber",
				"name": "txtDocNumber",
				className: 'text-center'
			},
			{
				"data": "nama",
				"name": "nama",
				className: 'text-center'
			},
			{
				"data": "dtmInsertedBy",
				"name": "dtmInsertedBy",
				className: 'text-center'
			},
			{
				"data": "txtStatus",
				"name": "txtStatus",
				className: 'text-center'
			},
			{				
				render: function (data, type, full, meta) {					
					return `<a class="btn btn-primary" href="${url}risk_register/Activity/index?id=${full.intIdDokRiskRegister}"><i class="fa fa-eye"></i></a>`
                },
				className: 'text-center'
			},
		]
	});
	$("#dtList").css("width", "100%");
}

$("#tombol_simpan_dokumen").on('click', function (e) {
	e.preventDefault();
	let data = {
		txtDocNumber: $("#txtNoDocNumber").val()
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/Dokumen/simpan`,
		data: data,
		dataType: "json",
		success: function (response) {
			let otable = $('#dtList').dataTable();
			otable.fnDraw(false);

		}
	});
});