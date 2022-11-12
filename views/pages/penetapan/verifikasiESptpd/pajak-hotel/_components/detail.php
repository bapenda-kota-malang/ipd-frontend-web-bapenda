<?php

use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/dto/npwpd/detail.js?v=20221108a');
$this->registerJsFile('@web/js/services/verifikasi-esptpd/detail.js?v=20221108a');

include __DIR__.'/../../_components/detail.php';

?>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
