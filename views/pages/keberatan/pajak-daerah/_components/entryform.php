<?php
$attachType = 'full';
$taxType = 'keberatan';

$this->registerJsFile('@web/js/services/keberatan/entry-pajak-daerah.js?v=20221108a');
include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-all-entry.php');
?>
