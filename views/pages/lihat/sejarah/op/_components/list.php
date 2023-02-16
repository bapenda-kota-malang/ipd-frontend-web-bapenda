<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row">
				<div class="col-3 text-left">NOP</div>
				<div class="col">
					<?php
					include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
					?>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Nama Wajib Pajak</div>
				<div class="col">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Alamat Wajib Pajak</div>
				<div class="col">
					<textarea name="" class="form-control"></textarea>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Alamat Objek Pajak</div>
				<div class="col">
					<textarea name="" class="form-control"></textarea>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-4">
			<button class="btn btn-block btn-primary">Cari</button>
		</div>
	</div>
	<hr>

	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<button class="nav-link active" id="history-objek-pajak-tab" data-bs-toggle="tab" data-bs-target="#history-objek-pajak" type="button" role="tab" aria-controls="history-objek-pajak" aria-selected="true">History Objek Pajak</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="his-op-bumi-tab" data-bs-toggle="tab" data-bs-target="#his-op-bumi" type="button" role="tab" aria-controls="his-op-bumi" aria-selected="false">History Objek Pajak Bumi</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="his-op-bangunan-tab" data-bs-toggle="tab" data-bs-target="#his-op-bangunan" type="button" role="tab" aria-controls="his-op-bangunan" aria-selected="false">History Objek Pajak Bangunan</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="his-nilai-individu-tab" data-bs-toggle="tab" data-bs-target="#his-nilai-individu" type="button" role="tab" aria-controls="his-nilai-individu" aria-selected="false">History Nilai Bangunan</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="his-op-anggota-tab" data-bs-toggle="tab" data-bs-target="#his-op-anggota" type="button" role="tab" aria-controls="his-op-anggota" aria-selected="false">History Objek Pajak Anggota</button>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane active" id="history-objek-pajak" role="tabpanel" aria-labelledby="history-objek-pajak-tab">
			<table class="table custom">
				<thead>
					<tr>
						<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
						<th>No</th>
						<th>Cabang</th>
						<th>Nama Wajib Pajak</th>
						<th>Status Wajib Pajak</th>
						<th>Total Luas Bangungan</th>
						<th>Tanggal Rekam</th>
						<th>Nama Perekam</th>
						<th style="width:90px"></th>
					</tr>
				<tbody>
					<tr v-for="(item, index) in 5">
						<td><input type="checkbox" /></td>
						<td>{{++index}}</td>
						<td>Ya</td>
						<td>lorem</td>
						<td>Pemilik</td>
						<td>72</td>
						<td>02/03/2023</td>
						<td>Admin PRD</td>
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
		</div>
		<div class="tab-pane" id="his-op-bumi" role="tabpanel" aria-labelledby="his-op-bumi-tab">
			<table class="table custom">
				<thead>
					<tr>
						<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
						<th>No</th>
						<th>Luas Bumi</th>
						<th>Nilai Bumi</th>
						<th>Kode ZNT</th>
						<th>Jenis Penggunaan Tanah</th>
						<th style="width:90px"></th>
					</tr>
				<tbody>
					<tr v-for="(item, index) in 5">
						<td><input type="checkbox" /></td>
						<td>{{++index}}</td>
						<td>lorem</td>
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
				</thead>
			</table>
		</div>
		<div class="tab-pane" id="his-op-bangunan" role="tabpanel" aria-labelledby="his-op-bangunan-tab">
			<table class="table custom">
				<thead>
					<tr>
						<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
						<th>No</th>
						<th>JPB</th>
						<th>Formulir LSOP</th>
						<th>Luas Bangunan</th>
						<th>Nilai Bangunan</th>
						<th>Tanggal Rekam</th>
						<th>Nama Perekam</th>
						<th style="width:90px"></th>
					</tr>
				<tbody>
					<tr v-for="(item, index) in 5">
						<td><input type="checkbox" /></td>
						<td>{{++index}}</td>
						<td>lorem</td>
						<td>lorem</td>
						<td>lorem</td>
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
				</thead>
			</table>
		</div>
		<div class="tab-pane" id="his-nilai-individu" role="tabpanel" aria-labelledby="his-nilai-individu-tab">
			<table class="table custom">
				<thead>
					<tr>
						<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
						<th>No</th>
						<th>No. Bangunan</th>
						<th>Formulir LSOP</th>
						<th>Nilai Individu</th>
						<th>Tanggal Penilai</th>
						<th>Tanggal Rekam</th>
						<th>Nama Perekam</th>
						<th style="width:90px"></th>
					</tr>
				<tbody>
					<tr v-for="(item, index) in 5">
						<td><input type="checkbox" /></td>
						<td>{{++index}}</td>
						<td>lorem</td>
						<td>lorem</td>
						<td>lorem</td>
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
				</thead>
			</table>
		</div>
		<div class="tab-pane" id="his-op-anggota" role="tabpanel" aria-labelledby="his-op-anggota-tab">
			<table class="table custom">
				<thead>
					<tr>
						<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
						<th>No</th>
						<th>NOP</th>
						<th>Luas Bumi Beban</th>
						<th>Luas Bangunan Beban</th>
						<th>Nilai Bumi Beban</th>
						<th>Nilai Bangunan Beban</th>
						<th style="width:90px"></th>
					</tr>
				<tbody>
					<tr v-for="(item, index) in 5">
						<td><input type="checkbox" /></td>
						<td>{{++index}}</td>
						<td>lorem</td>
						<td>lorem</td>
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
				</thead>
			</table>
		</div>
	</div>