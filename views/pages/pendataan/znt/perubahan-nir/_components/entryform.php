<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/persiapan/nir/nir.js?v=20221208a');
$this->registerJsFile('@web/js/services/persiapan/nir/nir.js?v=20221208b');

?>

<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Propinsi</div>
					<div class="col-md-9 col-lg-11 col-xl-10">
						<div class="row g-0 mb-3">
							<div class="col-md-1"><input v-model="data.provinsi_kode" class="form-control" @input="propinsiChanged($event)"/></div>
							<div class="col-md-11"><input v-model="data.namaPropinsi" class="form-control" disabled /></div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Dati II</div>
					<div class="col-md-9 col-lg-11 col-xl-10">
						<div class="row g-0 mb-3">
							<div class="col-md-1"><input v-model="data.daerah_kode" class="form-control" @input="dati2Changed($event)"/></div>
							<div class="col-md-11"><input  v-model="data.namaKota" class="form-control" disabled /></div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Kecamatan</div>
					<div class="col-md-9 col-lg-11 col-xl-10">
						<div class="row g-0 mb-3">
							<div class="col-md-1"><input v-model="data.kecamatan_kode" class="form-control" @input="kecamatanChanged($event)"/></div>
							<div class="col-md-11"><input v-model="data.namaKecamatan" class="form-control" disabled /></div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Kelurahan</div>
					<div class="col-md-9 col-lg-11 col-xl-10">
						<div class="row g-0 mb-3">
							<div class="col-md-1"><input v-model="data.kelurahan_kode" class="form-control" @input="kelurahanChanged($event)"/></div>
							<div class="col-md-11"><input v-model="data.namaKelurahan" class="form-control" disabled /></div>
						</div>
					</div>
				</div>
				<div class="row g-md-2">
					<div class="col-md-6">
						<div class="row g-md-2">
							<div class="col-md-4 col-lg-6 col-xl-4 pt-1 mb-1">Tahun</div>
							<div class="col-md-6 col-lg-5 mb-2"><input class="form-control" /></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row g-md-2">
							<div class="col-md-4 col-lg-6 col-xl-5 pt-1 mb-1 text-md-end">No. Dokumen</div>
							<div class="col-md-6 col-lg mb-2"><input class="form-control" /></div>
						</div>
					</div>
				</div>
				<div class="d-none d-lg-block" style="height:20px"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">
				Data
			</div>
			<div class="p-3">
				<div class="row g-1">
					<div class="col-3 col-md-3 col-lg-6 col-xl-5">
						<div class="p-1 bg-grey-300 text-center">
							Kode ZNT
						</div>
					</div>
					<div class="col-3 col-md-5 col-lg-4 col-xl-3">
						<div class="p-1 bg-grey-300 text-center">
							NIR
						</div>
					</div>
				</div>
				<?php for($i=0;$i<6;$i++) { ?>
				<div class="row g-1">
					<div class="col-3 col-md-3 col-lg-6 col-xl-5">
						<input class="form-control" />
					</div>
					<div class="col-3 col-md-5 col-lg-4 col-xl-3">
						<input class="form-control" />
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="p-3">
		<div class="row g-md-2">
			<div class="col-md-6 col-lg-5 col-xl-4">
				<div class="row g-md-2">
					<div class="col-md-5 col-xl-4 pt-1 mb-1">Tgl. Pendataan</div>
					<div class="col-md-6 col-lg-5 mb-2"><datepicker v-model="data.tanggalPendataan" format="DD/MM/YYYY" /></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-5 col-xl-5">
				<div class="row g-md-2">
					<div class="col-md-6 col-xl-4 pt-1 mb-1 text-md-end">Tgl. Pemeriksaan</div>
					<div class="col-md-6 col-lg-5 col-xl-4 mb-2"><datepicker v-model="data.tanggalPemerikasaan" format="DD/MM/YYYY" /></div>
				</div>
			</div>
		</div>
		<div class="row g-md-2">
			<div class="col-md-6 col-lg-5 col-xl-4">
				<div class="row g-md-2">
					<div class="col-md-5 col-xl-4 pt-1 mb-1">NIP Pendata</div>
					<div class="col-md-6 col-lg-5 mb-2"><input class="form-control" /></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-5 col-xl-5">
				<div class="row g-md-2">
					<div class="col-md-6 col-xl-4 pt-1 mb-1 text-md-end">NIP Pemeriksa</div>
					<div class="col-md-6 col-lg-5 col-xl-4 mb-2"><input class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
