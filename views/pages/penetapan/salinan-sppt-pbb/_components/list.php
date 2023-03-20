<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/_common/region.js?v=20221108a');
$this->registerJsFile('@web/js/services/_common/table-nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/penetapan/salinan-sppt-pbb/list.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-region-sppt.php'); ?>
<div class="card mb-4">
  <div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/part-table-nop.php'); ?>
		<div class="row justify-content-center align-items-center g-2 mt-4">
			<div class="col-2 text-end">Tanggal Terbit</div>
			<div class="col-2">
				<datepicker v-model="data.datePublish" format="DD/MM/YYYY" />
			</div>
		</div>
		<div class="row justify-content-center align-items-center g-2 mt-2">
			<div class="col-3">
				<button type="button" class="btn btn-outline-secondary w-100">Hapus</button>
			</div>
			<div class="col-3">
				<button type="button" class="btn btn-outline-secondary w-100" @click="onSearching('salinan', $event)">Cari NOP</button>
			</div>
			<div class="col-3">
				<button type="button" class="btn btn-outline-secondary w-100">Edit NOP</button>
			</div>
			<div class="col-3">
				<button type="button" class="btn btn-outline-secondary w-100">Batal</button>
			</div>
		</div>
	</div>
</div>
<?php include Yii::getAlias('@vwCompPath/bscope/part-print-type.php'); ?>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />