<?php 

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/bphtb/pembayaran.js?v=20230306a');
$this->registerJsFile('@web/js/services/bphtb/pembayaran.js?v=20230306b');

?>
<div class="card mb-4">
	<div class="card-header">Pembayaran BPHTB</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No SSPD</div>
					<div class="col-md-6"><input v-model="this.sptpd_id" class="form-control" @Change="getDataSptpd(this)"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">NOP</div>
					<div class="col-md-6"><input v-model="this.dataSptpd.nop" class="form-control" disabled/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama</div>
					<div class="col-md-6"><input v-model="this.dataSptpd.namaWp" class="form-control" disabled/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alamat</div>
					<div class="col-md-6"><input v-model="this.dataSptpd.opAlamat" class="form-control" disabled/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nominal</div>
							<div class="col-md-6"><input v-model="this.dataSptpd.jumlahSetor" class="form-control" disabled/></div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Jatuh Tempo</div>
							<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="this.dataSptpd.tglExpBilling" format="DD/MM/YYYY" disabled/></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row g-0 mb-3">
		<hr class="gray_line mt10 mb10"/>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tempat Pembayaran</div>
					<div class="col-md-6 col-lg-6 col-xl-6">
						<select class="form-select" v-model="data.paymentPoint_id">
							<option v-for="item in this.PaymentPoints" :value="item.id_pp">{{item.nama}}</option>
						</select>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Perekam</div>
					<div class="col-md-6"><input v-model="this.user_name" class="form-control" disabled/></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Bayar</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.tglBayar" format="DD/MM/YYYY" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Rekam</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.createdAt" format="DD/MM/YYYY" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kode Validasi Bank</div>
					<div class="col-md-6"><input v-model="data.kodeValidasiBank" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div>&nbsp;&nbsp;&nbsp;</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


