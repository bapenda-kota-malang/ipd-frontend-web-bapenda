<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/lihat/sejarah-sppt/list.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-history-op.php'); ?>
<div class="card mb-4">
	<div class="card-header fw-600">
		History SPPT
	</div>
  <div class="card-body">	
		<table class="table table-bordered custom">
			<thead class="thead">
				<tr>
					<th scope="col" class="text-center text-uppercase">No</th>
					<th scope="col" class="text-center text-uppercase">Nama WP</th>
					<th scope="col" class="text-center text-uppercase">Jalan</th>
					<th scope="col" class="text-center text-uppercase">BL KV No</th>
					<th scope="col" class="text-center text-uppercase">RW</th>
					<th scope="col" class="text-center text-uppercase">RT</th>
				</tr>
			<tbody>
				<tr v-for="i in 10" :key="i">
					<td v-for="j in 6" :key="j">&nbsp;</td>
				</tr>
			</tbody>
			</thead>
		</table>
	</div>
</div>
