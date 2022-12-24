<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerJsFile('@web/js/dto/penagihan/tunggakanPbb.js?v=20221201a');
$this->registerJsFile('@web/js/services/penagihan/tunggakanPbb.js?v=20221201b');

?>
<div class="card mb-4">
	<div class="card-header">Laporan Tunggakan PBB</div>
	<div class="card-body">
		<div class="row">
			<div>
				<div>
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
							<div class="col-md-11"><input  v-model="data.namaDati2" class="form-control" disabled /></div>
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
				<div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Tahun Pajak Awal</div>
						<div class="col-md-9 col-lg-11 col-xl-10">
							<div class="row g-0 mb-3">
								<div class="col-md-2"><input v-model="data.tahunPajakAwal" class="form-control" /></div>
								<div class="col-md-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s/d </div>
								<div class="col-md-2"><input v-model="data.tahunPajakAkhir" class="form-control" /></div>
							</div>
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-1 col-xl-2 pt-1">Ketetapan</div>
						<div class="col-md-9 col-lg-11 col-xl-10">
							<div class="row g-0 mb-3">
								<div class="col-md-2"><input v-model="data.ketetapanPbbAwal" class="form-control" /></div>
								<div class="col-md-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s/d</div>
								<div class="col-md-2"><input v-model="data.ketetapanPbbAkhir" class="form-control" /></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


