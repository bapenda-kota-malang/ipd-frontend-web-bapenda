<?php

// use yii\web\View;
// use app\assets\VueAppEntryFormLegacyAsset;

// VueAppEntryFormLegacyAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

// $this->registerJsFile('@web/js/dto/jambong/entry.js?v=20221114a');
// $this->registerJsFile('@web/js/services/jambong/entry.js?v=20221117a');

?>
<div class="row g-2">
	<div class="col-6">
		<div class="row">
			<div class="col-3 text-left">Provinsi</div>
			<div class="col">
				<select class="form-control">
					<option value="">Pilih Provinsi</option>
				</select>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-3 text-left">Dati II</div>
			<div class="col">
				<select class="form-control">
					<option value="">Pilih Dati II</option>
				</select>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-3 text-left">Kecamatan</div>
			<div class="col">
				<select class="form-control">
					<option value="">Pilih Kecamatan</option>
				</select>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-3 text-left">Tahun</div>
			<div class="col">
				<input type="text" class="form-control" />
			</div>
		</div>
	</div>
</div>

<div class="row mt-4">
	<div class="col">
		<div class="table-responsive">
			<table class="table fit-form-control">
				<thead>
					<tr>
						<th scope="col">Pilih Kelurahan</th>
						<th scope="col">BT</th>
						<th scope="col">BP</th>
						<th scope="col">Kd TP</th>
						<th scope="col">Nama Tempat Pembayaran</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(val, key) in 5">
						<td>
							<select class="form-control">
								<option value="">Pilih Kelurahan</option>
							</select>
						</td>
						<td>
							<input type="text" class="form-control" />
						</td>
						<td>
							<input type="text" class="form-control" />
						</td>
						<td>
							<input type="text" class="form-control" />
						</td>
						<td>
							<input type="text" class="form-control" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>