<?php

$scope = ' Simulasi Penetapan Massal PBB';
$action = 'Tambah';
$showBack = true;
$backUrl = '/penetapan/simulasi-penetapan-massal-pbb';
$showCancel = true;
$cancelUrl = '/penetapan/simulasi-penetapan-massal-pbb';
// $showOK = true;
$showCetak = true;

$footerNav = '  <button @click="submitProcess(data)" class="btn bg-blue ms-2">
                    <i class="bi bi-check-lg"></i> Process
                </button>
                &nbsp;
                <a href="sppt" class="btn bg-blue-300">
                    <i class="bi bi-check-left"></i> SPPT 
                </a>';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
