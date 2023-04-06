<?php
$attachType = 'full';
$attachView = true;
$taxType = 'pengurangan';

include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-header.php');
$paramJobName = 'new';
$this->registerJsFile('@web/js/services/pengurangan/detail-pajak-daerah.js?v=20221108a');
include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-entry.php');
?>
