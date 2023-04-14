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
						<tr v-for="(item, idx) in 5">
							<td>{{idx+1}}</td>
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