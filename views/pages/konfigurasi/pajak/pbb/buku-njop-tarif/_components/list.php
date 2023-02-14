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
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="daftar-buku-tab" data-bs-toggle="tab" data-bs-target="#daftar-buku" type="button" role="tab" aria-controls="daftar-buku" aria-selected="true">Daftar Buku</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="njoptkp-tab" data-bs-toggle="tab" data-bs-target="#njoptkp" type="button" role="tab" aria-controls="njoptkp" aria-selected="false">NJOPTKP</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="tarif-tab" data-bs-toggle="tab" data-bs-target="#tarif" type="button" role="tab" aria-controls="tarif" aria-selected="false">Tarif</button>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane active" id="daftar-buku" role="tabpanel" aria-labelledby="daftar-buku-tab">
			<div class="table-responsive">
				<table class="table fit-form-control mb-2">
					<thead>
						<tr class="text-center">
							<th colspan="3">Tahun</th>
							<th colspan="2">Nilai NJOP</th>
						</tr>
						<tr>
							<th>Awal</th>
							<th>Akhir</th>
							<th>Buku</th>
							<th>Min</th>
							<th>Max</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, index) in 5">
							<td>
								<input type="text" class="form-control" value="2000">
							</td>
							<td>
								<input type="text" class="form-control" value="2000">
							</td>
							<td>
								<input type="text" class="form-control" value="2000">
							</td>
							<td>
								<input type="text" class="form-control" value="1.000.000">
							</td>
							<td>
								<input type="text" class="form-control" value="2.000.000">
							</td>
						</tr>
					</tbody>
					<tfoot>
						<!-- save button -->
						<tr>
							<td colspan="5" class="p-3 text-center">
								<button type="button" class="btn btn-primary">Simpan</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="njoptkp" role="tabpanel" aria-labelledby="njoptkp-tab">
			<div class="table-responsive">
				<table class="table fit-form-control">
					<thead>
						<tr class="text-center">
							<th colspan="5">Tahun</th>
						</tr>
						<tr>
							<th>Provinsi</th>
							<th>Kota</th>
							<th>Awal</th>
							<th>Akhir</th>
							<th>Nilai x1.000</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, index) in 5">
							<td>
								<input type="text" class="form-control" value="35">
							</td>
							<td>
								<input type="text" class="form-control" value="73">
							</td>
							<td>
								<input type="text" class="form-control" value="1999">
							</td>
							<td>
								<input type="text" class="form-control" value="2012">
							</td>
							<td>
								<input type="text" class="form-control" value="10000">
							</td>
						</tr>
					</tbody>
					<tfoot>
						<!-- save button -->
						<tr>
							<td colspan="5" class="p-3 text-center">
								<button type="button" class="btn btn-primary">Simpan</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="tab-pane" id="tarif" role="tabpanel" aria-labelledby="tarif-tab">
			<div class="table-responsive">
				<table class="table fit-form-control">
					<thead>
						<tr class="text-center">
							<th colspan="4">Tahun</th>
							<th colspan="3">Nilai NJOP</th>
						</tr>
						<tr>
							<th>Provinsi</th>
							<th>Kota</th>
							<th>Awal</th>
							<th>Akhir</th>
							<th>Min</th>
							<th>Max</th>
							<th>Nilai %</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, index) in 5">
							<td>
								<input type="text" class="form-control" value="35">
							</td>
							<td>
								<input type="text" class="form-control" value="73">
							</td>
							<td>
								<input type="text" class="form-control" value="1999">
							</td>
							<td>
								<input type="text" class="form-control" value="2012">
							</td>
							<td>
								<input type="text" class="form-control" value="10000">
							</td>
							<td>
								<input type="text" class="form-control" value="10000000">
							</td>
							<td>
								<input type="text" class="form-control" value="0.5">
							</td>
						</tr>
					</tbody>
					<tfoot>
						<!-- save button -->
						<tr>
							<td colspan="5" class="p-3 text-center">
								<button type="button" class="btn btn-primary">Simpan</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>