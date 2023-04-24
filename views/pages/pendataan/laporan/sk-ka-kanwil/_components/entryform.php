<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/sk-ka-kanwil/create.js?v=20221208a');
$this->registerJsFile('@web/js/services/sk-ka-kanwil/entryform.js?v=20221208b');

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
				<hr />
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 col-xxl-2 pt-1">Thn Pajak</div>
					<div class="col-md-3 col-lg-4 col-xl-3 mb-2"><input v-model="data.tahun" class="form-control" /></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 col-xxl-2 pt-1">No. Keputusan</div>
					<div class="col-md-3 col-lg-5 col-xl-4 mb-2"><input v-model="data.nomor" class="form-control" /></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 col-xxl-2 pt-1">Tgl. Keputusan</div>
					<div class="col-md-3 col-lg-5 col-xl-4 mb-2"><datepicker v-model="data.tanggal" format="DD/MM/YYYY" /></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">
				Jenis Laporan
			</div>
			<div class="p-3">
				<div class="form-check mb-2" v-for="(item, index) in jenissk">
					<input v-model="data.typeLaporan" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="item.id">
					<label class="form-check-label" for="flexRadioDefault1">
						{{ item.name }}
					</label>
				</div>
			</div>
			<div style="height:118px;"></div>
		</div>
	</div>
</div>
