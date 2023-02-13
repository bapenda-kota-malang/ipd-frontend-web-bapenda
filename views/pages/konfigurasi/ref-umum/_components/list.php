<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<div>
	<table class="table custom">
		<thead>
			<tr>
				<th>Kode</th>
				<th>Keterangan</th>
				<th>Isi Referensi (Max 250 karakter)</th>
			</tr>
		<tbody>
			<tr v-for="(item, index) in 5">
				<td>
					<input type="text" class="form-control" placeholder="kode">
				</td>
				<td>
					<input type="text" class="form-control" placeholder="ketarangan">
				</td>
				<td>
					<textarea class="form-control" placeholder="referensi"></textarea>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="9">
					<div class="row">
						<div class="col-4">
							<button class="btn btn-block btn-primary">Simpan</button>
						</div>
					</div>
				</td>
			</tr>
		</tfoot>
		</thead>
	</table>
</div>