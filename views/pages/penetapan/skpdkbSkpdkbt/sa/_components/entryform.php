<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);


$this->registerJsFile('@web/js/dto/skpdkb-skpdkbt/sa/entry.js?v=20221114a');
$this->registerJsFile('@web/js/services/skpdkb-skpdkbt/sa/entry.js?v=20221117a');

?>

<!-- Penetapan -->
<div class="card mb-4">
	<div class="card-header">Penetapan</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Penetapan Berdasarkan</label>
				<select class="form-control">
					<option v-for="(v, i) in optionPenetapans" :key="i">{{v}}</option>
				</select>
			</div>
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Billing Penetapan</label>
				<input type="text" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-4 col-xl-6 col-xxl-4 mb-2">
				<label for="">Jenis Pajak</label>
				<input type="text" class="form-control" disabled>
			</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<label for="">&nbsp;</label>
				<input type="text" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-4 col-xl-4 col-xxl-4 mb-2">
				<label for="">Tanggal Penetapan</label>
				<input type="text" class="form-control" disabled>
			</div>
			<div class="xc-md xc-lg-4 col-xl-4 col-xxl-4 mb-2">
				<label for="">Tanggal Batas Bayar</label>
				<input type="text" class="form-control" disabled>
			</div>
			<div class="xc-md xc-lg-2 col-xl-2  col-xxl-2 mb-2">
				<button class="btn bg-blue ms-2 mt-3" style="font-size: 11px;">
					Buat SPTPD Baru
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Riwayat SKPD -->
<div class="card mb-4">
	<div class="card-header">Data SPTPD Hotel</div>
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-md-2 col-xl-1 pt-1">NPWPD <span style="color: red;">*</span></div>
			<div class="col-2 col-md-1"><input class="form-control" /></div>
			<div class="col-md-2 col-xl-1 pt-1">Tanggal</div>
			<div class="col col-md-4 col-lg-4 col-xl-4 mb-2"><input class="form-control" type="date" /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-2 col-xl-1 pt-1">Jenis Pajak</div>
			<div class="col-2 col-md-1"><input class="form-control" disabled /></div>
			<div class="col col-md-4 col-lg-4 col-xl-4 mb-2"><input class="form-control" type="text" disabled /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-2 col-xl-1 pt-1">Nama</div>
			<div class="col col-md-4"><input class="form-control" disabled /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-2 col-xl-1 pt-1">Alamat</div>
			<div class="col col-md-4"><input class="form-control" disabled /></div>
			<div class="col-md-2 col-xl-1 pt-1">RT/RW</div>
			<div class="col-2 col-md-2"><input class="form-control" disabled /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-2 col-xl-1 pt-1">Kelurahan</div>
			<div class="col col-md-4"><input class="form-control" disabled /></div>
		</div>
	</div>
</div>

<!-- detail objek pajak hotel -->
<div class="card mb-4">
	<div class="card-header">Detail Objek Pajak Hotel</div>
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-md-12">
				<table class="table table-inverse table-responsive">
					<thead class="thead-inverse">
						<tr class="table-light">
							<th>
								<input type="checkbox" name="" id="">
							</th>
							<th>Golongan Kamar</th>
							<th>Tarif</th>
							<th>Jumlah Kamar</th>
							<th>Jumlah Kamar Yang Laku</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, index) in listObjectPajakHotels" :key="index">
							<td scope="row"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<button class="btn bg-red" @click="removeRowObjekPajakHotel(index)"><i class="bi bi-trash"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-2">
				<button class="btn bg-blue" @click="addRowObjekPajakHotel">Tambah</button>
			</div>
		</div>
	</div>
</div>

<!-- estimasi perhitungan pajak -->
<div class="card mb-4">
	<div class="card-header">Estimasi Perhitungan Pajak</div>
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-md-1 pt-1">Nomor SPT</div>
			<div class="col col-md-3"><input class="form-control" disabled /></div>
			<div class="col-md-1 pt-1">Tanggal</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="text" disabled /></div>
			<div class="col-md-1 pt-1">Virtual Account</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="text" disabled /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-1 pt-1">Periode Awal</div>
			<div class="col col-md-3"><input class="form-control" type="date" /></div>
			<div class="col-md-1 pt-1">Periode Akhir</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="date" /></div>
			<div class="col-md-1 pt-1">Jatuh Tempo</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="date" /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-1 pt-1">Sub Total E-Tax</div>
			<div class="col col-md-3"><input class="form-control" type="text" disabled></div>
			<div class="col-md-1 pt-1">Tax E-Tax</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="text" disabled /></div>
			<div class="col-md-1 pt-1">Jatuh Tempo</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="text" disabled /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-1 pt-1">Potensi <span style="color:red">*</span></div>
			<div class="col col-md-3"><input class="form-control" type="text" /></div>
			<div class="col-md-1 pt-1">Tarif Pajak (%)</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="text" disabled /></div>
			<div class="col-md-1 pt-1">Jumlah Pajak</div>
			<div class="col col-md-3 mb-2"><input class="form-control" type="text" disabled /></div>
		</div>
		<div class="row mb-2">
			<div class="col-md-1 pt-1">Keterangan <span style="color:red">*</span></div>
			<div class="col col-md-6"><input class="form-control" type="text" /></div>
		</div>
	</div>
</div>

<!-- riwayat SPTPD -->
<div class="card mb-4">
	<div class="card-header">Riwayat SPTPD</div>
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-md-12">
				<table class="table table-inverse table-responsive">
					<thead class="thead-inverse">
						<tr class="table-light">
							<th>No SPTPD/SKPDKB</th>
							<th>Nominal</th>
							<th>Tanggal Pembayaran</th>
							<th>Masa Pajak</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="i in 5">
							<td scope="row">A-2201200</td>
							<td>Rp. XXX.XXX</td>
							<td>DD-MM-YYYY</td>
							<td>September 2022</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>