<?php
$attachType = 'notfull';
$taxType = 'pengurangan';

include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-header.php');
$this->registerJsFile('@web/js/services/pengurangan/detail-verifikasi-pdl.js?v=20221108a');
include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-entry.php');
?>
