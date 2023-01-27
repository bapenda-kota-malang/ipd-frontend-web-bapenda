<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/skpdkb-skpdkbt/oa/create.js?v=20221114a');
$this->registerJsFile('@web/js/services/skpdkb-skpdkbt/oa/create.js?v=20221117a');

?>

<!-- Penetapan -->
<div class="card mb-4">
	<div class="card-header">Penetapan</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Penetapan Berdasarkan</label>
				<vueselect v-model="data.JenisKetetapan" :options="penetapanList" :reduce="item => item.jenisKetetapan" label="jenisKetetapan" code="jenisKetetapan" />
			</div>
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Billing Penetapan</label>
				<input type="text" v-model="data.BillingNumber" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-10 col-xl-6 col-xxl-4 mb-2">
				<label for="">SKPD/SKPDKB/SKPDKBT</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control">
					<button class="btn bg-blue" @click="showModalSearch">Cari</button>
				</div>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-2 col-xl-6 col-xxl-4 mb-2">
				<label for="">Jenis Pajak</label>
				<input type="text" v-model="data.ObjekPajak_Id" class="form-control">
			</div>
			<div class="xc-md xc-lg-10 col-xl-6 col-xxl-4 mb-2">
				<label for="">&nbsp;</label>
				<input type="text" v-model="data.Name_objekPajak" class="form-control">
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Tanggal Penetapan</label>
				<input type="text" v-model="data.StartDate" class="form-control" disabled>
			</div>
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Tanggal Batas Bayar</label>
				<input type="text" v-model="data.EndDate" class="form-control" disabled>
			</div>
		</div>
		<div class="row mb-2">
			<div class="">
				<table class="table table-hover">
					<thead class="table-light">
						<tr class="text-capitalize">
							<th>NPWPD</th>
							<th>nama wajib pajak</th>
							<th>jumlah SKPD</th>
							<th>kenaikan</th>
							<th>bunga</th>
							<th>denda</th>
							<th>pengurang</th>
							<th>jumlah total</th>
							<th>masa awal</th>
							<th>masa akhir</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Riwayat SKPD -->
<div class="card mb-4">
	<div class="card-header">Riwayat SKPD</div>
	<div class="card-body">
		<div class="row mb-2">
			<div>
				<table class="table table-hover">
					<thead class="table-light">
						<tr class="text-capitalize">
							<th>No. SPTPD/SKPDKB</th>
							<th>nominal</th>
							<th>tanggal pembayaran</th>
							<th>masa pajak</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row">A-2201200</td>
							<td>Rp. XXX.XXX</td>
							<td>DD-MM-YYYY</td>
							<td>September 2022</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="modal-search" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<div>Search SKPD/SKPDKB/SKPDKBT</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- input search -->
				<div class="row">
					<div class="input-group mb-3">
						<input type="text" name="" id="" class="form-control" placeholder="Cari SKPD">
						<button class="btn bg-blue"><i class="bi bi-search"></i></button>
					</div>
				</div>
				<div class="row">
					<!-- table -->
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="table-light">
									<th scope="col">SKPD/SKPDKB/SKPDKBT</th>
									<th scope="col">NPWPD</th>
									<th scope="col">Nama Wajib Pajak</th>
									<th scope="col">Jumlah SKPD</th>
									<th scope="col">Masa Awal</th>
									<th scope="col">Masa Akhir</th>
								</tr>
							</thead>
							<tbody>
								<!-- loop with range -->
								<tr v-for="i in 5">
									<td scope="row">A-2201200</td>
									<td>1234567890</td>
									<td>PT. ABC</td>
									<td>Rp. XXX.XXX</td>
									<td>DD-MM-YYYY</td>
									<td>DD-MM-YYYY</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>