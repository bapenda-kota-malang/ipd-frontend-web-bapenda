<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221117a');
$this->registerJsFile('@web/js/dto/und-pemeriksaan/create.js?v=20221108b');
$this->registerJsFile('@web/js/services/und-pemeriksaan/entry.js?v=20221108b');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Data Undangan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Jenis Pajak</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<select class="form-control">
					<option value="">PBB</option>
					<option value="">PDL</option>
				</select>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nomor Surat</div>
			<div class="col-md-5 col-lg-4 col-xl-3">
				<div class="input-group mb-2">
					<input class="form-control">
					<span @click="searchNomorSurat" class="input-group-text px-3 pointer"><i class="bi bi-search me-2"></i>Cari</span>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Tanggal</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<datepicker v-model="data.tanggalPemeriksaan" format="DD/MM/YYYY" />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Keperluan</div>
			<div class="xc-md">
				<textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
			</div>
		</div>
	</div>
</div>


<div id="stpdSearch" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
							<th>NPWPD</th>
							<th>Nama</th>
							<th>Tanggal SP</th>
							<th>Masa Pajak</th>
							<th style="width:100px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="spList.length==0">
							<td colspan="3" class="text-center">Data masih kosong</td>
						</tr>
						<tr v-for="item in spList">
							<td>{{item.spt.npwpd.npwpd}}</td>
							<td>{{item.spt.npwpd.objekPajak.nama}}</td>
							<td>{{item.tanggal}}</td>
							<td>{{item.spt.periode}}</td>
							<td class="text-end">
								<button @click="pilihStpd(item.id)" class="btn bg-blue">Pilih</button>
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
