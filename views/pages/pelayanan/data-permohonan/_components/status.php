<?php 

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/permohonan/status.js?v=20221108a');
$this->registerJsFile('@web/js/services/pelayanan/status.js?v=20221108b');

?>
<div class="card mb-4">
	<div class="card-header">Data Pelayanan</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Catatan Penyerahan</div>
					<div class="col-md-6"><input v-model="data.catatanPenyerahan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Penerima</div>
					<div class="col-md-6"><input v-model="data.namaPenerima" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Surat Permohonan</div>
					<div class="col-md-6"><input v-model="data.noSuratPermohonan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Status Selesai</div>
					<div class="col-md-3 col-lg-10 col-xl-8">
						<div class="row g-0 mb-3">
							<div class="col-md-6"><input v-model="data.statusSelesai" class="form-control" value="2" disabled /></div>
							<div class="col-md-6"><input class="form-control" value="SELESAI" disabled /></div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">NIP Penyerah</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.nipPenyerah" class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp</div>
					<div class="col-md-6 col-lg-4 col-xl-4">&nbsp</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp</div>
					<div class="col-md-6 col-lg-4 col-xl-4">&nbsp</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp</div>
					<div class="col-md-6 col-lg-4 col-xl-4">&nbsp</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Seksi Berkas</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<div class="row g-0 mb-3">
						<div class="col-md-6"><input v-model="data.seksiBerkas" class="form-control" value="80" disabled /></div>
						<div class="col-md-6"><input class="form-control" value="PELATANAN SATU TEMPAT" disabled /></div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tanggal Penyerahan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><datepicker v-model="data.tanggalPenyerahan" format="DD/MM/YYYY" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


