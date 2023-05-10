<?php

$appName = isset($appName) ? $appName : 'app';
$nopName = isset($nopName) ? $nopName : 'data';
$provName = isset($provName) ? $provName : 'provinsi_kode';
$daerahName = isset($daerahName) ? $daerahName : 'daerah_kode';
$kecName = isset($kecName) ? $kecName : 'kecamatan_kode';
$kelName = isset($kelName) ? $kelName : 'kelurahan_kode';
$blokName = isset($blokName) ? $blokName : 'kodeBlok';
$urutName = isset($urutName) ? $urutName : 'noUrut';
$jenisOPName = isset($jenisOPName) ? $jenisOPName : 'kodeJenisOp';

?>
<div class="d-flex">
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$provName" ?>"
			@input="nopNextAfter($event, <?= "$nopName.$provName" ?>, 2)"
			@change="function(){ if(typeof this.<?= $appName ?>.nopProvChange == 'function') this.<?= $appName ?>.nopProvChange(); }"
			class="form-control px-1 text-center"
			maxlength="2" />
	</div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$daerahName" ?>"
			@input="nopNextAfter($event, <?= "$nopName.$daerahName" ?>, 2)"
			@change="function(){ if(typeof this.<?= $appName ?>.nopDaerahChange == 'function') this.<?= $appName ?>.nopDaerahChange(); }"
			class="form-control px-1 text-center"
			maxlength="2" />
	</div>
	<div class="me-1" style="width:40px">
		<input v-model="<?= "$nopName.$kecName" ?>"
			@input="nopNextAfter($event, <?= "$nopName.$kecName" ?>, 3)"
			@change="function(){ if(typeof this.<?= $appName ?>.nopKecamatanChange == 'function') this.<?= $appName ?>.nopKecamatanChange(); }"
			class="form-control px-1 text-center"
			maxlength="3" />
	</div>
	<div class="me-1" style="width:40px">
		<input v-model="<?= "$nopName.$kelName" ?>"
			@input="nopNextAfter($event, <?= "$nopName.$kelName" ?>, 3)"
			@change="function(){ if(typeof this.<?= $appName ?>.nopKelurahanChange == 'function') this.<?= $appName ?>.nopKelurahanChange(); }"
			class="form-control px-1 text-center"
			maxlength="3" />
	</div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$blokName" ?>"
			@input="nopNextAfter($event, <?= "$nopName.$blokName" ?>, 3)"
			@change="function(){ if(typeof this.<?= $appName ?>.nopBlokChange == 'function') this.<?= $appName ?>.nopBlokChange(); }"
			class="form-control px-1 text-center"
			maxlength="3" />
	</div>
	<div class="me-1" style="width:50px">
		<input v-model="<?= "$nopName.$urutName" ?>"
			@input="nopNextAfter($event, <?= "$nopName.$urutName" ?>, 4)"
			@change="function(){ if(typeof this.<?= $appName ?>.nopUrutChange == 'function') this.<?= $appName ?>.nopUrutChange(); }"
			class="form-control px-1 text-center"
			maxlength="4" />
	</div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$jenisOPName" ?>"
			@change="function(){}"
			class="form-control px-1 text-center"
			maxlength="1" />
	</div>
</div>

<!-- <div class="d-flex">
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$provName" ?>" @input="nopNextAfter($event, <?= "$nopName.$provName" ?>, 2)" @change="nopProvChange" class="form-control px-1 text-center" maxlength="2"></div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$daerahName" ?>" @input="nopNextAfter($event, <?= "$nopName.$daerahName" ?>, 2)" @change="nopDaerahChange" class="form-control px-1 text-center" maxlength="2"></div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$kecName" ?>" @input="nopNextAfter($event, <?= "$nopName.$kecName" ?>, 3)" @change="nopKecChange" class="form-control px-1 text-center" maxlength="3"></div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$kelName" ?>" @input="nopNextAfter($event, <?= "$nopName.$kelName" ?>, 3)" @change="nopKelChange" class="form-control px-1 text-center" maxlength="3"></div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$blokName" ?>" @input="nopNextAfter($event, <?= "$nopName.$blokName" ?>, 3)" @change="nopBlokChange" class="form-control px-1 text-center" maxlength="3"></div>
	<div class="me-1" style="width:50px"><input v-model="<?= "$nopName.$urutName" ?>" @input="nopNextAfter($event, <?= "$nopName.$urutName" ?>, 4)" @change="nopUrutChange" class="form-control px-1 text-center" maxlength="4"></div>
	<div class="me-1" style="width:30px">
		<input v-model="<?= "$nopName.$jenisOPName" ?>" @change="nopJenisChange" class="form-control px-1 text-center" maxlength="1"></div>
</div> -->
