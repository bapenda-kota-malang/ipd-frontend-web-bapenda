<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/dummy.js?v=20221108a');
$this->registerJsFile('@web/js/services/lap-bphtb/list.js?v=20221108a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:40px;"><input type="checkbox" class="form-check-input"/></th>
			<th>No Pelayanan</th>
			<th>No. SSPD</th>
			<th>Nama WP</th>
			<th>Alamat OP</th>
			<th>Jumlah Disetor</th>
			<th>Tanggal</th>
			<th class="text-center" style="width:50px">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
			<td class="text-center"><input type="checkbox" class="form-check-input"/></td>
			<td>{{ item.no }}</td>
			<td>{{ item.noSSPD }}</td>
			<td>{{ item.namaWP }}</td>
			<td>{{ item.alamatOP }}</td>
			<td>{{ item.nilai1 }}</td>
			<td>{{ item.tanggal1 }}</td>
			<td class="nav text-center">
				<button type="button" class="btn bg-green">
					<i class="bi bi-printer"></i>
				</button>
			</td>
		</tr>
	</tbody>
</table>

<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-sliders me-2"></i>Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row g-0 mb-3">
					<div class="xc-md-3 pt-1">Tanggal</div>
					<div class="xc-md-3 ps-md-2">
						<datepicker format="DD/MM/YYYY" />
					</div>
					<div class="xc-md-1 pt-1 text-center">s/d</div>
					<div class="xc-md-3 ps-md-2">
						<datepicker format="DD/MM/YYYY" />
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="xc-md-3 pt-1">Metode Payment</div>
					<div class="xc-md-6 ps-md-2">
						<vueselect v-model="data.paymentMethod"
							:options="paymentMethods"
							:reduce="item => item.id"
							label="nama"
							code="id"
						/>
					</div>
					<div class="xc-md-3 pt-1 text-lg-end">PPAT</div>
					<div class="xc-md-6 ps-md-2">
						<vueselect v-model="data.paymentMethod"
							:options="paymentMethods"
							:reduce="item => item.id"
							label="nama"
							code="id"
						/>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="xc-md-3 pt-1">Dasar Setoran</div>
					<div class="xc-md ps-md-2">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
							<label class="form-check-label" for="inlineCheckbox1">Perhitungan WP</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
							<label class="form-check-label" for="inlineCheckbox2">STB</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
							<label class="form-check-label" for="inlineCheckbox2">SKPDKB</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
							<label class="form-check-label" for="inlineCheckbox2">SKPDKBT</label>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="xc-md-3 pt-1">Status</div>
					<div class="xc-md-6 ps-md-2">
						<vueselect v-model="data.paymentMethod"
							:options="paymentMethods"
							:reduce="item => item.id"
							label="nama"
							code="id"
						/>
					</div>
					<div class="xc-md-3 pt-1 text-lg-end">SSPD</div>
					<div class="xc-md-6 ps-md-2">
						<input class="forma-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<button type="button" @click="applyFilter" class="btn bg-blue"><i class="bi bi-check-lg me-2"></i>OK</button>
			</div>
		</div>
	</div>
</div>

