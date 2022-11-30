<?php

$scope = ' Surat Tagihan Pajak Daerah';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-pemeriksaan/surat-tagihan-pd';
$showEdit = true;
$editUrl = '/penagihan-pemeriksaan/surat-tagihan-pd/'.$id.'/edit';
$footerNav = 
	'<button class="btn bg-green ms-2"><i class="bi bi-printer me-1"></i>Cetak</button>'.
	'<button class="btn bg-orange ms-2"><i class="bi bi-send me-1"></i>Terbitkan</button>';


$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
