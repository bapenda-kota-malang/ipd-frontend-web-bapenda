<?php

use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerJsFile('@web/js/dto/user/reset-password.js?v=20221107a');
$this->registerJsFile('@web/js/dto/user/request-reset-password.js?v=20221107a');
$this->registerJsFile('@web/js/services/akun/request-reset-password.js?v=20221107a');

?>
<div id="vueBox" class="d-flex h-100 align-items-center">
	<div class="container" style="min-height:50vh">
		<div class="row g-0 justify-content-center h-100" >
			<div class="col-lg-7 col-xl-6 col-xxl-5 bg-white shadow">
				<?php 
				$pageTitle = '<i class="bi bi-layout-wtf"></i> Reset Password';
				include Yii::getAlias('@vwCompPath').'/freepage/header.php';
				?>
				<div v-if="!success" class="p-3">
					<div class="mb-3">
						Proses reset password dilakukan dengan mengirimkan alamat reset 
						melalui email untuk memastikan anda mereset password untuk akun 
						yang anda miliki. Silahkan masukkan alamat email anda yang telah
						terdaftar dalam sistem kami pada field dibawah ini. 
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" v-model="data.email">
						<span class="text-danger" v-if="dataErr.email">{{dataErr.email}}</span>
					</div>
					<div class="text-center">
						<a href="/" class="btn bg-grey-300"><i class="bi bi-arrow-left"></i> Kembali</a>
						<button class="btn bg-blue" @click="submitData">Ajukan Reset Password <i class="bi bi-chevron-right"></i></button>
					</div>
					<hr>
					<div class="text-center mb-3">
						Copyright (C) Bapenda Kota Malang
					</div>
				</div>
				<div v-else  class="p-3">
					<div class="mb-3">
						Permintaan reset password telah disampaikan. Silahkan periksa email anda untuk mendapatkan tautan ke halaman reset password.
					</div>
					<div class="text-center">
						<a href="/" class="btn bg-grey-300"><i class="bi bi-arrow-left"></i> Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
