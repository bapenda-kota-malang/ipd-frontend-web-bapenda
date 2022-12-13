<?php

$scope = ' Simulasi Penetapan Massal PBB';
$action = 'Tambah';
$showBack = true;
$backUrl = '/penetapan/simulasi-penetapan-massal-pbb';
$showCancel = true;
$cancelUrl = '/penetapan/simulasi-penetapan-massal-pbb';
$showOK = true;
$showCetak = true;

$footerNav = '<button @click="submitSPPT" class="btn bg-blue ms-2">
                <i class="bi bi-check-lg"></i> SPPT
             </button>';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
