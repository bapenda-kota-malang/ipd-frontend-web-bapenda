<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/image.js?v=20221117a');
$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221117a');
$this->registerJsFile('@web/js/dto/bapp/create.js?v=20221108b');
$this->registerJsFile('@web/js/services/bapp/entry.js?v=20221108b');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Data Undangan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">No. Undangan</div>
			<div class="col-md-5 col-lg-4 col-xl-3">
				<div class="input-group mb-2">
					<input :value="undangan_nomor" class="form-control">
					<span @click="showSearchUndangan" class="input-group-text px-3 pointer"><i class="bi bi-search me-2"></i>Cari</span>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input :value="wpd_npwpd" class="form-control" disabled />
			</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<input :value="wpd_nama" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
			<div class="xc-3 pt-2 d-md-none">RT/RW</div>
			<div class="xc xc-lg-10 xc-xl-9 xc-xxl-8 mb-2">
				<input :value="wpd_alamat" class="form-control" disabled />
			</div>
			<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input :value="wpd_rtRw"class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Tanggal</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<datepicker v-model="tanggalPemeriksaan" format="DD/MM/YYYY" />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Hasil</div>
			<div class="xc-md">
				<textarea v-model="data.hasil" cols="30" rows="10" class="form-control"></textarea>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">Lampiran</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Dokumentasi</div>
			<div class="col-md-8 col-lg-7 col-xl-6 mb-2">
				<div v-if="data.dokumentasi.length==0" class="mb-2 pt-2">Belum ada foto</div>
				<div v-else class="row g-2">
					<div v-for="(item, index) in data.dokumentasi" class="col-md-6 col-lg-4 mb-1">
						<input class="form-control" type="file" @change="addImage($event, 'dokumentasi' + index, 'fitWidth', 800, null, data.dokumentasi, index)">
						<div class="mt-1">
							<img :id="'dokumentasi' + index" class="img-thumbnail" :class="{ 'd-none': !item }" />
						</div>
					</div>
				</div>
				<div class="text-danger py-1" v-if="dataErr['dokumentasi[0]']">{{dataErr['dokumentasi[0]']}}</div>
				<button class="btn bg-blue" @click="data.dokumentasi.push('')">Tambah</button>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Dokumen Lain`</div>
			<div class="col-md-8 col-lg-7 col-xl-6 mb-2">
				<div v-if="data.dokumenLainLain.length==0" class="mb-2 pt-2">Belum ada foto</div>
				<div v-else class="row g-2">
					<div v-for="(item, index) in data.dokumenLainLain" class="col-md-6 col-lg-4 mb-1">
						<input class="form-control" type="file" @change="addImage($event, 'dokumenLainLain' + index, 'fitWidth', 800, null, data.dokumenLainLain, index)">
						<div class="mt-1">
							<img :id="'dokumenLainLain' + index" class="img-thumbnail" :class="{ 'd-none': !item }" />
						</div>
					</div>
				</div>
				<div class="text-danger py-1" v-if="dataErr['dokumenLainLain[0]']">{{dataErr['dokumenLainLain[0]']}}</div>
				<button class="btn bg-blue" @click="data.dokumenLainLain.push('')">Tambah</button>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">Petugas</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
                    <th style="width:50px"></th>
					<th style="width:120px">NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th style="width:60px"></th>
                </tr>
			</thead>
			<tbody>
				<tr v-if="petugasList.length==0">
					<td class="text-center p-3" colspan="4">Tidak ada data</td>
				</tr>
				<tr v-else v-for="(item,idx) in petugasList">
                    <td class="pt-2 text-center"><input type="checkbox"></td>
                    <td>{{item.nip}}</td>
                    <td>{{item.nama}}</td>
                    <td>{{item.jabatan}}</td>
                    <td>
						<button @click="delPetugas(idx)" class="btn btn-xs bg-danger p-1"><i class="bi bi-x-lg"></i></button>
					</td>
                </tr>
			</tbody>
		</table>
		<button class="btn bg-blue" @click="showSearchPegawai">Tambah</button>
	</div>
</div>

<div id="searchUndanganModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div class="fw-600">Pilih NPWPD</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>No Surat Undangan</th>
							<th>NPWPD</th>
							<th>Nama</th>
							<th>Tanggal SP</th>
							<!-- <th>Masa Pajak</th> -->
							<th style="width:100px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="undanganList.length==0">
							<td colspan="3" class="text-center">Data masih kosong</td>
						</tr>
						<tr v-for="(item, idx) in undanganList">
							<td>{{item.noSuratUndangan}}</td>
							<td>{{item.npwpd ? item.npwpd.npwpd : ''}}</td>
							<td>{{item.npwpd && item.npwpd.objekPajak ? item.npwpd.objekPajak.nama : ''}}</td>
							<td>{{item.tanggal}}</td>
							<!-- <td>{{item.spt.periode}}</td> -->
							<td class="text-end">
								<button @click="pilihUndangan(idx)" class="btn bg-blue">Pilih</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<div id="searchPegawaiModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div class="fw-600">Pilih Pegawai</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th style="width:120px">NIP</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th style="width:100px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="pegawaiList.length==0">
							<td colspan="3" class="text-center">Data masih kosong</td>
						</tr>
						<tr v-for="(item, idx) in pegawaiList">
							<td>{{item.nip}}</td>
							<td>{{item.nama}}</td>
							<td>{{item.jabatan}}</td>
							<td class="text-end">
								<button @click="pilihPegawai(idx)" class="btn bg-blue">Pilih</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
