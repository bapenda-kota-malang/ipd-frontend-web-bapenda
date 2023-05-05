<?php

$scope = ' Surat Tagihan Pajak Daerah';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-pemeriksaan/surat-tagihan-pd';
// $showEdit = true;
// $editUrl = '/penagihan-pemeriksaan/surat-tagihan-pd/'.$id.'/edit';
$footerNav = 
	'<a href="/output/pdf/surat-tagihan-pd" target="_blank" class="btn bg-green ms-2"><i class="bi bi-file-pdf me-1"></i>Output PDF</a>'.
	'<button @click="konfirmTerbit" class="btn bg-orange ms-2"><i class="bi bi-send me-1"></i>Terbitkan</button>';


$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
