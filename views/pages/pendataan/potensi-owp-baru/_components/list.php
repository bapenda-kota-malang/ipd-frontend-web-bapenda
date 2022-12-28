<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/potensi-op/list.js?v=20221228a');

?>
<table class="table table-sm custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Golongan</th>
			<th>Nomor</th>
			<th>Jenis Usaha</th>
			<th>Nama WP</th>
			<th>Nama Pemilik</th>
			<th>Kecamatan</th>
			<th>Kelurahan</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th style="width:90px"></th>
		</tr>
		<tbody>
			<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
				<td><input class="form-check-input" type="checkbox" value=""></td>
				<td>{{golongans[item.golongan]}}</td>
				<td>{{item.id}}</td>
				<td>{{item.rekening.jenisUsaha}}</td>
				<td>{{item.detailPotensiOp.nama}}</td>
				<td>{{item.potensiPemilikWp[0].nama}}</td>
				<td>{{item.detailPotensiOp.kecamatan.nama}}</td>
				<td>{{item.detailPotensiOp.kelurahan.nama}}</td>
				<td>{{item.createdAt.substr(0,10)}}</td>
				<td>-</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Aksi
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Detail</a></li>
							<li><a class="dropdown-item" href="#">Edit</a></li>
							<li><a class="dropdown-item" href="#">Hapus</a></li>
						</ul>
					</div>
				</td>
			</tr>
		</tbody>
	</thead>
</table>

<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-sliders me-2"></i>Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Golongan</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option>Golongan 1 (Orang Pribadi)</option>
							<option>Golongan 2 (Orang Pribadi)</option>
						</select>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Jenis Usaha</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option>...........</option>
							<option>...........</option>
							<option>...........</option>
							<option>...........</option>
							<option>...........</option>
						</select>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Nama WP</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Nama Pemilik</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Kecamatan</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Kelurahan</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Status</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option>Aktif</option>
							<option>Tidak Aktif</option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<button type="button" class="btn bg-blue"><i class="bi bi-check-lg me-2"></i>OK</button>
			</div>
		</div>
	</div>
</div>
