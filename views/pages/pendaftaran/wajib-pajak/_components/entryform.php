<?php

use yii\web\View;

?>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Assesment</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<select class="form-select" v-model="data.jenisPajak">
					<option v-for="item in assessments" :value="item.id">{{item.name}}</option>
				</select>
			</div>
			<div class="d-none d-md-inline-block xc-md-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Golongan</div>
			<div class="xc-md-6 xc-lg-3 xc-xl-3 mb-2">
				<select class="form-select" v-model="data.golongan">
					<option v-for="(item, index) in golongans" :value="index">{{item}}</option>
				</select>
			</div>
			<div class="d-none d-lg-inline-block xc-md-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 pt-1">NPWP</div>
			<div class="xc-md-5 xc-lg-3  mb-2"><input v-model="data.npwp" class="form-control"></div>
		</div>
		<div class="row">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-2">Penomoran</div>
			<div class="xc-md-8 xc-xl-7 mb-2">
				<div class="form-check my-2">
					<input class="form-check-input" type="checkbox" v-model="data.isNomorRegistrasiAuto" v-bind:value="true" id="numberAutoGenereate">
					<label class="form-check-label" for="numberAutoGenereate">
						Gunakan Penomoran Otomatis
					</label>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">NPWPD</div>
			<div class="xc-md-6 xc-lg-4 xc-xl-3 mb-2">
				<div class="row g-0">
					<div class="xc-7 xc-md-10 xc-lg-9">
						<input v-model="data.nomor" :disabled="data.isNomorRegistrasiAuto == true" class="form-control">
					</div>
					<div class="xc-4 xc-md-5 xc-lg-4">
						<input v-model="data.objekPajak.kecamatan_id" disabled class="form-control">
					</div>
					<div class="xc-4 xc-md-5 xc-lg-5">
						<input v-model="kodeJenisUsaha" disabled class="form-control">
					</div>
				</div>
			</div>
			<div class="d-none d-md-inline-block d-lg-none d-xl-inline-block xc-md-10 xc-xl-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Tgl NPWPD</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 mb-2"><Datepicker v-model="data.tanggalNpwpd" :enableTimePicker="false" :format="format" hideInputIcon /></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 pt-1">Tgl Pengukuhan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 mb-2"><Datepicker v-model="data.tanggalPengukuhan" :enableTimePicker="false" :format="format" hideInputIcon /></div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jenis Usaha</div>
			<div class="xc-md-16 xc-lg-12 xc-xl-10 mb-2">
				<select v-model="data.rekening_id" class="form-select">
					<option v-for="item in rekenings" :value="item.id">{{item.kode + ' - ' + item.nama}}</option>
				</select>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Mulai Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><Datepicker v-model="data.tanggalMulaiUsaha" :enableTimePicker="false" :format="format" hideInputIcon /></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Luas Bangunan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.luasBangunan" class="form-control"></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-6 xc-xl-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jam Buka Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.jamBukaUsaha" class="form-control"></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Jam Tutup Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.jamTutupUsaha" class="form-control"></div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2">Jumlah Pengunjung<br/><small>(Rata-rata)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.pengunjung" class="form-control"></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2">Potensi Omset<br/><small>(Perbulan)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.omsetOp" class="form-control"></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="d-none d-lg-inline-block d-xl-none xc-md-2 xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Genset</div>
			<div class="xc-md-4 xc-xl-3 pt-1 mb-2">
				<div class="form-check form-check-inline">
					<input type="radio" v-model="data.genset" v-bind:value="true" class="form-check-input" id="gensetYa">
					<label class="form-check-label" for="gensetYa">Ya</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" v-model="data.genset" v-bind:value="false" class="form-check-input" id="gensetTidak">
					<label class="form-check-label" for="gensetTidak">Tidak</label>
				</div>
			</div>
			<div class="d-none d-md-inline-block d-lg-none xc-md-2"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Air Tanah</div>
			<div class="xc-md-4 xc-xl-3 mb-2 pt-1">
				<div class="form-check form-check-inline">
					<input type="radio" v-model="data.airTanah" v-bind:value="true" class="form-check-input" id="airYa">
					<label class="form-check-label" for="airYa">Ya</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" v-model="data.airTanah" v-bind:value="false" class="form-check-input" id="airTidak">
					<label class="form-check-label" for="airTidak">Tidak</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Objek Pajak
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Nama</div>
			<div class="col-md col-lg-5 mb-2"><input v-model="data.objekPajak.nama" class="form-control"></div>
			<div class="col-md-2 col-xl-1 pt-1 text-lg-end pe-lg-2">NOP</div>
			<div class="col-md mb-2"><input v-model="data.objekPajak.nop" class="form-control"></div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Alamat</div>
			<div class="col-md-7 col-lg-5  mb-2"><input v-model="data.objekPajak.alamat" class="form-control"></div>
			<div class="col-md-2 col-xl-1 col-lg-1 pt-1 text-lg-end pe-lg-2">RT/RW</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2"><input v-model="data.objekPajak.rtRw" class="form-control"></div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Kecamatan</div>
			<div class="col-md mb-2">
				<!-- <VueSelect label="name" :options="countries"></VueSelect> -->
				<select v-model.number="data.objekPajak.kecamatan_id" @change="refreshKelurahan(kelurahan, $event)" class="form-select pe-4">
					<option v-for="thisItem in kecamatan" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
				</select>	
			</div>
			<div class="col-md-2 col-xl-1 pt-1 text-lg-end pe-lg-2">Kelurahan</div>
			<div class="col-md mb-2">
				<select v-model.number="data.objekPajak.kelurahan_id" class="form-select pe-4">
					<option v-for="thisItem in kelurahan" :value="thisItem.id">{{thisItem.nama}}</option>
				</select>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Telpon</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2"><input v-model="data.objekPajak.telp" class="form-control"></div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Detail Objek Pajak
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Klasifikasi</th>
					<th>Jumlah</th>
					<th>Unit</th>
					<th>Tarif</th>
					<th>Keterangan</th>
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in detailObjekPajak" class="fit-form-control">
					<td><input class="form-control" v-model="item.jenisOp" ></td>
					<td><input class="form-control" v-model="item.jumlahOp" ></td>
					<td><input class="form-control" v-model="item.unitOp" ></td>
					<td><input class="form-control" v-model="item.tarifOp" ></td>
					<td><input class="form-control" v-model="item.notes" ></td>
					<td class="text-center">
						<button @click="delDetailObjekPajak(index)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button @click="addDetailObjekPajak" class="btn bg-blue">Tambah</button>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Pemilik
	</div>
	<div class="card-body">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="" id="autoPemilik">
			<label class="form-check-label" for="autoPemilik">
				Data pemilik sama dengan data object pajak
			</label>
		</div>
		<div v-if="data.golongan==2" class="h6">Perusahaan</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th v-if="data.golongan==2">NIK</th><th v-else>NIB</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<!-- <th>Status</th> -->
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in pemilik" class="fit-form-control">
					<td><input class="form-control" v-model="item.nama" ></td>
					<td><input class="form-control" v-model="item.nik" ></td>
					<td><input class="form-control" v-model="item.alamat" ></td>
					<td>
						<select v-model.number="item.daerah_id" @change="refreshKecamatan(item.kecamatanList, $event)" class="form-select pe-4">
							<option v-for="thisItem in kota" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
						</select>	
					</td>
					<td>
						<select v-model.number="item.kecamatan_id" @change="refreshKelurahan(item.kelurahanList, $event)" class="form-select pe-4">
							<option v-for="thisItem in item.kecamatanList" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
						</select>	
					</td>
					<td>
						<select v-model.number="item.kelurahan_id" class="form-select pe-4">
							<option v-for="thisItem in item.kelurahanList" :value="thisItem.id">{{thisItem.nama}}</option>
						</select>
					</td>
					<td><input class="form-control" v-model="item.telp" ></td>
					<!-- <td><input class="form-control" v-model="item.status" ></td> -->
					<td class="text-center">
						<button @click="delPemilik(index)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button @click="addPemilik" class="btn bg-blue">Tambah</button>
		<div v-if="data.golongan==2">
			<hr />
			<div class="h6">Direktur Perusahaan</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nama</th>
						<th v-if="data.golongan==2">NIK</th><th v-else>NIB</th>
						<th>Alamat</th>
						<th>Kota</th>
						<th>Kecamatan</th>
						<th>Kelurahan</th>
						<th>No Telp</th>
						<!-- <th>Status</th> -->
						<th style="width:30px"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(item, index) in pemilik" class="fit-form-control">
						<td><input class="form-control" v-model="item.direktur_nama" ></td>
						<td><input class="form-control" v-model="item.direktur_nik" ></td>
						<td><input class="form-control" v-model="item.direktur_alamat" ></td>
						<td>
							<select v-model.number="item.direktur_daerah_id" @change="refreshKecamatan(item.direktur_kecamatanList, $event)" class="form-select pe-4">
								<option v-for="thisItem in kota" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
							</select>	
						</td>
						<td>
							<select v-model.number="item.direktur_kecamatan_id" @change="refreshKelurahan(item.direktur_kelurahanList, $event)" class="form-select pe-4">
								<option v-for="thisItem in item.direktur_kecamatanList" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
							</select>	
						</td>
						<td>
							<select v-model.number="item.direktur_kelurahan_id" class="form-select pe-4">
								<option v-for="thisItem in item.direktur_kelurahanList" :value="thisItem.id">{{thisItem.nama}}</option>
							</select>
						</td>
						<td><input class="form-control" v-model="item.direktur_telp" ></td>
						<!-- <td><input class="form-control" v-model="item.status" ></td> -->
						<td class="text-center">
							<button @click="delPemilik(index)" class="btn btn-xs bg-danger p-1">
								<i class="bi bi-x-lg"></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Narahubung
	</div>
	<div class="card-body">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="" id="autoNarahubung">
			<label class="form-check-label" for="autoNarahubung">
				Data narahubung sama dengan data object pajak
			</label>
		</div>
		<table class="table table-bordered" disable>
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th>RT/RW</th>
					<th>Kota</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<!-- <th>Status</th> -->
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in narahubung" class="fit-form-control">
					<td><input class="form-control" v-model="item.nama" ></td>
					<td><input class="form-control" v-model="item.nik" ></td>
					<td><input class="form-control" v-model="item.alamat" ></td>
					<td><input class="form-control" v-model="item.rtRw" ></td>
					<td>
						<select v-model.number="item.daerah_id" @change="refreshKecamatan(item.kecamatanList, $event)" class="form-select pe-4">
							<option v-for="thisItem in kota" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
						</select>	
					</td>
					<td>
						<select v-model.number="item.kecamatan_id" @change="refreshKelurahan(item.kelurahanList, $event)" class="form-select pe-4">
							<option v-for="thisItem in item.kecamatanList" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
						</select>	
					</td>
					<td>
						<select v-model.number="item.kelurahan_id" class="form-select pe-4">
							<option v-for="thisItem in item.kelurahanList" :value="thisItem.id">{{thisItem.nama}}</option>
						</select>
					</td>
 					<td><input class="form-control" v-model="item.telp" ></td>
					<!-- <td><input class="form-control" v-model="item.status" ></td> -->
					<td class="text-center">
						<button @click="delNarahubung(index)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button @click="addNarahubung" class="btn bg-blue">Tambah</button>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php
$this->registerCssFile('https://unpkg.com/@vuepic/vue-datepicker@latest/dist/main.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@vuepic/vue-datepicker@latest', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/refs/common.js');
$this->registerJsFile('@web/js/dto/npwpd/create.js');
$this->registerJsFile('@web/js/services/pendaftaran-wp/entryform.js');
