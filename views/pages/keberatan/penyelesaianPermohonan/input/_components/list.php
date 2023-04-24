<?php
use yii\web\View;
use app\assets\VueAppListAsset;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppListAsset::register($this);
VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/keberatan/entry-penyelesaian.js?v=20221108a');
?>

<div class="card mb-4">
  <div class="card-body">
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Nomor Pelayanan</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.nomorPelayanan1" type="text" class="form-control text-end me-2" style="width: 40px;" disabled>
				<input v-model="data.nomorPelayanan2" type="text" class="form-control text-end me-2" style="width: 40px;" disabled>
				<input v-model="data.nomorPelayanan3" type="text" class="form-control text-end me-2" style="width: 60px;">
				<input v-model="data.nomorPelayanan4" type="text" class="form-control text-end me-2" style="width: 60px;">
				<input v-model="data.nomorPelayanan5" type="text" class="form-control text-end me-2" style="width: 60px;">
			</div>
		</div>

		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Nomor SK Keberatan</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.nomorSK1" type="text" class="form-control me-2" style="width: 80px;">
				<input v-model="data.nomorSK2" type="text" class="form-control" style="width: 225px;">
			</div>
		</div>

		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Tanggal SK Keberatan</div>
			<div class="col-1 text-center">:</div>
			<div class="col-1">
				<datepicker v-model="data.tanggalSK" type="date" format="DD-MM-YYYY" />
			</div>
		</div>

		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">No. Laporan Hasil Penelitian</div>
			<div class="col-1 text-center">:</div>
			<div class="col-3">
				<input v-model="data.nomorLaporan" type="text" class="form-control">
			</div>
		</div>

		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Tanggal Laporan Hasil Penelitian</div>
			<div class="col-1 text-center">:</div>
			<div class="col-1">
				<datepicker v-model="data.tanggalLaporan" type="date" format="DD-MM-YYYY" />
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-body">
		<div class="row p-2 g-2">
			<div class="col-12 text-center mb-2" style="font-size: 15px; font-weight: 600">Daftar NOP yang mengajukan keberatan</div>
			<div class="col-12">
				<div class="row align-items-center g-2">
					<div class="col-4 font-weight-bold text-center" style="font-weight: 600;">NOP</div>
					<div class="col-8 text-center" style="font-weight: 600;">Jenis Keputusan</div>
				</div>
			</div>
			<div v-for="i in data.rowCounter" :key="i" class="col-12 mb-2">
				<div class="row align-items-center g-4">
					<div class="col-4">
						<div class="row justify-content-center align-items-center g-1">
							<div class="col-1">
								<input type="text" class="form-control" />
							</div>
							<div class="col-1">
								<input type="text" class="form-control" />
							</div>
							<div class="col-2">
								<input type="text" class="form-control" />
							</div>
							<div class="col-2">
								<input type="text" class="form-control" />
							</div>
							<div class="col-2">
								<input type="text" class="form-control" />
							</div>
							<div class="col-3">
								<input type="text" class="form-control" />
							</div>
							<div class="col-1">
								<input type="text" class="form-control" />
							</div>
						</div>
					</div>
					<div class="col-8">
						<div class="row justify-content-center align-items-center g-2">
							<div class="col-2">
								<input type="text" class="form-control" />
							</div>
							<div class="col-10">
								<input type="text" class="form-control" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>
<div class="row justify-content-center align-items-center g-1 mb-2">
	<div class="col-2">
		<button type="button" class="btn btn-outline-secondary w-100">Simpan</button>
	</div>
	<div class="col-2">
		<button type="button" class="btn btn-outline-secondary w-100">Batal</button>
	</div>
</div>