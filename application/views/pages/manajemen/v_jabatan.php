<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $page; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#"><?= $page; ?></a></li>
						<li class="breadcrumb-item active"><?= $subpage; ?></li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card bg-white">
						<div class="card-header">
							<h3 class="card-title">Data <?= $subpage; ?></h3>
							<div class="card-tools">
								<div class="input-group input-group-sm" style="width: 150px;">
									<input type="text" name="search" class="form-control float-right inputSearch"
										placeholder="Search">

									<div class="input-group-append">
										<button type="submit" class="btn btn-default btnSearch">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<a class="btn btn-sm btn-primary btnAdd mb-2" data-toggle="modal">Add Jabatan</a>
							<table class="table table-sm">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">NAMA JABATAN</th>
										<th class="text-center">STATUS</th>
										<th class="text-center">TOOL</th>
									</tr>
								</thead>
								<tbody id="menu_tbody">
								</tbody>
							</table>
						</div>
						<div class="card-footer clearfix">
							<ul class="pagination pagination-sm m-0 float-right">
								<li class="page-item"><a class="page-link" href="#">«</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">»</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- modal add menu -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalAddMenuTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="myForm">
					<input type="number" name="intIdJabatan" id="intIdJabatan" hidden>
					<div class="form-group row">
						<label for="txtNamaJabatan" class="col-sm-3 col-form-label">Nama Jabatan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="txtNamaJabatan" name="txtNamaJabatan"
								placeholder="Nama Jabatan" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="bitActive" class="col-sm-3 col-form-label">Status</label>
						<div class="col-sm-9">
							<select name="bitActive" id="bitActive" class="form-control" required>
								<option value="1" selected>Active</option>
								<option value="0">Not Active</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10"></div>
						<div class="col-sm-2 float-right">
							<button type="submit" class="btn btn-sm btn-primary btnSave">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>manajemen/jabatan/get_json",
			dataType: "json",
			success: function (response) {
				var html_mn = ``;
				var no = ``;
				var status = '';
				$.each(response.data, function (key, val) {
					if (val.bitActive == 1) {
						status = '<span class="badge badge-success">Active</span>';
					} else {
						status = '<span class="badge badge-danger">Not Active</span>';
					}
					no = key + 1;
					html_mn += `<tr>`;
					html_mn += `<td class="text-center">${no}</td>`;
					html_mn += `<td class="text-center">${val.txtNamaJabatan}</td>`;
					html_mn += `<td class="text-center">${status}</td>`;
					html_mn +=
						`<td class="text-center"><a class="btn btn-xs btn-warning btnEdit" data-id="${val.intIdJabatan}" data-nama="${val.txtNamaJabatan}" data-status="${val.bitActive}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btnDelete" data-id="${val.intIdJabatan}"><i class="fas fa-trash-alt"></i></a></td>`;
					html_mn += `</tr>`;
				});
				$('#menu_tbody').html(html_mn);

				// event Klik tombol add
				$('.btnAdd').on('click', function () {
					$('.modal-title').text('Tambah Jabatan');
					$('#intIdJabatan').val('');
					$('#txtNamaJabatan').val('');
					$('#myModal').modal('show');
				})

				$('body').on('click', '.btnEdit', function () {
					var id = $(this).data('id');
					var nama = $(this).data('nama');
					var status = $(this).data('status');
					$('.modal-title').text('Edit Jabatan');
					$('#intIdJabatan').val(id);
					$('#txtNamaJabatan').val(nama);
					// status
					$('#bitActive').empty();
					if (status == 1) {
						$('#bitActive').append('<option value="1" selected>Active</option>');
						$('#bitActive').append('<option value="0">Not Active</option>');
					} else {
						$('#bitActive').append('<option value="1">Active</option>');
						$('#bitActive').append(
							'<option value="0" selected>Not Active</option>');
					}

					$('#myModal').modal('show');
				})
				// event submit
				$('#myForm').on('submit', function (e) {
					e.preventDefault();
					var id = $('#intIdJabatan').val();
					var form = $('#myForm');
					$.ajax({
						type: "POST",
						url: "<?= base_url() ?>manajemen/jabatan/store",
						data: form.serializeArray(),
						dataType: "json",
						success: function (response) {
							if (response.code == 200) {
								var icon = 'success';
								var title = 'Success';
								var text = response.msg;
							} else if (response.code == 400) {
								var icon = 'error';
								var title = 'Error';
								var text = response.msg;
							}
							Swal.fire({
								icon: icon,
								title: title,
								text: text
							}).then(function (isConfirm) {
								location.reload();
							})
						}
					})

				})

				// event klik delete
				$('body').on('click', '.btnDelete', function () {
					var id = $(this).data('id');
					var name = $(this).data('name');
					Swal.fire({
						title: 'Are you sure?',
						text: `The Type ${name}, will delete!`,
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								type: "POST",
								url: "<?= base_url() ?>manajemen/jabatan/destroy",
								data: {
									id: id
								},
								dataType: "json",
								success: function (response) {
									if (response.code == 200) {
										var icon = 'success';
										var title = 'Deleted';
										var text = response.msg;
									} else if (response.code == 400) {
										var icon = 'error';
										var title = 'Error';
										var text = response.msg;
									}
									Swal.fire({
										icon: icon,
										title: title,
										text: text
									}).then(function (isConfirm) {
										location.reload();
									})
								}
							})
						}
					})
				})

				// event search
				$('.inputSearch').on('keyup', function () {
					var keyword = $(this).val();
					$.ajax({
						type: "POST",
						url: "<?= base_url() ?>manajemen/jabatan/search",
						dataType: "json",
						data: {
							keyword: keyword
						},
						success: function (response) {
							var html_mn = ``;
							var no = ``;
							var status = '';
							$.each(response.data, function (key, val) {
								if (val.bitActive == 1) {
									status =
										'<span class="badge badge-success">Active</span>';
								} else {
									status =
										'<span class="badge badge-danger">Not Active</span>';
								}
								no = key + 1;
								html_mn += `<tr>`;
								html_mn +=
									`<td class="text-center">${no}</td>`;
								html_mn +=
									`<td class="text-center">${val.txtNamaJabatan}</td>`;
								html_mn +=
									`<td class="text-center">${status}</td>`;
								html_mn +=
									`<td class="text-center"><a class="btn btn-xs btn-warning btnEdit" data-id="${val.intIdJabatan}" data-nama="${val.txtNamaJabatan}" data-status="${val.bitActive}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btnDelete" data-id="${val.intIdJabatan}"><i class="fas fa-trash-alt"></i></a></td>`;
								html_mn += `</tr>`;
							});
							$('#menu_tbody').html(html_mn);
						}
					})
				})
			}
		});
	});

</script>
