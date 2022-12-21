<?php

use yii\web\View;
// use app\assets\VueAppEntryFormAsset;

// VueAppEntryFormAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

// $this->registerJsFile('@web/js/items/items.js?v=20221108a');
$this->registerJsFile('@web/js/services/ppat/entryform.js?v=20221114b');

// $this->registerJsFile('@web/js/items/items.js');
// $this->registerJsFile('@web/js/services/user/entryform.js');

?><div class="p-2">

<div class="alert alert-danger p-2" v-if="showMessage">
	<i class="bi bi-exclamation-triangle"></i> {{message}}
</div>


<div class="row g-1">
	<div class="col-md-3 col-lg-2 pt-1">No KTP</div>
	<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
		<input v-model="dataPPAT.nik" type="text" class="form-control">
		<span class="text-danger" v-if="dataPegawaiErr.nik">{{dataPegawaiErr.nik}}</span>
	</div>
</div>
<div class="row g-1">
	<div class="col-md-3 col-lg-2 pt-1">Nama Lengkap</div>
	<div class="col-md-6 col-lg-5 col-xl-4 mb-2">
		<input v-model="dataPPAT.nama" type="text" class="form-control">
		<span class="text-danger" v-if="dataPegawaiErr.nama">{{dataPegawaiErr.namaLengkap}}</span>
	</div>
</div>
<div class="row g-1">
	<div class="col-md-3 col-lg-2 pt-1">Alamat</div>
	<div class="col-md-6 col-lg-5 col-xl-4 mb-2">
		<input v-model="dataPPAT.alamat" type="text" class="form-control">
		<span class="text-danger" v-if="dataPegawaiErr.alamat">{{dataPegawaiErr.alamat}}</span>
	</div>
</div>
<div class="row g-1">
	<div class="col-md-3 col-lg-2 pt-1">Email</div>
	<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
		<input v-model="dataPPAT.email" type="text" class="form-control">
		<span class="text-danger" v-if="dataPegawaiErr.email">{{dataPegawaiErr.email}}</span>
	</div>
</div>
<div class="row g-1">
	<div class="col-md-3 col-lg-2 pt-1">Keterangan</div>
	<div class="col-md-7 col-lg-6 col-xl-5 mb-2">
		<textarea v-model="dataPPAT.notes" class="form-control" name="" id="" cols="30" rows="3"></textarea>
	</div>
</div>
<!-- <div class="row g-1">
	<div class="col-md-3 col-lg-2 pt-1">Masa Berlaku</div>
	<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
		<input v-model="dataPPAT.validPeriod" type="text" class="form-control">
	</div>
</div> -->
<div class="row g-1">
	<div class="col-md-3 col-lg-2 pt-1">Username</div>
	<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
		<input v-model="dataPPAT.name" type="text" class="form-control">
		<span class="text-danger" v-if="dataPegawaiErr.name">{{dataPegawaiErr.name}}</span>
	</div>
</div>
<div class="row g-1" v-if="!id">
	<div class="col-md-3 col-lg-2 pt-1">Password</div>
	<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
		<input v-model="dataPPAT.password" type="password" class="form-control">
		<span class="text-danger" v-if="dataPegawaiErr.password">{{dataPegawaiErr.password}}</span>
	</div>
</div>


<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
