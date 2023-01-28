<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/jambong/entry.js?v=20221114a');
$this->registerJsFile('@web/js/services/jambong/entry.js?v=20221117a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">
		Perhitungan
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1">Jenis Reklame</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1 text-lg-end">Batas Pengambilan</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1">Nomor</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1 text-lg-end">Tanggal</div>
					<div class="col-md mb-2">
						<datepicker v-model="data.spt.periodeAwal" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1">Nomor SKPD</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1 text-lg-end">Tgl SKPD</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1 text-lg-end">Tahun</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1">NPWPD</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-4 mt-1 text-lg-end">Nama WP</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control w-75" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-4 mt-1">Alamat WP</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-8 mt-1">Biaya Pemutusan Listrik</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-4 mt-1 text-lg-end">Nominal</div>
					<div class="col-md mb-2">
						<input type="text" class="form-control w-75" />
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-4 mt-1">Dimensi Reklame</div>
					<div class="col-md mb-2 mt-1">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
							<label class="form-check-label" for="inlineRadio1">Persegi</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
							<label class="form-check-label" for="inlineRadio2">Persegi Panjang</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
							<label class="form-check-label" for="inlineRadio3">Lingkaran</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">
		Item
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>Tipe Reklame</th>
					<th>P</th>
					<th>L</th>
					<th>Sisi</th>
					<th>Diameter</th>
					<th>Panjang</th>
					<th>Jumlah</th>
					<th>Mulai</th>
					<th>Akhir</th>
					<th>Tarif</th>
					<th>Jambong</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>
