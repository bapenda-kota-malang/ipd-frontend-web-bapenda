<?php

use yii\web\View;

?>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1">Assesment</div>
					<div class="col mb-2">
						<select class="form-select" v-model="data.jenisPajak">
							<option v-for="item in assessments" :value="item.id">{{item.name}}</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-4">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-5 pt-1 text-lg-end">Golongan</div>
					<div class="col mb-2">
						<select class="form-select" v-model="data.golongan">
							<option v-for="(item, index) in golongans" :value="index">{{item}}</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-4">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-4 pt-1 text-xl-end">NPWP</div>
					<div class="col mb-2"><input v-model="data.npwp" class="form-control"></div>
				</div>
			</div>
			<!-- <div class="col-lg-6 col-xl-4">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-5 pt-1 text-lg-end">
						Nomor Registrasi
					</div>
					<div class="col mb-2">
						<input class="form-control" v-model="data.nomorRegistrasi" />
					</div>
				</div>
			</div> -->
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-3 pt-2">
						Penomoran
					</div>
					<div class="col mb-2 pt-0">
						<div class="form-check my-2">
							<input class="form-check-input" type="checkbox" v-model="data.isNomorRegistrasiAuto" v-bind:value="true" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Gunakan Penomoran Otomatis
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-xl-0">
			<div class="col-lg-6 col-xl-4">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 pt-1">NPWPD</div>
					<div class="col mb-2 ps-xl-3">
						<div class="row g-1">
							<div class="col-5">
								<input v-model="data.nomor" :disabled="data.isNomorRegistrasiAuto == true" class="form-control ms-xl-1">
							</div>
							<div class="col-3">
								<input v-model="data.objekPajak.kecamatan_id" disabled class="form-control ms-xl-1">
							</div>
							<div class="col-3">
								<input v-model="kodeJenisUsaha" disabled class="form-control ms-xl-1">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end">Tgl NPWPD</div>
					<div class="col mb-2 ps-xl-3 date">
						<Datepicker v-model="data.tanggalNpwpd" :enableTimePicker="false" :format="format" hideInputIcon />
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-xl-end">Tgl Pengukuhan</div>
					<div class="col mb-2 ps-xl-3">
						<Datepicker v-model="data.tanggalPengukuhan" :enableTimePicker="false" :format="format" hideInputIcon />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1">Jenis Usaha</div>
					<div class="col-md col-lg-7 col-xl mb-2 ps-xl-2">
						<select v-model="data.rekening_id" class="form-select">
							<option v-for="item in rekenings" :value="item.id">{{item.kode + ' - ' + item.nama}}</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1">Mulai Usaha</div>
					<div class="col mb-2 pl-0">
						<Datepicker v-model="data.tanggalMulaiUsaha" :enableTimePicker="false" :format="format" hideInputIcon />
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-lg-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end">Luas Bangunan</div>
					<div class="col ps-lg-2 mb-2">
						<input v-model="data.luasBangunan" class="form-control ms-xl-1">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end">Jam Buka Usaha</div>
					<div class="col ps-xl-2 mb-2">
						<input v-model="data.jamBukaUsaha" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-xl-end">Jam Tutup Usaha</div>
					<div class="col ps-xl-2 mb-2">
						<input v-model="data.jamTutupUsaha" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1" style="line-height:1em">Jml. Pengunjung<br/><small>(Rata-rata)</small></div>
					<div class="col ps-xl-2 mb-2">
						<input v-model="data.pengunjung" class="form-control ms-xl-1">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-xxl-1 text-xl-end">Potensi Omset<br/><small>(Perbulan)</small></div>
					<div class="col ps-lg-2 mb-2">
						<input v-model="data.omsetOp" class="form-control ms-xl-1">
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-6 col-xl-4 col-xxl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xxl-6 pt-1 pt-xxl-0">Genset</div>
					<div class="col ps-xl-4 ps-xxl-3">
						<div class="row">
							<div class="col col-md-2 col-lg-3 col-xl-3 col-xxl-4 pt-1">
								<div class="form-check">
									<input type="radio" v-model="data.genset" v-bind:value="true" class="form-check-input" id="ya1">
									<label class="form-check-label" for="ya1">
										Ya
									</label>
								</div>
							</div>
							<div class="col pt-1">
								<div class="form-check">
									<input type="radio" v-model="data.genset" v-bind:value="false" class="form-check-input" id="tidak1">
									<label class="form-check-label" for="tidak1">
										Tidak
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg col-xl-4">
				<div class="row g-0">
					<div class="col-md-3 col-lg-4 col-xl-3 col-xxl-6 pt-1 text-lg-end">Air Tanah</div>
					<div class="col ps-lg-3">
						<div class="row">
							<div class="col col-md-2 col-xl-3 pt-1">
								<div class="form-check">
									<input type="radio" v-model="data.airTanah" v-bind:value="true" class="form-check-input" id="ya2">
									<label class="form-check-label" for="ya2">
										Ya
									</label>
								</div>
							</div>
							<div class="col pt-1 ps-lg-3">
								<div class="form-check">
									<input type="radio" v-model="data.airTanah" v-bind:value="false" class="form-check-input" id="tidak2">
									<label class="form-check-label" for="tidak2">
										Tidak
									</label>
								</div>
							</div>
						</div>
					</div>
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
		<!-- <table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama / Tema</th>
					<th>NOP</th>
					<th>Alamat</th>
					<th>RT/RW</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th style="width:30px"></th>
				</tr>
				<tr v-for="(item, index) in objekPajak" class="fit-form-control">
					<td><input class="form-control" v-model="item.nama" /></td>
					<td><input class="form-control" v-model="item.nop" /></td>
					<td><input class="form-control" v-model="item.alamat" /></td>
					<td><input class="form-control" v-model="item.rtRw" /></td>
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
					<td><input class="form-control" v-model="item.telp" /></td>
					<td class="text-center">
						<button @click="delObjekPajak(index)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</thead>
		</table> -->
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
				<tr v-for="(item, index) in detail_op" class="fit-form-control">
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
		<input type="checkbox" /> Alamat Pemilik sama dengan Alamat Object Pajak
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
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
						<select v-model.number="item.kota_id" @change="refreshKecamatan(item.kecamatanList, $event)" class="form-select pe-4">
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
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Narahubung
	</div>
	<div class="card-body">
		<input type="checkbox" /> Alamat Narahubung sama dengan Alamat Object Pajak
		<table class="table table-bordered" disable>
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
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
				<tr v-for="(item, index) in narahubung" class="fit-form-control">
					<td><input class="form-control" v-model="item.nama" ></td>
					<td><input class="form-control" v-model="item.nik" ></td>
					<td><input class="form-control" v-model="item.alamat" ></td>
					<td>
						<select v-model.number="item.kota_id" @change="refreshKecamatan(item.kecamatanList, $event)" class="form-select pe-4">
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

<?php
$this->registerCssFile('https://unpkg.com/@vuepic/vue-datepicker@latest/dist/main.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@vuepic/vue-datepicker@latest', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css');
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js');
$this->registerJsFile('@web/js/items/items.js');
$this->registerJsFile('@web/js/models/pendaftaran.js');
$this->registerJsFile('@web/js/services/pendaftaran-wp/entryform.js');

?>
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
