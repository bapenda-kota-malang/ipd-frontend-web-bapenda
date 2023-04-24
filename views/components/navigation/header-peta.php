<?php

$session = Yii::$app->session;
if(!$session->isActive) {
	$session->open();
}
$nip = $session->has('nip') ? $session->get('nip') : 'NIP';
$user_id = $session->has('user_id') ? $session->get('user_id') : 'User ID';
$user_name = $session->has('user_name') ? $session->get('user_name') : 'User Name';
$jabatan_id = $session->has('jabatan_id') ? $session->get('jabatan_id') : 'Jabatan';
$bidangKerja_kode = $session->has('bidangKerja_kode') ? $session->get('bidangKerja_kode') : 'Bidang';

?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top px-3 main">
	<a class="navbar-brand" href="/">
		<img src="/img/bakoma-logo.png" alt="" class="me-1">
		<span class="d-none d-md-inline">Badan Pendapatan Daerah</span><span class="d-inline d-md-none">Bapenda</span> Kota Malang
	</a>
	<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#w0-collapse" aria-controls="w0-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse">
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#"></a>
				</li>
			</ul>
			<span class="navbar-text me-3"><?= $user_name ?></span>
			<a href="/auth/logout" class="navbar-text">
				Logout
			</a>
		</div>
	</div>
</nav>