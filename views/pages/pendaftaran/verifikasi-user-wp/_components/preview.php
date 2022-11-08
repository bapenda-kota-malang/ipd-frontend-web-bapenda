
<div class="row">
	<div class="col-lg-2 pt-1">Nik</div>
	<div class="col col-lg-5 col-xl-4 col-xxl-3 mb-2">
		<input v-model="data.nik" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Nama Lengkap</div>
	<div class="col-lg-6 mb-2">
		<input v-model="data.nama" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Tempat/Tgl Lahir</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.tempatLahir" class="form-control" disabled />
	</div>
	<div class="col-lg-2 mb-2">
		<input v-model="data.tanggalLahir" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Pekerjaan</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.pekerjaan" class="form-control" disabled /></div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Alamat</div>
	<div class="col-lg-6 mb-2">
		<input v-model="data.alamat" class="form-control" disabled />
	</div>
	<div class="col-lg-1 pt-1 text-end">RT/RW</div>
	<div class="col-lg-2 mb-2">
		<input v-model="data.rtRw" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Kelurahan</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.kelurahan_id" class="form-control" disabled />
	</div>
	<div class="col-lg-2 pt-1 text-lg-end">Kecamatan</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.kecamatan_id" class="form-control" disabled /></div>
	<div class="col-lg-2 pt-1">Kabupaten/Kota</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.kota_id" class="form-control" disabled /></div>
	<div class="col-lg-2 pt-1 text-lg-end">Provinsi</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.Provinsi_id" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Telp</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.telp" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Email</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataUser.email" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Username</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataUser.name" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Keterangan</div>
	<div class="col-lg-6 mb-2">
		<textarea rows="3" class="form-control" disabled></textarea>
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">STATUS</div>
	<div class="col-lg-4 mb-2">
		<input v-model="userStatuses[dataUser.status]" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Scan KTP</div>
	<div class="col-lg-6 mb-2">
		<div class="img-thumbnail" style="width:450px; height:300px;">
			<div class="bg-blue-300 w-100 h-100 p-3">
				<div class="text-center">Contoh KTP</div>
				<div class="row">
					<div class="col-8">
						..........<br />
						..........<br />
						..........<br />
						..........<br />
						..........<br />
						..........<br />
					</div>
					<div class="col-4 d-flex">
						<div class="ms-auto bg-grey-300 text-end" style="width:100px; height:120px">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php

$this->registerJsFile(
	'@web/js/services/verifikasi-user-wp/preview.js?v=20221108a',
);
?>