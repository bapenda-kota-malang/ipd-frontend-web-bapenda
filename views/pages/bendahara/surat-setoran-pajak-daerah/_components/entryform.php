<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/tbp/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/sspd/entry.js?v=20221108b');

?>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">Nomor</div>
	<div class="col-md-3 xc-lg-3 mb-2">
		<input value="auto" class="form-control" disabled />
	</div>
	<!-- <div class="col-md-3 xc-lg-3 pt-1 text-md-end pe-md-2">Tgl SSPD</div>
	<div class="col-md-3 xc-lg-3 mb-2">
		<input v-model="" class="form-control" />
	</div> -->
	<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-md-2">Ketetapan</div>
	<div class="col-md-5 xc-lg-3 mb-2">
		<select class="form-control">
			<option value="1">Ketetapan</option>
			<option value="2">Non Ketetapan</option>
		</select>
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">SKPD</div>
	<div class="col-2 col-md-3 xc-lg-3 mb-2">
		<input class="form-control" />
	</div>
	<div class="col col-md xc-lg-8 mb-2">
		<input class="form-control" />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">NPWPD</div>
	<div class="col-8 col-md-4 xc-lg-3 col-lg-2 col-xl-3 col-xxl-2 mb-2">
		<input v-model="npwpd" class="form-control" disabled />
	</div>
	<div class="col"><button @click="showNpwpSearch" class="btn bg-blue"><i class="bi bi-search"></i> Cari NPWPD</button></div>
</div>
<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Nama</div>
	<div class="col-md-6 xc-lg-8 col-xxl-5">
		<input v-model="namaUsaha"t class="form-control" disabled />
	</div>
</div>
<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Alamat</div>
	<div class="col-md">
		<input v-model="alamatUsaha" class="form-control" disabled />
	</div>
	<div class="col-md-2 xc-lg-2 xc-xl-2 pt-1 text-md-end pe-2">RT/RW</div>
	<div class="col-md-2 xc-lg-2">
		<input v-model="rtRwUsaha" class="form-control" disabled />
	</div>
</div>

<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Keterangan</div>
	<div class="col-md">
		<textarea v-model="alamatUsaha" class="form-control"></textarea>
	</div>
</div>

<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Akun Bendahara</div>
	<div class="col-2 xc-lg-3">
		<input v-model="alamatUsaha" class="form-control" disabled />
	</div>
	<div class="col col-mg-6 xc-lg-8">
		<input v-model="alamatUsaha" class="form-control" disabled />
	</div>
</div>

<!-- <div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 col-xl-2 pt-1">Bendahara Penerima</div>
	<div class="col-md-6 xc-lg-8">
		<input v-model="data." class="form-control" />
	</div>
</div> -->

<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Tempat Pembayaran</div>
	<div class="col-md-6 xc-lg-8">
		<input v-model="data.tempatPembayaran" class="form-control" />
	</div>
</div>

<div class="row g-1 mb-2 mt-3">
	<div class="xc-md-4 xc-lg-3 pt-1">Detail Pembayaran</div>
	<div class="col-md">
		<table class="table">
			<thead>
				<tr>
					<td class="bg-slate-300">No</td>
					<td class="bg-slate-300">SPTPD/SKPD/SKPDKB</td>
					<td class="bg-slate-300">Jatuh Tempo</td>
					<td class="bg-slate-300">Kode Akun</td>
					<td class="bg-slate-300">Nama Akun</td>
					<td class="bg-slate-300">Nominal Ketetapan</td>
					<td class="bg-slate-300">Nominal Bayar</td>
					<td class="bg-slate-300">Kurang Bayar</td>
					<td class="bg-slate-300">Denda</td>
				</tr>
			</thead>
		</table>
	</div>
</div>


<div id="npwpdSearch" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Pilih NPWPD</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<td class="bg-slate-300">NPWPD</td>
							<td class="bg-slate-300">Nama</td>
							<td class="bg-slate-300">Jenis Usaha</td>
							<td style="width:100px"></td>
						</tr>
					</thead>
					<tbody>
						<tr v-if="npwpdList.length==0">
							<td colspan="3" class="text-center">Data masih kosong</td>
						</tr>
						<tr v-for="item in npwpdList">
							<td>{{item.npwpd}}</td>
							<td>{{item.objekPajak.nama}}</td>
							<td>{{item.rekening.jenisUsaha + ' - ' + item.rekening.nama }}</td>
							<td class="text-end">
								<button @click="pilihNpwpd(item.npwpd)" class="btn bg-blue">Pilih</button>
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

