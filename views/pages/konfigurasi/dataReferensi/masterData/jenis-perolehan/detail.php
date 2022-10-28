<?php

$scope = ' Jenis Perolehan';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/data-referensi/master-data/jenis-perolehan';
$showEdit = true;

$editUrl = '/konfigurasi/data-referensi/master-data/jenis-perolehan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
