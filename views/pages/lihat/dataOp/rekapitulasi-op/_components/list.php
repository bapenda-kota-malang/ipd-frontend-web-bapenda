<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/_common/region.js?v=20221108a');
$this->registerJsFile('@web/js/services/lihat/rekapitulasi-op/list.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-region-op.php'); ?>
<div class="card mb-4">
  <div class="card-body table-responsive-xl">
		<table class="table table-bordered custom">
			<thead class="thead">
				<tr>
					<th scope="col" class="text-center">No</th>
					<th scope="col" class="text-center">Nama Petugas Pendata</th>
					<th scope="col" class="text-center">Jumlah OP / Jumlah BNG</th>
					<th scope="col" class="text-center">Luas Total Bumi / Luas Total BNG</th>
					<th scope="col" class="text-center">NJOP Bumi / NJOP BNG</th>
					<th scope="col" class="text-center">Tahun Pajak / Jumlah SPPT</th>
					<th scope="col" class="text-center">PBB Terhutang / PBB Harus Dibayar</th>
					<th scope="col" class="text-center">Lunas / Jatuh Tempo</th>
					<th scope="col" class="text-center">Pembayaran SPPT / Pembayaran SKP SPOP</th>
				</tr>
			<tbody>
				<tr v-for="i in 10" :key="i">
					<td style="font-weight: 600">{{ i }}</td>
					<td v-for="j in 8" :key="j">&nbsp;</td>
				</tr>
			</tbody>
			</thead>
		</table>
	</div>
</div>
