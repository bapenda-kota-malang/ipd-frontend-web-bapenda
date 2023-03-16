<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/penetapan/penilaian/massal.js?v=20221108a');
$this->registerJsFile('@web/js/services/penetapan/penilaian/massal/entry.js?v=20221108b');

?>

<div v-if="data.isLoading == true">
	<!-- <div> -->
	<div class="overlay"></div>
	<div class="spanner show">
		<div class="loader"></div>
		<p>Sedang diproses...</p>
	</div>
</div>


<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-2 pt-1">Tahun</div>
					<div class="col-3 col-md-3 col-lg-2 col-xxl-1"><input class="form-control" v-model="data.tahunPajak" /></div>
					<div class="col mb-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-3 col-xl-2 pt-1">Provinsi</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" v-model="data.provinsiID" @input="propinsiChanged($event)" /></div>
					<div class="col col-md mb-2"><input class="form-control" v-model="data.namaPropinsi" disabled /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-3 col-xl-2 pt-1">Dati II</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" v-model="data.kotaID" @input="kotaChanged($event)" /></div>
					<div class="col col-md mb-2"><input class="form-control" v-model="data.namaKota" disabled /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-3 col-xl-2 pt-1">Kecamatan</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" v-model="data.kecamatanID" @input="kecamatanChanged($event)" /></div>
					<div class="col col-md mb-2"><input class="form-control" v-model="data.namaKecamatan" disabled /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-3 col-xl-2 pt-1">Kelurahan</div>
					<div class="col-2 col-md-1 col-lg-2 col-xl-1"><input class="form-control" v-model="data.kelurahanID" @input="kelurahanChanged($event)" /></div>
					<div class="col col-md mb-2"><input class="form-control" v-model="data.namaKelurahan" disabled /></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">Data</div>
			<div class="p-3">
				<!-- <div class="row">
					<div class="col-5 col-xl-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
							<label class="form-check-label" for="flexCheckChecked">
								Penilaian masal
							</label>
						</div>
					</div>
					<div class="col-6">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
							<label class="form-check-label" for="flexCheckChecked">
								Penetapan NJOPTKP Masal
							</label>
						</div>
					</div>
				</div>
				<hr>
				<div class="row g-1">
					<div class="col-7">
						<div class="p-1 bg-grey-300 text-center">
							<div class="row g-1">
								<div class="col">Jumlah Record</div>
								<div class="col">Record Ke</div>
							</div>
						</div>
					</div>
					<div class="col-5">
						<div class="p-1 bg-grey-300 text-center">
							Nilai Baru
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="col-7">
						<div class="row g-1">
							<div class="col"><input type="text" class="form-control" v-model="data.jmlRecord"></div>
							<div class="col"><input type="text" class="form-control" v-model="data.recordKe"></div>
						</div>
					</div>
					<div class="col-5">
						<div class="row g-1">
							<div class="col-4"><input type="text" class="form-control"></div>
							<div class="col-6"><input type="text" class="form-control"></div>
							<div class="col-2"><input type="text" class="form-control"></div>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="col-7">
						<div class="row g-1">
							<div class="col"><input type="text" class="form-control"></div>
							<div class="col"><input type="text" class="form-control"></div>
						</div>
					</div>
					<div class="col-5">
						<input type="text" class="form-control">
					</div>
				</div> -->
				<div class="row g-1">
					<div class="col">
						<div class="p-1 bg-grey-300 text-center">
							<div class="row g-1">
								<div class="col">Jumlah Record</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="col">
						<div class="row g-1">
							<div class="col"><input type="text" class="form-control text-center" v-model="data.jmlRecord" disabled></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<hr />
<div class="d-flex justify-content-center">
	<button @click="submitData(data)" class="btn bg-blue ms-2">
		<i class="bi bi-check-lg"></i> Simpan
	</button>
</div>