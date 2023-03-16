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
		<button class="nav-link active" id="non-niaga-tab" data-bs-toggle="tab" data-bs-target="#non-niaga" type="button" role="tab" aria-controls="non-niaga" aria-selected="true">Non Niaga</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="ibba-tab" data-bs-toggle="tab" data-bs-target="#ibba" type="button" role="tab" aria-controls="profile" aria-selected="false">Industri Bahan baku air</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="niaga-tab" data-bs-toggle="tab" data-bs-target="#niaga" type="button" role="tab" aria-controls="niaga" aria-selected="false">Niaga</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pdam-tab" data-bs-toggle="tab" data-bs-target="#pdam" type="button" role="tab" aria-controls="pdam" aria-selected="false">PDAM</button>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="non-niaga" role="tabpanel" aria-labelledby="non-niaga-tab">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Batas Bawah</th>
					<th>Batas Atas</th>
					<th>Tarif Mata Air</th>
					<th>Tarif Bukan Mata Air</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
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
		</table>
	</div>
	<div class="tab-pane" id="ibba" role="tabpanel" aria-labelledby="ibba-tab">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Batas Bawah</th>
					<th>Batas Atas</th>
					<th>Tarif Mata Air</th>
					<th>Tarif Bukan Mata Air</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
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
		</table>
	</div>
	<div class="tab-pane" id="niaga" role="tabpanel" aria-labelledby="niaga-tab">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Batas Bawah</th>
					<th>Batas Atas</th>
					<th>Tarif Mata Air</th>
					<th>Tarif Bukan Mata Air</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
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
		</table>
	</div>
	<div class="tab-pane" id="pdam" role="tabpanel" aria-labelledby="pdam-tab">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Batas Bawah</th>
					<th>Batas Atas</th>
					<th>Tarif Mata Air</th>
					<th>Tarif Bukan Mata Air</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in 5">
					<td>{{idx+1}}</td>
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
		</table>
	</div>
</div>