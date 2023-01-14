<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/spptsimulasi/simulasi.js?v=20221108a');
$this->registerJsFile('@web/js/services/spptsimulasi/simulasi.js?v=20221108b');

?>

<div class="card mb-4">
	<div class="card-body">
		<div class="">

		<div class="row g-0 mb-3">
			<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Propinsi</div>
				<div class="col-md-9 col-lg-11 col-xl-10">
					<div class="row g-0 mb-3">
						<div class="col-md-1"><input v-model="data.provinsiID" class="form-control" @input="propinsiChanged($event)"/></div>
						<div class="col-md-11"><input v-model="data.namaPropinsi" class="form-control" disabled /></div>
					</div>
				</div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Dati II</div>
				<div class="col-md-9 col-lg-11 col-xl-10">
					<div class="row g-0 mb-3">
						<div class="col-md-1"><input v-model="data.kotaID" class="form-control" @input="dati2Changed($event)"/></div>
						<div class="col-md-11"><input  v-model="data.namaKota" class="form-control" disabled /></div>
					</div>
				</div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Kecamatan</div>
				<div class="col-md-9 col-lg-11 col-xl-10">
					<div class="row g-0 mb-3">
						<div class="col-md-1"><input v-model="data.kecamatanID" class="form-control" @input="kecamatanChanged($event)"/></div>
						<div class="col-md-11"><input v-model="data.namaKecamatan" class="form-control" disabled /></div>
					</div>
				</div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Kelurahan</div>
				<div class="col-md-9 col-lg-11 col-xl-10">
					<div class="row g-0 mb-3">
						<div class="col-md-1"><input v-model="data.kelurahanID" class="form-control" @input="kelurahanChanged($event)"/></div>
						<div class="col-md-11"><input v-model="data.namaKelurahan" class="form-control" disabled /></div>
					</div>
				</div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Tahun Pajak</div>
				<div class="col-md-1"><input v-model="data.tahunPajak" class="form-control" /></div>
			</div>
		</div>

		<div class="p-3">
			<table style="font-size:9pt" align="center">
				<thead>
					<tr>
						<th class="text-center"> </th>
						<th class="text-center">Buku 1</th>
						<th class="text-center">Buku 2</th>
						<th class="text-center">Buku 3</th>
						<th class="text-center">Buku 4</th>
						<th class="text-center">Buku 5</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tgl Jatuh Tempo &nbsp;&nbsp;&nbsp;</td>
						<td><datepicker v-model="data.bukuJatuhTempo[0]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuJatuhTempo[1]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuJatuhTempo[2]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuJatuhTempo[3]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuJatuhTempo[4]" class="form-control" format="DD/MM/YYYY" /></td>
					</tr>
					<tr>
						<td>Tgl Terbit </td>
						<td><datepicker v-model="data.bukuTerbit[0]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuTerbit[1]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuTerbit[2]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuTerbit[3]" class="form-control" format="DD/MM/YYYY" /></td>
						<td><datepicker v-model="data.bukuTerbit[4]" class="form-control" format="DD/MM/YYYY" /></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Jenis Cetakan
	</div> -->
	<div class="card-body">
		<div class="row g-1">
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">Jumlah OP :</div>
					<div class="col-7"><input v-model="jumlahOP" class="form-control"></div>
				</div>
			</div>
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">OP ke :</div>
					<div class="col-7"><input v-model="opKe" class="form-control"></div>
				</div>
			</div>
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">NOP</div>
					<div class="col-3"><input v-model="blokKe" class="form-control"></div>
					<div class="col-3"><input v-model="urutKe" class="form-control"></div>
					<div class="col-2"><input v-model="jnsKe" class="form-control"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />