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
    <div class="me-1" style="width:30px"><input v-model="<?= "$nopName.$provName" ?>" @input="nopNextAfter($event, <?= "$nopName.$provName" ?>, 2)" class="form-control px-1 text-center" maxlength="2"></div>
    <div class="me-1" style="width:30px"><input v-model="<?= "$nopName.$daerahName" ?>" @input="nopNextAfter($event, <?= "$nopName.$daerahName" ?>, 2)" class="form-control px-1 text-center" maxlength="2"></div>
    <div class="me-1" style="width:40px"><input v-model="<?= "$nopName.$kecName" ?>" @input="nopNextAfter($event, <?= "$nopName.$kecName" ?>, 3)" class="form-control px-1 text-center" maxlength="3"></div>
    <div class="me-1" style="width:40px"><input v-model="<?= "$nopName.$kelName" ?>" @input="nopNextAfter($event, <?= "$nopName.$kelName" ?>, 3)" class="form-control px-1 text-center" maxlength="3"></div>
    <div class="me-1" style="width:40px"><input v-model="<?= "$nopName.$blokName" ?>" @input="nopNextAfter($event, <?= "$nopName.$blokName" ?>, 3)" class="form-control px-1 text-center" maxlength="3"></div>
    <div class="me-1" style="width:50px"><input v-model="<?= "$nopName.$urutName" ?>" @input="nopNextAfter($event, <?= "$nopName.$urutName" ?>, 4)" class="form-control px-1 text-center" maxlength="4"></div>
    <div class="me-1" style="width:30px"><input v-model="<?= "$nopName.$jenisOPName" ?>" class="form-control px-1 text-center" maxlength="1"></div>
</div>