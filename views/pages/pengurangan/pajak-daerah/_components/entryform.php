<?php
$attachType = 'full';
$taxType = 'pengurangan';

include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-header.php');
$this->registerJsFile('@web/js/services/pengurangan/entry-pajak-daerah.js?v=20221108a');
include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-entry.php');
?>
