<?php

use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerJsFile('@web/js/dto/user/login.js?v=20221107a');
$this->registerJsFile('@web/js/services/auth/login.js?v=20221107a');

?>
<div class="d-flex h-100 align-items-center">
	<div class="container" style="height:80vh">
		<div class="row justify-content-center h-100" >
			<div class="col-md-6 col-lg-10 col-xl-9 col-xxl-8 bg-white shadow">
				<div class="row h-100">
					<div class="col h1-00 bg-slate-300 d-none d-lg-inline-block">
						<div class="p-4 h-100 position-relative">
							<div style="font-size:70px">
								<i class="bi bi-layout-wtf"></i>
							</div>
							<div class="position-absolute" style="right:20px; bottom:20px; left:50px;">
								<div class="text-end">
									<h2>APLIKASI<br />INTEGRASI PAJAK DAERAH</h2>
									<h5>BAPENDA KOTA MALANG</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col h-100">
						<div class="d-flex h-100 align-items-center justify-content-center">
							<div id="vueBox">
								<h4>Login Form</h4>
								<hr>
								<div class="alert alert-danger p-2" v-if="mainMessage.show">
									<i class="bi bi-exclamation-triangle me-1"></i> {{mainMessage.content}}
								</div>
								<div class="row">
									<div class="col-4 pt-1">Username</div>
									<div class="col mb-2">
										<input type="text" class="form-control" v-model="data.name">
										<span class="text-danger" v-if="dataErr.name">{{dataErr.name}}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-4 pt-1">Password</div>
									<div class="col mb-2">
										<input type="password" class="form-control" v-model="data.password">
										<span class="text-danger" v-if="dataErr.password">{{dataErr.password}}</span>
									</div>
								</div>
								<div class="text-center">
									<button class="btn bg-blue" @click="submitData">Login <i class="bi bi-box-arrow-in-right"></i></button>
								</div>
								<hr>
								Lupa Password? Reset <a href="/reset-password/request"><strong>DISINI</strong></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
