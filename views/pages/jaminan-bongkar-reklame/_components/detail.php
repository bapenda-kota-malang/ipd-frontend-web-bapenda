<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/refs/reklame.js?v=20221108a');
$this->registerJsFile('@web/js/services/jambong/detail.js?v=20221117a');
?>


<div class="card mb-4">
	<div class="card-header fw-600">
		Perhitungan
	</div>
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Jenis Reklame</div>
					<div class="col-7">
						<input id="jenisReklame" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Batas Pengambilan</div>
					<div class="col-7">
						<input id="batasTanggal" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Nomor</div>
					<div class="col-7">
						<input :value="data.nomor" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Tanggal</div>
					<div class="col-7">
						<input id="tanggal" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Nomor SKPD</div>
					<div class="col-7">
						<input id="skpd" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Tanggal SKPD</div>
					<div class="col-7">
						<input id="tanggalSkpd" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 text-end mt-2">Tahun</div>
					<div class="col-7">
						<input id="tahunSkpd" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">NPWPD</div>
					<div class="col-7">
						<input id="npwpd" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Nama WP</div>
					<div class="col-7">
						<input id="namaWp" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-2 mt-2">Alamat WP</div>
					<div class="col-8" style="margin-left: 29px; width: 581px;">
						<input id="alamatWp" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Biaya Pemutusan Listrik</div>
					<div class="col-7">
						<input id="biayaPemutusan" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-5 mt-2">Nominal</div>
					<div class="col-7">
						<input id="nominal" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-5 xc-xl-4 mt-1">Dimensi Reklame</div>
					<div class="col-md mb-2 mt-1">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio1" value="persegi">
							<label class="form-check-label" for="radio1">Persegi</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio2" value="persegi-panjang">
							<label class="form-check-label" for="radio2">Persegi Panjang</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio3" value="lingkaran">
							<label class="form-check-label" for="radio3">Lingkaran</label>
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
	<div v-if="!data.loading" class="card-body">
	</div>
	<div v-if="!data.loading" class="card-body">
		<table class="table fit-form-control">
			<thead>
				<tr>
					<th>Tipe Reklame</th>
					<th style="width:60px">P</th>
					<th style="width:60px">L</th>
					<th style="width:60px">Sisi</th>
					<th style="width:60px">Diameter</th>
					<th style="width:60px">Jumlah</th>
					<th>Mulai</th>
					<th>Akhir</th>
					<th style="min-width:160px">Tarif</th>
					<th>Jambong</th>
				</tr>
			</thead>
			<tbody v-if="data.detailJambong">
				<tr v-for="(item, idx) in data.detailJambong" :key="idx">
					<td><input v-if="item.tarifreklame" :value="item.tarifreklame.jenisMasa" class="form-control" disabled /></td>
					<td><input :value="item.panjang" class="form-control" disabled /></td>
					<td><input :value="item.lebar" class="form-control" disabled /></td>
					<td><input :value="item.sisi" class="form-control" disabled /></td>
					<td><input :value="item.diameter" class="form-control" disabled /></td>
					<td><input :value="item.jumlah" class="form-control" disabled /></td>
					<td><input :value="item.tarifTahun" class="form-control" disabled /></td>
					<td><input :value="item.jumlahRp" class="form-control" disabled /></td>
					<td><input v-if="item.tarifreklame" :value="item.tarifreklame.tarif" class="form-control" disabled /></td>
					<td><input :value="item.tarifJambong_id" class="form-control" disabled /></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
