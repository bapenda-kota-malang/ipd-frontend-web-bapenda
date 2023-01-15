<?php 

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/bphtb/verifikasi.js?v=20221206a');
$this->registerJsFile('@web/js/services/bphtb/verifikasi.js?v=20221206b');

?>
<div class="card mb-4">
	<div class="card-header">SSPD BPHTB</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-xl-7">
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Staff</div>
							<div class="col-md-9 col-lg-10 col-xl-9" v-if="data.namaStaff"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.namaStaff }}</div><div class="col-md-9 col-lg-10 col-xl-9" v-else> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belum di verifikasi staff</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Dispenda</div>
							<div class="ccol-md-9 col-lg-10 col-xl-9" v-if="data.validasiDisependa">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sudah di Verifikasi</div><div class="col-md-9 col-lg-9 col-xl-8" v-else> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belum di Verifikasi Dispenda </div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Petugas Lapangan</div>
							<div class="col-md-9 col-lg-10 col-xl-9"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.namaPetugasLapangan }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Petugas Lapangan</div>
							<div class="col-md-9 col-lg-4 col-xl-4"><input v-model="data.namaPetugasLapangan" class="form-control"/></div>
						</div>				
						<div class="row g-0 mb-3" v-if="data.alasanReject">
							<div class="col-md-2 col-lg-2 col-xl-3">Alasan Reject</div>
							<div class="col-md-9 col-lg-10 col-xl-9"> : <strong><p v-html="data.alasanReject"></p></div></strong>
						</div>		
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Bank</div>
							<div class="col-md-9 col-lg-10 col-xl-9" v-if="data.status == '10'"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sudah di Verifikasi Bank</div><div class="col-md-9 col-lg-9 col-xl-8" v-else> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belum di Verifikasi Bank </div>
						</div>	
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Tanggal Verifikasi {{ jbtStaff }}</div>
							<div class="col-md-9 col-lg-2 col-xl-2"><datepicker v-model="data.tglValidasiDispenda" format="DD-MM-YYYY" /></div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Status</div>
							<div class="col-md-9 col-lg-10 col-xl-9" v-if="jbtStaff != null"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Sudah di-approve oleh {{ jbtStaff }}.</strong></div> <div class="col-md-9 col-lg-2 col-xl-2" v-else> - </div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="row g-0 mb-3" v-if="data.idBilling">
							<div class="col-md-3 col-lg-3 col-xl-4">ID Billing</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.idBilling }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">No. Pelayanan</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.noPelayanan }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">No. SSPD</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.noDokumen }}</div>
						</div>		
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">Tanggal Jatuh Tempo Pembayaran</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.tglExpBilling }}</div>
						</div>
						<div class="row g-0 mb-3" v-if="data.alasanReject">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


