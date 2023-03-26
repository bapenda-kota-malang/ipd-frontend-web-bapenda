<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/lihat/sejarah-sppt/list.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-nop.php'); ?>
<div class="mt-4">
	<div class="table-responsive">	
		<table class="table table-bordered custom">
			<thead class="thead">
				<tr>
					<th scope="col" class="text-center text-uppercase">Nomor Pelayanan</th>
					<th scope="col" class="text-center text-uppercase">Tahun</th>
					<th scope="col" class="text-center text-uppercase">Jenis Pelayanan</th>
				</tr>
			<tbody>
				<tr v-for="i in 10" :key="i">
					<td v-for="j in 3" :key="j">&nbsp;</td>
				</tr>
			</tbody>
			</thead>
		</table>
	</div>
</div>
