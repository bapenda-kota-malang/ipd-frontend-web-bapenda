<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/penagihan/tunggakan.js?v=20221201a');
$this->registerJsFile('@web/js/services/penagihan/tunggakan.js?v=20221201b');

?>
<div class="card mb-4">
	<div class="card-header">Laporan Tunggakan Pembayaran PBB</div>
	<div class="card-body">
		<div class="row">
			<div>
				<div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Pilihan Laporan</div>
						<div class="col-md-6 col-lg-11 col-xl-10">
							<select class="form-select" v-model="data.pilihanLaporan">
								<option v-for="item in pilihanLaporans" :value="item.id">{{item.name}}</option>
							</select>
							<span class="text-danger" v-if="dataErr.pilihanLaporan">{{dataErr.pilihanLaporan}}</span>
						</div>
					</div>
				</div>
				<div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Propinsi</div>
						<div class="col-md-9 col-lg-11 col-xl-10">
							<div class="row g-0 mb-3">
								<div class="col-md-1"><input v-model="data.propinsi" class="form-control" @change="propinsiChanged($event)"/></div>
								<div class="col-md-11"><input v-model="data.namaPropinsi" class="form-control" disabled /></div>
							</div>
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Dati II</div>
						<div class="col-md-9 col-lg-11 col-xl-10">
							<div class="row g-0 mb-3">
								<div class="col-md-1"><input v-model="data.dati2" class="form-control" @change="dati2Changed($event)"/></div>
								<div class="col-md-11"><input  v-model="data.namaDati2" class="form-control" disabled /></div>
							</div>
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Kecamatan</div>
						<div class="col-md-9 col-lg-11 col-xl-10">
							<div class="row g-0 mb-3">
								<div class="col-md-1"><input v-model="data.kecamatan" class="form-control" @change="kecamatanChanged($event)"/></div>
								<div class="col-md-11"><input v-model="data.namaKecamatan" class="form-control" disabled /></div>
							</div>
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Kelurahan</div>
						<div class="col-md-9 col-lg-11 col-xl-10">
							<div class="row g-0 mb-3">
								<div class="col-md-1"><input v-model="data.kelurahan" class="form-control" @change="kelurahanChanged($event)"/></div>
								<div class="col-md-11"><input v-model="data.namaKelurahan" class="form-control" disabled /></div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Tahun Pajak Awal</div>
						<div class="col-md-6"><input v-model="data.tahunPajakAwal" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Tahun Pajak Akhir</div>
						<div class="col-md-6"><input v-model="data.tahunPajakAkhir" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Buku</div>
						<div class="col-md-9 col-lg-11 col-xl-10">
							<select class="form-select" v-model="data.buku">
								<option v-for="item in buku2s" :value="item.id">{{item.name}}</option>
							</select>
							<span class="text-danger" v-if="dataErr.buku">{{dataErr.buku}}</span>
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Ketetapan PBB Awal</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.ketetapanPbbAwal" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Ketetapan PBB Akhir</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.ketetapanPbbAkhir" class="form-control" /></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


