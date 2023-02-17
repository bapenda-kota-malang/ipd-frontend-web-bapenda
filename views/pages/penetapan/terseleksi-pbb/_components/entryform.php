<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/penetapan/terseleksi-pbb/entry.js?v=20221108a');
$this->registerJsFile('@web/js/services/penetapan/terseleksi-pbb/entry.js?v=20221108b');

?>
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Wilayah
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Propinsi</div>
			<div class="col-2 col-md-1"><input class="form-control" v-model="data.provinsiID" @input="propinsiChanged($event)" /></div>
			<div class="col col-md-4 col-lg-4 col-xl-4 mb-2"><input class="form-control" v-model="data.namaPropinsi" disabled /></div>
			<div class="col-md-2 col-xl-1 pt-1 text-lg-end">Kecamatan</div>
			<div class="col-2 col-md-1"><input class="form-control" v-model="data.kecamatanID" @input="kecamatanChanged($event)" /></div>
			<div class="col col-md-4 col-lg-4 col-xl-4 mb-2"><input class="form-control" v-model="data.namaKecamatan" disabled /></div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Dati II</div>
			<div class="col-2 col-md-1"><input class="form-control" v-model="data.dati2ID" @input="dati2Changed($event)" /></div>
			<div class="col col-md-4 col-lg-4 col-xl-4 mb-2"><input class="form-control" v-model="data.namaDati2" disabled /></div>
			<div class="col-md-2 col-xl-1 pt-1 text-lg-end">Kelurahan</div>
			<div class="col-2 col-md-1"><input class="form-control" v-model="data.kelurahanID" @input="kelurahanChanged($event)" /></div>
			<div class="col col-md-4 col-lg-4 col-xl-4 mb-2"><input class="form-control" v-model="data.namaKelurahan" disabled /></div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Tahun</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">
				<input v-model="data.tahun" maxlength="8" class="form-control">
				<span class="text-danger" v-if="dataErr['data.tahun']">{{dataErr['data.tahun']}}</span>
			</div>
		</div>

	</div>
</div>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Data 2
	</div> -->
	<div class="card-body">

		<div class="p-3">
			<table style="font-size:9pt" align="center">
				<thead>
					<tr>
						<th class="text-center">NOP</th>
						<th class="text-center"> </th>
						<th class="text-center">NOP</th>
						<th class="text-center">Jumlah</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<?php for ($i = 0; $i < 10; $i++) { ?>
						<tr>
							<td>
								<div class="col-md mb-2">
									<div class="row g-1">
										<div class="col-2"><input class="form-control" maxlength="5" /></div>
										<div class="col-2"><input class="form-control" maxlength="5" /></div>
										<div class="col-1"><input class="form-control" maxlength="2" /></div>
									</div>
								</div>
							</td>
							<td> S/D </td>
							<td>
								<div class="col-md mb-2">
									<div class="row g-1">
										<div class="col-2"><input class="form-control" maxlength="5" /></div>
										<div class="col-2"><input class="form-control" maxlength="5" /></div>
										<div class="col-1"><input class="form-control" maxlength="2" /></div>
									</div>
								</div>
							</td>
							<td><input type="text" class="form-control mb-2"></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-8 col-lg-6 pt-1">Tgl Jatuh Tempo</div>
					<div class="col col-lg-3 mb-2">
						<datepicker v-model="data.tanggalNpwpd" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col col-lg-4 col-xl-4 pt-1">Tgl Terbit</div>
					<div class="col col-lg-5 col-xl-4 mb-2">
						<datepicker v-model="data.tanggalPengukuhan" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-8 col-lg-6 pt-1">OP ke</div>
					<div class="col col-lg-3 mb-2"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col col-lg-4 col-xl-4 pt-1">NOP yang diproses</div>
					<div class="col col-lg-5 col-xl-4 mb-2">
						<div class="row g-1">
							<div class="col-5"><input class="form-control" maxlength="5" /></div>
							<div class="col-5"><input class="form-control" maxlength="5" /></div>
							<div class="col-2"><input class="form-control" maxlength="2" /></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Jenis Cetakan
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-4 col-md-3 col-xl-2">Buku</div>
			<div class="xc-md-6 xc-lg-4 xc-xl-3">
				<div>
					<vueselect v-model="data.buku_id" :options="bukuOpts" :reduce="item => item.id" label="name" code="id" />
				</div>
			</div>
			<div class="col col-md-2 col-xxl-1">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						SPPT
					</label>
				</div>
			</div>
			<div class="col-12 col-md-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						STTS
					</label>
				</div>
			</div>
			<div class="col-12 col-md-3 col-lg-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						DHKP
					</label>
				</div>
			</div>
		</div>

		<div class="row g-1 mt-4">
			<div class="col-4 col-md-3 col-xl-2"> </div>
			<div class="xc-md-6 xc-lg-4 xc-xl-3"></div>
			<div class="col col-md-2 col-xxl-1">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						SPPT/STTS Tunggal
					</label>
				</div>
			</div>
			<div class="col-12 col-md-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						SPPT/STTS Ganda
					</label>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />