<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/potensi-op/create.js?v=20221124a');
$this->registerJsFile('@web/js/services/potensi-op/entryform.js?v=20221124a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Assesment</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<select class="form-select" v-model="data.potensiOp.jenisPajak">
					<option v-for="item in assessments" :value="item.id">{{item.name}}</option>
				</select>
				<span class="text-danger" v-if="dataErr['potensiOp.jenisPajak']">{{dataErr['potensiOp.jenisPajak']}}</span>
			</div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 text-md-end pe-md-2">Golongan *</div>
			<div class="xc-md-5 xc-lg-3 mb-2">
				<select class="form-select" v-model="data.potensiOp.golongan">
					<option v-for="(item, idx) in golongans" :value="idx">{{item}}</option>
				</select>
				<span class="text-danger" v-if="dataErr['potensiOp.golongan']">{{dataErr['potensiOp.golongan']}}</span>
			</div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-lg-2">NPWP</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<input v-model="data.npwp" class="form-control">
				<span class="text-danger" v-if="dataErr.npwp">{{dataErr.npwp}}</span>
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jenis Usaha *</div>
			<div class="xc-md-16 xc-lg-12 xc-xl-10 mb-2">
				<div>
					<vueselect v-model="data.potensiOp.rekening_id"
						:options="rekenings"
						:reduce="item => item.id"
						label="nama"
						code="id"
					/>
				</div>
				<span class="text-danger" v-if="dataErr['potensiOp.rekening_id']">{{dataErr['potensiOp.rekening_id']}}</span>
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Mulai Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><datepicker v-model="data.potensiOp.tanggalMulaiUsaha" format="DD/MM/YYYY" ></datepicker></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Luas Bangunan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.potensiOp.luasBangunan" class="form-control"></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-xl-2 text-xl-end">Jam Buka Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.potensiOp.jamBukaUsaha" class="form-control"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Jam Tutup Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.potensiOp.jamTutupUsaha" class="form-control"></div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2">Jumlah Pengunjung<br/><small>(Rata-rata)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.potensiOp.pengunjung" class="form-control"></div>
			<div class="xc-md-4 xc-lg-3 pe-md-2 text-md-end">Potensi Omset<br/><small>(Perbulan)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.potensiOp.omsetOp" class="form-control"></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-2 pe-xl-2 text-xl-end">Genset *</div>
			<div class="xc-md-4 xc-lg-3 pt-2 mb-2">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.potensiOp.genset" v-bind:value="true" class="form-check-input" id="gensetYa">
						<label class="form-check-label" for="gensetYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.potensiOp.genset" v-bind:value="false" class="form-check-input" id="gensetTidak">
						<label class="form-check-label" for="gensetTidak">Tidak</label>
					</div>
				</div>
				<span class="text-danger" v-if="dataErr.genset">{{dataErr.genset}}</span>
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-2 text-md-end pe-md-2">Air Tanah *</div>
			<div class="xc-md-4 xc-xl-3 mb-2 pt-2">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.potensiOp.airTanah" v-bind:value="true" class="form-check-input" id="airYa">
						<label class="form-check-label" for="airYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.potensiOp.airTanah" v-bind:value="false" class="form-check-input" id="airTidak">
						<label class="form-check-label" for="airTidak">Tidak</label>
					</div>
				</div>
				<span class="text-danger" v-if="dataErr.genset">{{dataErr.genset}}</span>
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
			<div class="col-md-2 col-xl-1 pt-1">Nama *</div>
			<div class="col-md col-lg-4 mb-2">
				<input v-model="data.detailPotensiOp.nama" class="form-control">
				<span class="text-danger" v-if="dataErr['detailPotensiOp.nama']">{{dataErr['detailPotensiOp.nama']}}</span>
			</div>
			<div class="col-md-2 pt-1 text-md-end pe-lg-2">NOP</div>
			<div class="col-md col-xl-3 mb-2">
				<input v-model="data.detailPotensiOp.nop" class="form-control">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Alamat *</div>
			<div class="col-md-7 col-lg-5  mb-2">
				<input v-model="data.detailPotensiOp.alamat" class="form-control">
				<span class="text-danger" v-if="dataErr['detailPotensiOp.alamat']">{{dataErr['detailPotensiOp.alamat']}}</span>
			</div>
			<div class="col-md-2 col-xl-1 col-lg-1 pt-1 text-md-end pe-lg-2">RT/RW *</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">
				<input v-model="data.detailPotensiOp.rtRw" maxlength="5" class="form-control">
				<span class="text-danger" v-if="dataErr['detailPotensiOp.rtRw']">{{dataErr['detailPotensiOp.rtRw']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Kecamatan *</div>
			<div class="col-md mb-2">
				<div>
					<vueselect v-model="data.detailPotensiOp.kecamatan_id"
						:options="kecamatans"
						:reduce="item => item.id"
						label="nama"
						code="id"
						@option:selected="refreshSelect(data.detailPotensiOp.kecamatan_id, kecamatans, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahans, 'kode')"
					/>
				</div>
				<span class="text-danger" v-if="dataErr['detailPotensiOp.kecamatan_id']">{{dataErr['detailPotensiOp.kecamatan_id']}}</span>
			</div>
			<div class="col-md-2 col-xl-1 pt-1 text-md-end pe-lg-2">Kelurahan *</div>
			<div class="col-md mb-2">
				<div>
					<vueselect v-model="data.detailPotensiOp.kelurahan_id"
						:options="kelurahans"
						:reduce="item => item.id"
						label="nama"
						code="id"
					/>
				</div>
				<span class="text-danger" v-if="dataErr['detailPotensiOp.kelurahan_id']">{{dataErr['detailPotensiOp.kelurahan_id']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Telpon</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
				<input v-model="data.detailPotensiOp.telp" class="form-control">
				<span class="text-danger" v-if="dataErr['detailPotensiOp.telp']">{{dataErr['detailPotensiOp.telp']}}</span>
			</div>
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
				<tr v-if="data.detailPajaks.length==0"><td class="text-center p-3" colspan="6">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.detailPajaks" class="fit-form-control">
					<td><input class="form-control" v-model="item.jenisOp" ></td>
					<td><input class="form-control" v-model="item.jumlahOp" ></td>
					<td><input class="form-control" v-model="item.unitOp" ></td>
					<td><input class="form-control" v-model="item.tarifOp" ></td>
					<td><input class="form-control" v-model="item.notes" ></td>
					<td class="text-center">
						<button @click="delDetailObjekPajak(idx)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button @click="addDetailObjekPajak(this)" class="btn bg-blue">Tambah</button>
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
		<table class="table table-bordered mb-2">
			<thead>
				<tr>
					<th>Nama *</th>
					<th v-if="data.golongan!=2">NIK</th><th v-else>NIB</th>
					<th>Alamat *</th>
					<th style="width:250px">Kota / Kabupaten *</th>
					<th style="min-width:175px">Kelurahan *</th>
					<th>No Telp *</th>
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.potensiPemilikWps.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.potensiPemilikWps" class="fit-form-control">
					<td>
						<input class="form-control" v-model="item.nama" >
						<span class="text-danger" v-if="dataErr['potensiPemilikWps['+idx+'].nama']">{{dataErr['potensiPemilikWps['+idx+'].nama']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.nik" >
						<span class="text-danger" v-if="dataErr['potensiPemilikWps['+idx+'].nik']">{{dataErr['potensiPemilikWps['+idx+'].nik']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.alamat" >
						<span class="text-danger" v-if="dataErr['potensiPemilikWps['+idx+'].alamat']">{{dataErr['potensiPemilikWps['+idx+'].alamat']}}</span>
					</td>
					<td>
						<div>
							<vueselect v-model="item.daerah_id"
								:options="daerahs"
								:reduce="thisTtem => thisTtem.id"
								label="nama"
								code="id"
								:clearable="false"
								@option:selected="refreshSelect(item.daerah_id, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', pemilikLists[idx].kelurahans, 'kode')"
							/>
						</div>
						<span class="text-danger" v-if="dataErr['potensiPemilikWps['+idx+'].daerah_id']">{{dataErr['potensiPemilikWps['+idx+'].daerah_id']}}</span>
					</td>
					<td>
						<div>
							<vueselect v-model="item.kelurahan_id"
								:options="pemilikLists[idx].kelurahans"
								:reduce="item => item.id"
								label="nama"
								code="id"
							/>
						</div>
						<span class="text-danger" v-if="dataErr['potensiPemilikWps['+idx+'].kelurahan_id']">{{dataErr['potensiPemilikWps['+idx+'].kelurahan_id']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.telp" >
						<span class="text-danger" v-if="dataErr['potensiPemilikWps['+idx+'].telp']">{{dataErr['potensiPemilikWps['+idx+'].telp']}}</span>
					</td>
					<td class="text-center">
						<button v-if="idx>0" @click="delPemilik(idx)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="text-danger" v-if="dataErr.pemilik">{{dataErr.pemilik}}</div>
		<button @click="addPemilik()" class="btn bg-blue">Tambah</button>
		<div v-if="data.golongan==2">
			<hr />
			<div class="h6">Direktur Perusahaan</div>
			<table class="table table-bordered mb-2">
				<thead>
					<tr>
						<th>Nama</th>
						<th v-if="data.golongan==2">NIK</th><th v-else>NIB</th>
						<th>Alamat</th>
						<th style="width:250px">Kota / Kabupaten</th>
						<th style="min-width:175px">Kelurahan</th>
						<th>No Telp</th>
						<th style="width:30px"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-if="data.potensiPemilikWps.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
					<tr v-else v-for="(item, idx) in data.pemilik" class="fit-form-control">
						<td><input class="form-control" v-model="item.direktur_nama" ></td>
						<td><input class="form-control" v-model="item.direktur_nik" ></td>
						<td><input class="form-control" v-model="item.direktur_alamat" ></td>
						<td>
							<div>
								<vueselect v-model="item.direktur_daerah_id"
									:options="daerahs"
									:reduce="thisTtem => thisTtem.id"
									label="nama"
									code="id"
									:clearable="false"
									@option:selected="refreshSelect(item.direktur_daerah_id, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', pemilikLists[idx].direktur_kelurahans, 'kode')"
								/>
							</div>
						</td>
						<td>
							</div>
								<vueselect v-model="item.direktur_kelurahan_id"
									:options="pemilikLists[idx].direktur_kelurahans"
									:reduce="item => item.id"
									label="nama"
									code="id"
								/>
							</div>
						</td>
						<td><input class="form-control" v-model="item.direktur_telp" ></td>
						<td class="text-center">
							<button @click="delPemilik(idx)" class="btn btn-xs bg-danger p-1">
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
		<table class="table table-bordered mb-2" disable>
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th style="width:250px">Kota / Kabupaten</th>
					<th style="min-width:175px">Kelurahan</th>
					<th>No Telp</th>
					<th>Email</th>
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.potensiNarahubungs.length==0"><td class="text-center p-3" colspan="8">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.potensiNarahubungs" class="fit-form-control">
					<td>
						<input class="form-control" v-model="item.nama" >
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].nama']">{{dataErr['narahubung['+idx+'].nama']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.nik" >
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].nik']">{{dataErr['narahubung['+idx+'].nik']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.alamat" >
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].alamat']">{{dataErr['narahubung['+idx+'].alamat']}}</span>
					</td>
					<td>
						<div>
							<vueselect v-model="item.daerah_id"
								:options="daerahs"
								:reduce="thisTtem => thisTtem.id"
								label="nama"
								code="id"
								:clearable="false"
								@option:selected="refreshSelect(item.daerah_id, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', narahubungLists[idx].kelurahans, 'kode')"
							/>
						</div>
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].daerah_id']">{{dataErr['narahubung['+idx+'].daerah_id']}}</span>
					</td>
					<td>
						<div>
							<vueselect v-model="item.kelurahan_id"
								:options="narahubungLists[idx].kelurahans"
								:reduce="item => item.id"
								label="nama"
								code="id"
							/>
						</div>
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].kelurahan_id']">{{dataErr['narahubung['+idx+'].kelurahan_id']}}</span>
					</td>
 					<td>
						<input class="form-control" v-model="item.telp" >
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].telp']">{{dataErr['narahubung['+idx+'].telp']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.email" >
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].email']">{{dataErr['narahubung['+idx+'].email']}}</span>
					</td>
					<td class="text-center">
						<button v-if="idx>0" @click="delNarahubung(idx)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="text-danger" v-if="dataErr.narahubung">{{dataErr.narahubung}}</div>
		<button @click="addNarahubung(this)" class="btn bg-blue">Tambah</button>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Estimasi Perhitungan Potensi Pajak
	</div>
	<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-4 col-xl-3">Potensi</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-4 col-xl-3 text-lg-end">Tarif (%)</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Jumlah Pajak</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
					</div>
				</div>
			</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header fw-600">Upload Dokumen</div>
	<div class="p-3">
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-lg-1">Foto Objek Pajak *</div>
			<div class="col-md-6 col-lg mb-1">
				<div class="row g-2">
					<div v-for="(item, index) in data.potensiOp.fotoObjek" class="col-md-6 col-lg-4 mb-1">
						<input class="form-control" type="file" @change="resizeImage($event, 'fotoObjek' + index, 'fitWidth', 800, null, data.fotoObjek, index)">
						<div class="mt-1">
							<img :id="'fotoObjek' + index" class="img-thumbnail" :class="{ 'd-none': !item }" />
						</div>
					</div>
				</div>
				<div class="text-danger py-1" v-if="dataErr['fotoObjek[0]']">{{dataErr['fotoObjek[0]']}}</div>
				<button class="btn bg-blue" @click="data.fotoObjek.push('')">Tambah</button>
			</div>
		</div>
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-1">Foto KTP WP / Wakil*</div>
			<div class="col-md-7 col-xl-6 col-xxl-5 mb-1">
				<input class="form-control" type="file" @change="resizeImage($event, 'fotoKtpPreview', 'fitSmallest', 642, 404, data.potensiOp, 'fotoKtp')">
				<span class="text-danger" v-if="dataErr.fotoKtp">{{dataErr.fotoKtp}}</span>
				<div class="mt-1" :class="{'d-none': !data.fotoKtp}">
					<img id="fotoKtpPreview" class="img-thumbnail" @click="viewImageNewTab('fotoKtpPreview')" />
				</div>
			</div>
		</div>
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-lg-1">Form BAPL *</div>
			<div class="col-md-6 col-lg mb-1">
				<div class="row g-2">
					<div v-for="(item, index) in data.potensiOp.formBapl" class="col-md-6 col-lg-4 mb-1">
						<input class="form-control" type="file" @change="storeFileToField($event, data.suratIzinUsaha, index, 'application/pdf')">
						<div class="mt-1">
							<img :id="'suratIzinUsaha' + index" class="img-thumbnail" :class="{ 'd-none': !item }"/>
						</div>
					</div>
				</div>
				<div class="text-danger py-1" v-if="dataErr['suratIzinUsaha[0]']">{{dataErr['suratIzinUsaha[0]']}}</div>
				<button class="btn bg-blue" @click="data.suratIzinUsaha.push('')">Tambah</button>
			</div>
		</div>
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-1">Lain-lain</div>
			<div class="col-md-6 col-xl-5 col-xxl-4 mb-1">
				<div v-for="(item, index) in data.potensiOp.dokumenLainnya" class="mb-1">
					<input class="form-control" type="file" @change="resizeImage($event, 'lainLain' + index, 'fitWidth', 800, null, data.lainLain, index)">
					<span class="text-danger" v-if="dataErr.lainLain">{{dataErr.lainLain}}</span>
					<div class="mt-1">
						<img :id="'lainLain' + index" class="img-thumbnail" :class="{ 'd-none': !item }"/>
					</div>
				</div>
				<button class="btn bg-blue" @click="data.lainLain.push('')">Tambah</button>
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header fw-600">Peninjauan</div>
	<div class="card-body">
		<div class="row mb-3">
			<div class="xc-sm-4 xc-md-3 xc-lg-2 xc-xl-1 mb-md-2 pt-1">Tanggal</div>
			<div class="xc-sm-6 xc-md-4 xc-lg-3 xc-xl-2 mb-2"><datepicker v-model="tinjauTanggal" format="DD/MM/YYYY" ></datepicker></div>
			<div class="xc-sm-3 xc-md-2 xc-xl-1 mb-md-2 pt-1 text-lg-end">Jam</div>
			<div class="xc-sm-4 xc-md-3 xc-lg-2">
				<div class="row g-0">
					<div class="col"><input v-model="tinjauJam" maxlength="2" class="form-control"></div>
					<div class="col-1 pt-1 text-center">:</div>
					<div class="col"><input v-model="tinjauMenit" maxlength="2" class="form-control"></div>
				</div>
			</div>
			<div class="d-none d-md-inline-block col-md-4 d-lg-none"></div>
			<div class="xc-sm-4 xc-md-3 xc-xl-2 mb-md-2 pt-1 text-lg-end">Koordinator</div>
			<div class="xc-sm-16 xc-md-10 xc-lg-7 xc-xl-2 mb-2"><input v-model="data.bapl.koordinator_user_id" type="number" class="form-control"></div>
		</div>
		<div class="fw-600">
			Petugas
		</div>
		<table class="table table-bordered fit-form-control">
			<thead>
				<th>#</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Jabatan</th>
			</thead>
			<tbody>
				<tr>
					<td style="width:50px"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
					<td><input class="form-control"></td>
				</tr>
			</tbody>
		</table>
		<button class="btn bg-blue">Tambah</button>
	</div>
</div>