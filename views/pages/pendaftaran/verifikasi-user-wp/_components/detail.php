
<div class="row">
	<div class="col-lg-2 pt-1">Nik</div>
	<div class="col col-lg-5 col-xl-4 col-xxl-3 mb-2">
		<input v-model="dataWp.nik" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Nama Lengkap</div>
	<div class="col-lg-6 mb-2">
		<input v-model="dataWp.nama" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Tempat/Tgl Lahir</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataWp.tempatLahir" class="form-control" disabled />
	</div>
	<div class="col-lg-2 mb-2">
		<input v-model="dataWp.tanggalLahir" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Pekerjaan</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataWp.pekerjaan" class="form-control" disabled /></div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Alamat</div>
	<div class="col-lg-6 mb-2">
		<input v-model="dataWp.alamat" class="form-control" disabled />
	</div>
	<div class="col-lg-1 pt-1 text-end">RT/RW</div>
	<div class="col-lg-2 mb-2">
		<input v-model="dataWp.rtRw" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Kelurahan</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataWp.kelurahan_id" class="form-control" disabled />
	</div>
	<div class="col-lg-2 pt-1 text-lg-end">Kecamatan</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataWp.kecamatan_id" class="form-control" disabled /></div>
	<div class="col-lg-2 pt-1">Kabupaten/Kota</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataWp.kota_id" class="form-control" disabled /></div>
	<div class="col-lg-2 pt-1 text-lg-end">Provinsi</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataWp.Provinsi_id" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Telp</div>
	<div class="col-lg-4 mb-2">
		<input v-model="dataWp.telp" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Email</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.email" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Username</div>
	<div class="col-lg-4 mb-2">
		<input v-model="data.name" class="form-control" disabled />
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
		<input v-model="userStatuses[data.status]" class="form-control" disabled />
	</div>
</div>
<div class="row">
	<div class="col-lg-2 pt-1">Scan KTP</div>
	<div class="col-lg-6 mb-2">
		<div class="img-thumbnail" style="min-width:450px; min-height:300px;">
			<img v-if="dataWp.fotoKtp" :src="'/resources/img/' + dataWp.fotoKtp.replace('.', '___')" alt="">
		</div>
	</div>
</div>
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php

$this->registerJsFile('@web/js/refs/common.js?v=20221108a');
$this->registerJsFile('@web/js/dto/user/user-detail.js?v=20221108a');
$this->registerJsFile('@web/js/dto/wp/wp-detail.js?v=20221108a');
$this->registerJsFile('@web/js/services/verifikasi-user-wp/detail.js?v=20221108a');
$this->registerJsFile('@web/js/app-detail.js?v=20221108a');
