<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/rekening-pajak/rekening-pajak.js?v=20221108a');
$this->registerJsFile('@web/js/services/rekening-pajak/rekening-pajak.js?v=20221108a');

?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="pajak-tab" data-bs-toggle="tab" data-bs-target="#pajak" type="button" role="tab" aria-controls="pajak" aria-selected="true">Pajak</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="rekening-tab" data-bs-toggle="tab" data-bs-target="#rekening" type="button" role="tab" aria-controls="rekening" aria-selected="false">Rekening</button>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="pajak" role="tabpanel" aria-labelledby="pajak-tab">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Jenis Pajak</th>
					<th>OA</th>
					<th>SA</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in pajakList">
					<td>{{ ++idx }}</td>
					<td>{{ item.jenisPajak.kode }}</td>
					<td>{{item.jenisPajak.nama}}</td>
					<td>
						<!-- checkbox -->
						<input class="form-check-input" type="checkbox" id="" v-model="item.oa" disabled>
					</td>
					<td>
						<input class="form-check-input" type="checkbox" id="" v-model="item.sa" disabled>
					</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Edit</a></li>
								<li><a class="dropdown-item" href="#" @click="onDelete('pajak', item.id)">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="tab-pane" id="rekening" role="tabpanel" aria-labelledby="rekening-tab">
		<div class="table-responsive">
			<table class="table custom">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Rekening</th>
						<th style="width:90px"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(item, idx) in pajakList.data">
						<td>{{ idx + 1 }}</td>
						<td>{{}}</td>
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
	<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab"> messages </div>
</div>


<!-- modal pajak -->
<div class="modal fade" id="modal-pajak" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitleId">Data Pajak</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3 pt-1">Rekening</div>
					<div class="col mb-2">
						<div>
							<vueselect v-model="pajakEntryDto.rekening_id" :options="rekeningOptions" :reduce="item => item.id" label="nama" code="id" />
						</div>
					</div>
				</div>
				<div class="form-group mt-2">
					<label for="">OA</label>
					<input type="checkbox" name="" id="" v-model="pajakEntryDto.oa">

					<label for="">SA</label>
					<input type="checkbox" name="" id="" v-model="pajakEntryDto.sa">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" @click="onSubmitPajak">Save</button>
			</div>
		</div>
	</div>
</div>

<!-- modal rekening -->
<div class="modal fade" id="modal-rekening" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitleId">Data Rekening</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Kode</label>
					<input type="text" name="" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Nama Rekening</label>
					<input type="text" name="" id="" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>