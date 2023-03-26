<?php

$this->params['container_unset'] = true;

$scope = ' NOP Terbesar';
$action = 'Daftar';

$file = __DIR__ . '/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
