<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/tarif-jambong/tarif-jambong.js?v=20221108a');
$this->registerJsFile('@web/js/services/tarif-jambong/tarif-jambong.js?v=20221108a');

?>

<!-- Nav tabs -->
<div class="card my-4">
	<div class="card-body">
		<h4 class="card-title">Tarif Uang Jaminan Bongkar (Reklame Tetap)</h4>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="reklame-billboard-tab" data-bs-toggle="tab" data-bs-target="#reklame-billboard" type="button" role="tab" aria-controls="reklame-billboard" aria-selected="true">Reklame Billboard</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="reklame-neon-box-tab" data-bs-toggle="tab" data-bs-target="#reklame-neon-box" type="button" role="tab" aria-controls="profile" aria-selected="false">Reklame Neon Box</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="reklame-tab" data-bs-toggle="tab" data-bs-target="#reklame" type="button" role="tab" aria-controls="reklame" aria-selected="false">Reklame</button>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="reklame-billboard" role="tabpanel" aria-labelledby="non-niaga-tab">
				<table class="table custom">
					<thead>
						<tr>
							<th>No</th>
							<th>Batas Bawah</th>
							<th>Batas Atas</th>
							<th>Nominal</th>
							<th style="width:90px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, idx) in 5">
							<td>{{idx+1}}</td>
							<td>lorem</td>
							<td>lorem</td>
							<td>lorem</td>
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
				</table>
			</div>
			<div class="tab-pane" id="reklame-neon-box" role="tabpanel" aria-labelledby="reklame-neon-box-tab">
				<table class="table custom">
					<thead>
						<tr>
							<th>No</th>
							<th>Batas Bawah</th>
							<th>Batas Atas</th>
							<th>Nominal</th>
							<th style="width:90px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, idx) in 5">
							<td>{{idx+1}}</td>
							<td>lorem</td>
							<td>lorem</td>
							<td>lorem</td>
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
				</table>
			</div>
			<div class="tab-pane" id="reklame" role="tabpanel" aria-labelledby="reklame-tab">
				<table class="table custom">
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis Reklame</th>
							<th>Nominal</th>
							<th style="width:90px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, idx) in data">
							<td>{{idx+1}}</td>
							<td>{{item.jenisReklame}}</td>
							<td>{{new Intl.NumberFormat("id-ID").format(item.nominal)}}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
										Aksi
									</button>
									<ul class="dropdown-menu dropdown-menu-end" style="width:150px">
										<li><button @click="showEntry(idx)" class="dropdown-item"><i class="bi bi-pencil me-1"></i> Edit</button></li>
										<li><button @click="showDel(idx)" class="dropdown-item"><i class="bi bi-x-lg me-1"></i> Hapus</button></li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="card my-4">
	<div class="card-body">
		<h4 class="card-title">Tarif Uang Jaminan Bongkar (Reklame Insidentil)</h4>
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group mb-3">
					<input type="text" class="form-control">
					<span class="input-group-text" id="basic-addon2">%</span>
				</div>
				<button type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div id="entryFormModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>{{entryFormTitle}}</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row my-2">
					<div class="col-md-3 pt-1">Jenis Reklame</div>
					<div class="col">
						<input v-model="entryData.jenisReklame" class="form-control">
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 pt-1">Nominal</div>
					<div class="col">
						<input v-model.number="entryData.nominal" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button @click="submitEntry" class="btn bg-blue"><i class="bi bi-check-lg"></i> Simpan</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>

<div id="confirmDelModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Konfirmasi Hapus Data</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-1">Proses akan menghapus data dengan informasi sebagai berikut:</div>
				<div class="row">
					<div class="col-md-3 ps-4">Jenis Reklame</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.jenisReklame}}</div>
				</div>
				<div class="row">
					<div class="col-md-3 ps-4">Nominal</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{new Intl.NumberFormat("id-ID").format(entryData.nominal)}}</div>
				</div>
				<div class="mt-4">Lanjutkan Proses?</div>
			</div>
			<div class="modal-footer">
				<button @click="submitDel" class="btn bg-danger"><i class="bi bi-check-lg"></i> Iya, Hapus Data</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>