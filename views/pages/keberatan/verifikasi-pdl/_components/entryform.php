<?php
$attachType = 'full';
$taxType = 'keberatan';

include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-header.php');
$this->registerJsFile('@web/js/services/keberatan/entry-verifikasi-pdl.js?v=20221108a');
include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-entry.php');
?>
