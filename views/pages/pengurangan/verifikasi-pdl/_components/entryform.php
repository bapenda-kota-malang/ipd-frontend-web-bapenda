<?php
$attachType = 'notfull';
$taxType = 'pengurangan';

$this->registerJsFile('@web/js/services/pengurangan/entry-verifikasi-pdl.js?v=20221108a');
include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-entry.php');
?>
