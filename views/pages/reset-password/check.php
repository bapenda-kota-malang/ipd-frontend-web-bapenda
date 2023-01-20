<?php

use app\assets\VueAppDetailLegacyAsset;

VueAppDetailLegacyAsset::register($this);

$this->registerJsFile('@web/js/dto/user/check-reset-password.js?v=20221107a');
$this->registerJsFile('@web/js/dto/user/reset-password.js?v=20221107a');
$this->registerJsFile('@web/js/services/akun/check-reset-password.js?v=20221107a');

?>
<div id="vueBox" class="d-flex h-100 align-items-center">
	<div class="container" style="min-height:50vh">
		<div class="row g-0 justify-content-center h-100" >
			<div class="col-lg-7 col-xl-6 col-xxl-5 bg-white shadow">
				<?php 
				$pageTitle = '<i class="bi bi-layout-wtf"></i> Reset Password';
				include Yii::getAlias('@vwCompPath').'/freepage/header.php';
				?>
				<div v-if="status=='loading'" class="p-3">
					<h6><i class="bi bi-exclamation-triangle"></i> Mohon Ditunggu</h6>
					<div class="mb-3">Sistem sedang memvalidasi email dan token</div>
				</div>
				<div v-else-if="status=='invalid'" class="p-3">
					<h6><i class="bi bi-exclamation-triangle"></i> Proses Dihentikan!!</h6>
					<div class="mb-3">
						Permintaan reset password tida dapat dilanjutkan karena: {{this.messages[0]}}
					</div>
					<div class="text-center">
						<a href="/" class="btn bg-grey-300"><i class="bi bi-arrow-left"></i> Batal</a>
					</div>
				</div>
				<div v-else-if="status=='valid'" class="p-3">
					<div class="mb-3">
						Anda telah mengajukan permintaan reset password. Silahkan masukkan password baru beserta konfirmasinya.
					</div>
					<div class="row">
						<div class="col-md-4">
							Password Baru
						</div>
						<div class="col-md mb-2">
							<input type="password" class="form-control" v-model="resetPasswordData.newPassword">
							<span class="text-danger" v-if="resetPasswordDataErr.newPassword">{{resetPasswordDataErr.newPassword}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							Konfirmasi Password
						</div>
						<div class="col-md mb-3">
							<input type="password" class="form-control" v-model="resetPasswordData.rePassword">
							<span class="text-danger" v-if="resetPasswordDataErr.rePassword">{{resetPasswordDataErr.rePassword}}</span>
						</div>
					</div>
					<div class="text-center">
						<a href="/" class="btn bg-grey-300"><i class="bi bi-arrow-left"></i> Batal</a>
						<button class="btn bg-blue" @click="submitData">Simpan <i class="bi bi-check-lg"></i></button>
					</div>
				</div>
				<div v-else class="p-3">
					<div class="mb-3">
						Password telah berhasil diperbarui. Silahkan login menggunakan akun anda untuk mendapatkan akses ke sistem kami.
					</div>
					<div class="text-center">
						<a href="/" class="btn bg-grey-300"><i class="bi bi-arrow-left"></i> Kembali</a>
					</div>
				</div>
				<div class="text-center mb-3">
					<hr>
					Copyright (C) Bapenda Kota Malang
				</div>
			</div>
		</div>
	</div>
</div>
