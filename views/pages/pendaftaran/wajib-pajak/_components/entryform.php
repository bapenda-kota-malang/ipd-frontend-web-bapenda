<?php

use yii\web\View;

?>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Assesment *</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<select class="form-select" v-model="data.jenisPajak">
					<option v-for="item in assessments" :value="item.id">{{item.name}}</option>
				</select>
				<span class="text-danger" v-if="dataErr.jenisPajak">{{dataErr.jenisPajak}}</span>
			</div>
			<div class="d-none d-md-inline-block xc-md-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1 text-md-end pe-md-2">Golongan *</div>
			<div class="xc-md-6 xc-lg-3 xc-xl-3 mb-2">
				<select class="form-select" v-model="data.golongan">
					<option v-for="(item, idx) in golongans" :value="idx">{{item}}</option>
				</select>
				<span class="text-danger" v-if="dataErr.golongan">{{dataErr.golongan}}</span>
			</div>
			<div class="d-none d-lg-inline-block xc-md-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 pt-1 text-lg-end pe-lg-2">NPWP</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<input v-model="data.npwp" class="form-control">
				<span class="text-danger" v-if="dataErr.npwp">{{dataErr.npwp}}</span>
			</div>
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
						<input v-model="data.nomor" :disabled="data.isNomorRegistrasiAuto == true" maxlength="4" class="form-control">
					</div>
					<div class="xc-4 xc-md-5 xc-lg-4">
						<input v-model="data.objekPajak.kecamatan_id" disabled class="form-control">
					</div>
					<div class="xc-4 xc-md-5 xc-lg-5">
						<input v-model="kodeJenisUsaha" disabled class="form-control">
					</div>
				</div>
				<span class="text-danger" v-if="dataErr.nomor">{{dataErr.nomor}}</span>
			</div>
			<div class="d-none d-md-inline-block d-lg-none d-xl-inline-block xc-md-10 xc-xl-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1 text-lg-end">Tgl NPWPD</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 mb-2">
				<Datepicker v-model="data.tanggalNpwpd" :enableTimePicker="false" :format="dateFormat" hideInputIcon />
				<span class="text-danger" v-if="dataErr.tanggalNpwpd">{{dataErr.tanggalNpwpd}}</span>
			</div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 pt-1 text-md-end pe-md-2">Tgl Pengukuhan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-3 mb-2">
				<Datepicker v-model="data.tanggalPengukuhan" :enableTimePicker="false" :format="dateFormat" hideInputIcon />
				<span class="text-danger" v-if="dataErr.tanggalPengukuhan">{{dataErr.tanggalPengukuhan}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jenis Usaha *</div>
			<div class="xc-md-16 xc-lg-12 xc-xl-10 mb-2">
				<select v-model="data.rekening_id" class="form-select">
					<option v-for="item in rekenings" :value="item.id">{{item.kode + ' - ' + item.nama}}</option>
				</select>
				<span class="text-danger" v-if="dataErr.rekening_id">{{dataErr.rekening_id}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Mulai Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><Datepicker v-model="data.tanggalMulaiUsaha" :enableTimePicker="false" :format="dateFormat" hideInputIcon /></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 text-md-end pe-md-2">Luas Bangunan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.luasBangunan" class="form-control"></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-6 xc-xl-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jam Buka Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.jamBukaUsaha" class="form-control"></div>
			<!-- <div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div> -->
			<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-md-2">Jam Tutup Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.jamTutupUsaha" class="form-control"></div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2">Jumlah Pengunjung<br/><small>(Rata-rata)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.pengunjung" class="form-control"></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 text-md-end pe-md-2">Potensi Omset<br/><small>(Perbulan)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.omsetOp" class="form-control"></div>
			<div class="d-none d-md-inline-block xc-md-2 xc-lg-1"></div>
			<div class="d-none d-lg-inline-block d-xl-none xc-md-2 xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1 text-xl-end pe-xl-2">Genset *</div>
			<div class="xc-md-4 xc-xl-3 pt-1 mb-2">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.genset" v-bind:value="true" class="form-check-input" id="gensetYa">
						<label class="form-check-label" for="gensetYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.genset" v-bind:value="false" class="form-check-input" id="gensetTidak">
						<label class="form-check-label" for="gensetTidak">Tidak</label>
					</div>
				</div>
				<span class="text-danger" v-if="dataErr.genset">{{dataErr.genset}}</span>
			</div>
			<div class="d-none d-md-inline-block d-lg-none xc-md-2"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1 text-md-end pe-md-2">Air Tanah *</div>
			<div class="xc-md-4 xc-xl-3 mb-2 pt-1">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.airTanah" v-bind:value="true" class="form-check-input" id="airYa">
						<label class="form-check-label" for="airYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.airTanah" v-bind:value="false" class="form-check-input" id="airTidak">
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
			<div class="col-md col-lg-5 mb-2">
				<input v-model="data.objekPajak.nama" class="form-control">
				<span class="text-danger" v-if="dataErr['objekPajak.nama']">{{dataErr['objekPajak.nama']}}</span>
			</div>
			<div class="col-md-2 col-xl-1 pt-1 text-lg-end pe-lg-2">NOP</div>
			<div class="col-md mb-2"><input v-model="data.objekPajak.nop" class="form-control"></div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Alamat *</div>
			<div class="col-md-7 col-lg-5  mb-2">
				<input v-model="data.objekPajak.alamat" class="form-control">
				<span class="text-danger" v-if="dataErr['objekPajak.alamat']">{{dataErr['objekPajak.alamat']}}</span>
			</div>
			<div class="col-md-2 col-xl-1 col-lg-1 pt-1 text-lg-end pe-lg-2">RT/RW *</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">
				<input v-model="data.objekPajak.rtRw" maxlength="5" class="form-control">
				<span class="text-danger" v-if="dataErr['objekPajak.rtRw']">{{dataErr['objekPajak.rtRw']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Kecamatan *</div>
			<div class="col-md mb-2">
				<!-- <vue-select
					v-model="data.objekPajak.kecamatan_id"
					:options="kecamatans"
					label-by="nama"
					value-by="id"
					@change="refreshSelect($event, kecamatans, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahans, 'kode')"
					searchable
					close-on-select="true"
					openDirection="bottom">
					
				</vue-select> -->
				<!-- refreshSelect($event, kecamatanArr, 'kode', '/kelurahan?kecamatan_kode={kode}&no_pagination=true', regObjekPajakKelurahanArr) -->
				<select v-model.lazy.number="data.objekPajak.kecamatan_id" @change="refreshSelect($event, kecamatans, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahans, 'kode')" class="form-select pe-4">
					<option v-for="(thisItem) in kecamatans" :value="thisItem.id">{{thisItem.nama}}</option>
				</select>	
				<span class="text-danger" v-if="dataErr['objekPajak.kecamatan_id']">{{dataErr['objekPajak.kecamatan_id']}}</span>
			</div>
			<div class="col-md-2 col-xl-1 pt-1 text-lg-end pe-lg-2">Kelurahan *</div>
			<div class="col-md mb-2">
				<select v-model.number="data.objekPajak.kelurahan_id" class="form-select pe-4">
					<template v-if="kelurahans.length>0">
						<option v-for="thisItem in kelurahans" :value="thisItem.id">{{thisItem.nama}}</option>
					</template>
				</select>
				<span class="text-danger" v-if="dataErr['objekPajak.kelurahan_id']">{{dataErr['objekPajak.kelurahan_id']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Telpon</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
				<input v-model="data.objekPajak.telp" class="form-control">
				<span class="text-danger" v-if="dataErr['objekPajak.telp']">{{dataErr['objekPajak.telp']}}</span>
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
				<tr v-if="detailObjekPajak.length==0"><td class="text-center p-3" colspan="6">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in detailObjekPajak" class="fit-form-control">
					<td><input class="form-control" v-model="item.jenisOp" ></td>
					<td><input class="form-control" v-model="item.jumlahOp" ></td>
					<td><input class="form-control" v-model="item.unitOp" ></td>
					<td><input class="form-control" v-model="item.tarifOp" ></td>
					<td><input class="form-control" v-model="item.notes" ></td>
					<td class="text-center">
						<button @click="delDetailObjekPajak(this, idx)" class="btn btn-xs bg-danger p-1">
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
					<th>Nama</th>
					<th v-if="data.golongan!=2">NIK</th><th v-else>NIB</th>
					<th>Alamat</th>
					<th>Kota / Kabupaten</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.pemilik.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.pemilik" class="fit-form-control">
					<td>
						<input class="form-control" v-model="item.nama" >
						<span class="text-danger" v-if="dataErr['pemilik['+idx+'].nama']">{{dataErr['pemilik['+idx+'].nama']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.nik" >
						<span class="text-danger" v-if="dataErr['pemilik['+idx+'].nik']">{{dataErr['pemilik['+idx+'].nik']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.alamat" >
						<span class="text-danger" v-if="dataErr['pemilik['+idx+'].alamat']">{{dataErr['pemilik['+idx+'].alamat']}}</span>
					</td>
					<td>
						<select v-model.number="item.daerah_id" @change="refreshSelect($event, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', pemilikLists[idx].kelurahans, 'kode')" class="form-select pe-4">
							<option v-for="thisItem in daerahs" :value="thisItem.id">{{thisItem.nama}}</option>
						</select>	
						<span class="text-danger" v-if="dataErr['pemilik['+idx+'].daerah_id']">{{dataErr['pemilik['+idx+'].daerah_id']}}</span>
					</td>
					<td>
						<select v-model.number="item.kelurahan_id" class="form-select pe-4">
							<template v-if="pemilikLists[idx].kelurahans.length>0">
								<option v-for="thisItem in pemilikLists[idx].kelurahans" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
							</template>
						</select>
						<span class="text-danger" v-if="dataErr['pemilik['+idx+'].kelurahan_id']">{{dataErr['pemilik['+idx+'].kelurahan_id']}}</span>
					</td>
					<td>
						<input class="form-control" v-model="item.telp" >
						<span class="text-danger" v-if="dataErr['pemilik['+idx+'].telp']">{{dataErr['pemilik['+idx+'].telp']}}</span>
					</td>
					<td class="text-center">
						<button v-if="idx>0" @click="delPemilik(this, idx)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="text-danger" v-if="dataErr.pemilik">{{dataErr.pemilik}}</div>
		<button @click="addPemilik(this)" class="btn bg-blue">Tambah</button>
		<div v-if="data.golongan==2">
			<hr />
			<div class="h6">Direktur Perusahaan</div>
			<table class="table table-bordered mb-2">
				<thead>
					<tr>
						<th>Nama</th>
						<th v-if="data.golongan==2">NIK</th><th v-else>NIB</th>
						<th>Alamat</th>
						<th>Kota / Kabupaten</th>
						<th>Kelurahan</th>
						<th>No Telp</th>
						<th style="width:30px"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-if="data.pemilik.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
					<tr v-else v-for="(item, idx) in pemilik" class="fit-form-control">
						<td><input class="form-control" v-model="item.direktur_nama" ></td>
						<td><input class="form-control" v-model="item.direktur_nik" ></td>
						<td><input class="form-control" v-model="item.direktur_alamat" ></td>
						<td>
							<select v-model.number="item.direktur_daerah_id" @change="refreshSelect($event, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', pemilikLists[idx].direktur_kelurahans, 'kode')" class="form-select pe-4">
								<option v-for="thisItem in daerahs" :value="thisItem.id">{{thisItem.namaD}}</option>
							</select>	
						</td>
						<td>
							<select v-model.number="item.direktur_kelurahan_id" class="form-select pe-4">
								<template v-if="pemilikLists[idx].direktur_kelurahans.length>0">
									<option v-for="thisItem in pemilikLists[idx].direktur_kelurahans" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
								</template>
							</select>
						</td>
						<td><input class="form-control" v-model="item.direktur_telp" ></td>
						<td class="text-center">
							<button @click="delPemilik(pemilik, idx)" class="btn btn-xs bg-danger p-1">
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
					<th>Kota / Kabupaten</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th>Email</th>
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.narahubung.length==0"><td class="text-center p-3" colspan="8">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.narahubung" class="fit-form-control">
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
						<select v-model.number="item.daerah_id" @change="refreshSelect($event, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', narahubungLists[idx].kelurahans, 'kode')" class="form-select pe-4">
							<option v-for="thisItem in daerahs" :value="thisItem.id">{{thisItem.nama}}</option>
						</select>	
						<span class="text-danger" v-if="dataErr['narahubung['+idx+'].daerah_id']">{{dataErr['narahubung['+idx+'].daerah_id']}}</span>
					</td>
					<td>
						<select v-model.number="item.kelurahan_id" class="form-select pe-4">
							<template v-if="narahubungLists[idx].kelurahans.length>0">
								<option v-for="thisItem in narahubungLists[idx].kelurahans" :value="thisItem.id">{{thisItem.nama + ' - ' + thisItem.kode}}</option>
							</template>
						</select>
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
						<button v-if="idx>0" @click="delNarahubung(this, idx)" class="btn btn-xs bg-danger p-1">
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

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php
$this->registerCssFile('https://unpkg.com/@vuepic/vue-datepicker@latest/dist/main.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@vuepic/vue-datepicker@latest', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-next-select/dist/index.min.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-next-select/dist/vue-next-select.iife.prod.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/refs/common.js?v=20221108a');
$this->registerJsFile('@web/js/dto/npwpd/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/pendaftaran-wp/entryform.js?v=20221108a');
$this->registerJsFile('@web/js/app-entryform.js?v=20221108a');
