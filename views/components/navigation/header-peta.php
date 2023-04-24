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
	<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarUser" aria-controls="navbarUser" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse">
		<div id="navbarUser" class="collapse navbar-collapse">
			<div class="me-auto"></div>
			<ul class="navbar-nav mb-2 mb-lg-0">
				<li class="dropdown nav-item">
					<a id="item-153" class="dropdown-toggle nav-link show" href="/myaarea" data-bs-toggle="dropdown" role="button" aria-expanded="true" data-bs-auto-close="outside">
						<i class="bi bi-map"></i> Tema Peta Pajak
					</a>
					<div class="dropdown-menu dropdown-menu-end" data-bs-popper="static" style="width:150px">
						<a id="item-154" class="dropdown-item" href="/peta-pajak/kelas-bangunan"><i class="bi bi-building"></i> Peta Kelas Bangunan</a>
						<a id="item-155" class="dropdown-item" href="/peta-pajak/jenis-tanah"><i class="bi bi-boxes"></i> Peta Jenis Tanah</a>
						<a id="item-156" class="dropdown-item" href="/peta-pajak/jenis-peruntukan-bangunan"><i class="bi bi-bank"></i> Peta Jenis Peruntukan Bangunan</a>
						<a id="item-157" class="dropdown-item" href="/peta-pajak/znt"><i class="bi bi-columns"></i> Peta ZNT</a>
						<a id="item-158" class="dropdown-item" href="/peta-pajak/tunggakan-pajak"><i class="bi bi-calculator"></i> Peta Tunggakan Pajak</a>
						<a id="item-159" class="dropdown-item" href="/peta-pajak/objek-pajak"><i class="bi bi-stickies"></i> Peta Objek Pajak</a>
						<a id="item-160" class="dropdown-item" href="/peta-pajak/fasum-fasos"><i class="bi bi-hospital"></i> Peta Fasum/Fasos</a>
						<a id="item-161" class="dropdown-item" href="/peta-pajak/reklame"><i class="bi bi-flag"></i> Peta Reklame</a>
						<a id="item-162" class="dropdown-item" href="/peta-pajak/pdl"><i class="bi bi-geo"></i> Peta PDL</a>
						<a id="item-163" class="dropdown-item" href="/auth/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>