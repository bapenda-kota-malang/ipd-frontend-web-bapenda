<?php

use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->params['content_fixed'] = false;

$session = Yii::$app->session;
if(!$session->isActive) {
	$session->open();
}
$user_id = $session->has('user_id') ? $session->get('user_id') : 'User ID';
$user_name = $session->has('user_name') ? $session->get('user_name') : 'User Name';
$user_email = $session->has('user_email') ? $session->get('user_email') : 'User Email';

$this->registerJsFile('@web/js/dto/user/change-password.js?v=20221108a');
$this->registerJsFile('@web/js/services/akun/akun.js?v=20221108a');

?>
<div id="vueBox" class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 col-xxl-5 bg-white py-4">
			<h5 class="mb-3"><i class="bi bi-person"></i> Akun</h5>
			<hr class="mt-0 mb-3">
			<div class="row">
				<div class="xc-4 pt-1">User Name</div>
				<div class="col mb-2">: <?= $user_name ?></div>
			</div>
			<div class="row">
				<div class="xc-4 pt-1">Email</div>
				<div class="col mb-2">: <?= $user_email ?></div>
			</div>
			<div class="row">
				<div class="xc-4 pt-1">Posisi</div>
				<div class="col mb-2">: User Bapenda</div>
			</div>
			<div class="row">
				<div class="xc-4 pt-1">Last Login</div>
				<div class="col mb-2">:</div>
			</div>
			<hr>
			<div class="text-center">
				<button @click="showGantiPassword" class="btn bg-blue"><i class="bi bi-lock"></i> Ganti Password</button>
			</div>
		</div>
	</div>

	<div id="gantiPasswordModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<div>Ganti Password</div>
					<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="xc-md-7 pt-1">Password Lama</div>
						<div class="col mb-2">
							<input type="password" v-model="data.oldPassword" class="form-control">
							<span class="text-danger" v-if="dataErr.oldPassword">{{dataErr.oldPassword}}</span>
						</div>
					</div>
					<div class="row">
						<div class="xc-md-7 pt-1">Password Baru</div>
						<div class="col mb-2">
							<input type="password" v-model="data.newPassword" class="form-control">
							<span class="text-danger" v-if="dataErr.newPassword">{{dataErr.newPassword}}</span>
						</div>
					</div>
					<div class="row">
						<div class="xc-md-7 pt-1">Konfirm Password Baru</div>
						<div class="col">
							<input type="password" v-model="data.rePassword" class="form-control">
							<span class="text-danger" v-if="dataErr.rePassword">{{dataErr.rePassword}}</span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button @click="submitGantiPassword" class="btn bg-blue"><i class="bi bi-check-lg"></i> Simpan</button>
					<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
				</div>
			</div>
		</div>
	</div>

</div>
