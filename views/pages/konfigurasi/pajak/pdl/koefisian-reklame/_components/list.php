<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

// $this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="mpt1t-tab" data-bs-toggle="tab" data-bs-target="#mpt1t" type="button" role="tab" aria-controls="mpt1t" aria-selected="true">Masak Pajak Tetap 1 Tahun</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="mpi1t-tab" data-bs-toggle="tab" data-bs-target="#mpi1t" type="button" role="tab" aria-controls="profile" aria-selected="false">Masa Pajak Insidentil 1 Tahun</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="mpi1b-tab" data-bs-toggle="tab" data-bs-target="#mpi1b" type="button" role="tab" aria-controls="mpi1b" aria-selected="false">Masa Pajak Insidentil 1 Bulan</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="mpi1kp-tab" data-bs-toggle="tab" data-bs-target="#mpi1kp" type="button" role="tab" aria-controls="mpi1kp" aria-selected="false">Masa Pajak Insidentil 1 Kali Penyelenggaraan</button>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="mpt1t" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar</th>
					<th>Klasifikasi</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
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
		</table>
	</div>
	<div class="tab-pane" id="mpi1t" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar Pengeluaran</th>
					<th>Masa Pajak</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
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
		</table>
	</div>
	<div class="tab-pane" id="mpi1b" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar Pengeluaran</th>
					<th>Masa Pajak</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
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
		</table>
	</div>
	<div class="tab-pane" id="mpi1kp" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar Pengeluaran</th>
					<th>Masa Pajak</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
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
		</table>
	</div>
</div>