<?php
use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/_common/region.js?v=20221108a');
$this->registerJsFile('@web/js/services/_common/table-nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/lihat/catatan-sejarah-op/list.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-region-sppt.php'); ?>
<div class="card mb-4">
  <div class="card-body table-responsive-xl">
		<table class="table table-bordered custom">
			<thead class="thead">
				<tr>
					<th scope="col" class="text-center">Nomor Objek Pajak</th>
					<th scope="col" class="text-center">Nama Petugas Pendata</th>
					<th scope="col" class="text-center">Nama Petugas Operator</th>
					<th scope="col" class="text-center">Jenis Mutasi</th>
					<th scope="col" class="text-center">Tanggal Mutasi</th>
					<th scope="col" class="text-center">PBB Asal</th>
					<th scope="col" class="text-center">PBB Baru</th>
					<th scope="col" class="text-center">%</th>
				</tr>
			<tbody>
				<tr v-for="i in 10" :key="i">
					<td v-for="j in 8" :key="j">&nbsp;</td>
				</tr>
			</tbody>
			</thead>
		</table>
	</div>
</div>