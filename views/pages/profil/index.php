<?php

use app\assets\VueAppDetailLegacyAsset;

VueAppDetailLegacyAsset::register($this);

$this->params['content_fixed'] = false;
$session = Yii::$app->session;
if(!$session->isActive) {
	$session->open();
}
$user_id = $session->has('user_id') ? $session->get('user_id') : 'User ID';
$user_name = $session->has('user_name') ? $session->get('user_name') : 'User Name';
$user_email = $session->has('user_email') ? $session->get('user_email') : 'User Email';

$this->registerJsFile('@web/js/dto/pegawai/detail.js?v=20221108a');
$this->registerJsFile('@web/js/services/profil/profil.js?v=20221108a');

?>
<div id="vueBox" class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-9 col-xl-8 col-xxl-7 bg-white py-4">
			<h5 class="mb-3"><i class="bi bi-person"></i> Profil</h5>
			<hr class="mt-0 mb-3">
			<div class="row g-1">
				<div class="col-md-4 col-lg-3 col-xl-2">Nama Lengkap</div>
				<div class="col-md-6 col-lg-5 col-xl-4 mb-2"><span class="d-none d-md-inline">: </span>{{data.nama}}</div>
			</div>
			<div class="row g-1">
				<div class="col-md-3 col-lg-2">NIP</div>
				<div class="col-md-4 col-lg-3 col-xl-2 mb-2"><span class="d-none d-md-inline">: </span>{{data.nip}}</div>
			</div>
			<div class="row g-1">
				<div class="col-md-3 col-lg-2">Jabatan</div>
				<div class="col-md-4 col-lg-3 col-xl-2 mb-2"><span class="d-none d-md-inline">: </span>{{data.jabatan_id}}</div>
			</div>
			<div class="row g-1">
				<div class="col-md-3 col-lg-2">Pangkat</div>
				<div class="col-md-4 col-lg-3 col-xl-2 mb-2"><span class="d-none d-md-inline">: </span>{{data.pangkat_id}}</div>
			</div>
			<div class="row g-1">
				<div class="col-md-3 col-lg-2">SKPD</div>
				<div class="col-md-4 col-lg-3 col-xl-2 mb-2">{{'Bapenda Kota Malang'}}</div>
			</div>
		</div>
	</div>
</div>
