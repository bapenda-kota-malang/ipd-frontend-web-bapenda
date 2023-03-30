<?php
$attachType = 'full';
$taxType = 'pengurangan';

$this->registerJsFile('@web/js/services/pengurangan/entry-pajak-daerah.js?v=20221108a');
include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-entry.php');
?>
