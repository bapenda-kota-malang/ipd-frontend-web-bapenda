<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/lihat/sejarah-sppt/list.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-nop.php'); ?>
<div class="card mb-4">
</div>

<div>
	<div class="table-responsive">
		<table class="table custom">
			<thead>
				<tr>
					<th>Nomor Pelayanan</th>
					<th>Tahun</th>
					<th>Jenis Pelayanan</th>
				</tr>
			<tbody>
				<tr v-for="(item, index) in 5">
					<td>2023-0001-015</td>
					<td>2022</td>
					<td>09 - Restitusi Dan Kompensasi</td>
				</tr>
			</tbody>
			</thead>
		</table>
	</div>