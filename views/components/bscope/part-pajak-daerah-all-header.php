<?php
use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/util.js');
$this->registerJsFile('@web/js/refs/penguranganStatusCode.js?v=20221108a');
$this->registerJsFile('@web/js/services/_common/modal-reject.js?v=20221108a');
$this->registerJsFile('@web/js/services/_common/pajak-daerah.js?v=20221108a');

$paramJobName = Yii::$app->getRequest()->getQueryParam('job_name');
$subTitle = isset($taxType) && $taxType === 'keberatan' ? 'Keberatan PDL' :  'Pengurangan PDL';
?>