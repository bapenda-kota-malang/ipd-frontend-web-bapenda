<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/tarif-air-tanah/tarif-air-tanah.js?v=20221108a');
$this->registerJsFile('@web/js/services/tarif-air-tanah/tarif-air-tanah.js?v=20221108a');

?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" @click="setTabOne()" id="non-niaga-tab" data-bs-toggle="tab" data-bs-target="#non-niaga" type="button" role="tab" aria-controls="non-niaga" aria-selected="true">Non Niaga</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" @click="setTabTwo()" id="ibba-tab" data-bs-toggle="tab" data-bs-target="#ibba" type="button" role="tab" aria-controls="profile" aria-selected="false">Industri Bahan baku air</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" @click="setTabThree()" id="niaga-tab" data-bs-toggle="tab" data-bs-target="#niaga" type="button" role="tab" aria-controls="niaga" aria-selected="false">Niaga</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" @click="setTabFour()" id="pdam-tab" data-bs-toggle="tab" data-bs-target="#pdam" type="button" role="tab" aria-controls="pdam" aria-selected="false">PDAM</button>
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
				<tr v-if="data.length==0">
					<td colspan="6" class="text-center">Belum ada data</td>
				</tr>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasBawah)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasAtas)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifMataAir)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifBukanMataAir)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
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
				<tr v-if="data.length==0">
					<td colspan="6" class="text-center">Belum ada data</td>
				</tr>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasBawah)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasAtas)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifMataAir)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifBukanMataAir)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
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
				<tr v-if="data.length==0">
					<td colspan="6" class="text-center">Belum ada data</td>
				</tr>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasBawah)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasAtas)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifMataAir)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifBukanMataAir)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
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
				<tr v-if="data.length==0">
					<td colspan="6" class="text-center">Belum ada data</td>
				</tr>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasBawah)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.batasAtas)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifMataAir)}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarifBukanMataAir)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
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
					<div class="col-md-4 pt-1">Jenis Tarif</div>
					<div class="col">
						<vueselect v-model="entryData.peruntukan" :options="peruntukanList" :reduce="item => item.title" label="title" placeholder=".. Pilih .."></vueselect>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-4 pt-1">Batas Bawah</div>
					<div class="col">
						<input v-model.number="entryData.batasBawah" class="form-control">
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-4 pt-1">Batas Atas</div>
					<div class="col">
						<input v-model.number="entryData.batasAtas" class="form-control">
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-4 pt-1">Tarif Mata Air</div>
					<div class="col">
						<input v-model.number="entryData.tarifMataAir" class="form-control">
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-4 pt-1">Tarif Bukan Mata Air</div>
					<div class="col">
						<input v-model.number="entryData.tarifBukanMataAir" class="form-control">
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
					<div class="col-md-4 ps-4">Jenis Tarif</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.peruntukan}}</div>
				</div>
				<div class="row">
					<div class="col-md-4 ps-4">Batas Bawah</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{new Intl.NumberFormat("id-ID").format(entryData.batasBawah)}}</div>
				</div>
				<div class="row">
					<div class="col-md-4 ps-4">Batas Atas</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{new Intl.NumberFormat("id-ID").format(entryData.batasAtas)}}</div>
				</div>
				<div class="row">
					<div class="col-md-4 ps-4">Tarif Mata Air</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{new Intl.NumberFormat("id-ID").format(entryData.tarifMataAir)}}</div>
				</div>
				<div class="row">
					<div class="col-md-4 ps-4">Tarif Bukan Mata Air</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{new Intl.NumberFormat("id-ID").format(entryData.tarifBukanMataAir)}}</div>
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