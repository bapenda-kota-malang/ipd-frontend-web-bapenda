<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/ppat/entryform.js?v=20222121b');
$this->registerJsFile('@web/js/services/ppat/entryform.js?v=20222121b');

?><div class="p-2">

<div class="alert alert-danger p-2" v-if="mainMessage.show">
	<i class="bi bi-exclamation-triangle"></i> {{message}}
</div>

<div class="row g-1">
	<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1">Nama Lengkap</div>
	<div class="xc-md-15 xc-lg-7 xc-xl-8 mb-2">
		<input v-model="data.nama" type="text" class="form-control">
		<span class="text-danger" v-if="dataErr.nama">{{dataErr.nama}}</span>
	</div>
	<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1 text-lg-end pe-2">NIK</div>
	<div class="xc-md-8 xc-lg-4 mb-2">
		<input v-model="data.nik" type="text" class="form-control">
		<span class="text-danger" v-if="dataErr.nik">{{dataErr.nik}}</span>
	</div>
</div>

<div class="row g-1">
	<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1">Alamat</div>
	<div class="xc-md-15 xc-lg-7 xc-xl-8 mb-2">
		<input v-model="data.alamat" type="text" class="form-control">
		<span class="text-danger" v-if="dataErr.alamat">{{dataErr.alamat}}</span>
	</div>
	<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1 text-lg-end pe-2">Email</div>
	<div class="xc-md-8 xc-lg-7 xc-xl-6 mb-2">
		<input v-model="data.user_email" type="text" class="form-control">
		<span class="text-danger" v-if="dataErr.user_email">{{dataErr.user_email}}</span>
	</div>
</div>

<div class="row g-1 mb-3">
	<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1">Keterangan</div>
	<div class="xc-md xc-lg-7 xc-xl-8 mb-2">
		<textarea v-model="data.notes" class="form-control" name="" id="" cols="30" rows="3"></textarea>
	</div>
</div>

<div v-if="id<=0" class="row g-1">
	<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1">User Name</div>
	<div class="xc-md-8 xc-lg-5 xc-xl-5 mb-2">
		<input v-model="data.user_name" type="text" class="form-control">
		<span class="text-danger" v-if="dataErr.user_name">{{dataErr.user_name}}</span>
	</div>
	<div class="d-none d-lg-inline xc-lg-2 xc-xl-3"></div>
	<div class="xc-md-5 xc-lg-3 xc-xl-2 pt-1 text-lg-end pe-2">Password</div>
	<div class="xc-md-8 xc-lg-5 xc-xl-5 mb-2">
		<input v-model="data.user_password" type="password" class="form-control">
		<span class="text-danger" v-if="dataErr.user_password">{{dataErr.user_password}}</span>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
