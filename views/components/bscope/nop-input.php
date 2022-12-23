<?php

$nopName = isset($nopName) ? $nopName : 'nop';
$provName = isset($provName) ? $provName : 'provinsi_kode';
$daerahName = isset($daerahName) ? $daerahName : 'daerah_kode';
$kecName = isset($kecName) ? $kecName : 'kecamatan_kode';
$kelName = isset($kelName) ? $kelName : 'kelurahan_kode';
$blokName = isset($blokName) ? $blokName : 'kodeBlok';
$urutName = isset($urutName) ? $urutName : 'noUrut';
$jenisOPName = isset($jenisOPName) ? $jenisOPName : 'kodeJenisOp';

?>
<div class="d-flex">
    <div class="me-1" style="width:30px"><input v-model="<?= "$nopName.$provName" ?>" class="form-control px-1 text-center" maxlength="2"></div>
    <div class="me-1" style="width:30px"><input v-model="<?= "$nopName.$daerahName" ?>" class="form-control px-1 text-center" maxlength="2"></div>
    <div class="me-1" style="width:40px"><input v-model="<?= "$nopName.$kecName" ?>" class="form-control px-1 text-center" maxlength="3"></div>
    <div class="me-1" style="width:40px"><input v-model="<?= "$nopName.$kelName" ?>" class="form-control px-1 text-center" maxlength="3"></div>
    <div class="me-1" style="width:40px"><input v-model="<?= "$nopName.$blokName" ?>" class="form-control px-1 text-center" maxlength="3"></div>
    <div class="me-1" style="width:50px"><input v-model="<?= "$nopName.$urutName" ?>" class="form-control px-1 text-center" maxlength="4"></div>
    <div class="me-1" style="width:30px"><input v-model="<?= "$nopName.$jenisOPName" ?>" class="form-control px-1 text-center" maxlength="2"></div>
</div>