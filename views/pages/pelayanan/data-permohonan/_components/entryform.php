<?php 

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/permohonan/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/pelayanan/entryform.js?v=20221108b');

include Yii::getAlias('@dataPath').'/penerimaanBerkas.php';
$pbBlockCount = ceil(count($penerimaanBerkasData) / 3);
$pbSplit = $pbBlockCount;

?>
<div class="card mb-4">
	<div class="card-header">Data Pelayanan</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Pelayanan</div>
					<div class="col-md-6"><input v-model="data.noPelayanan" class="form-control" disabled/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Status Kolektif</div>
					<div class="col-md-6">
						<select class="form-select" v-model="data.statusKolektif">
							<option v-for="item in statusKolektifs" :value="item.id">{{item.name}}</option>
						</select>
						<span class="text-danger" v-if="dataErr.statusKolektif">{{dataErr.statusKolektif}}</span>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Surat Permohonan</div>
					<div class="col-md-6"><input v-model="data.noSuratPermohonan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3" >
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Pelayanan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="data.jenisPelayanan" @change="jenisPelayananOnChange($event)" :disabled="id != null && id != ''">
							<option v-for="item in jenisPelayanans" :value="item.id">{{item.name}}</option>
						</select>
						<span class="text-danger" v-if="dataErr.jenisPelayanan">{{dataErr.jenisPelayanan}}</span>
					</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Penerimaan</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.tanggalTerima" format="DD/MM/YYYY" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Perkiraan Selesai</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.tanggalSelesai" format="DD/MM/YYYY" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Surat Permohonan</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.tanggalPermohonan" format="DD/MM/YYYY" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4">
	<div class="card-header">Data Wajib Objek Pajak</div>
	<div class="card-body">
		<div class="row" :disabled="!nopdata">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">NOP</div>
					<div class="col-md-6"><input v-model="data.nop" class="form-control" @change="checkNOP($event, data.jenisPelayanan)" :disabled="!nopdata"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Wajib Pajak</div>
					<div class="col-md-6"><input v-model="data.namaWP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Letak Objek Pajak</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.letakOP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Keterangan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.keterangan" class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tahun Pajak</div>
					<div class="col-md-6 col-lg-2 col-xl-1"><input v-model="data.tahunPajak" class="form-control" /></div>
					<span class="text-danger" v-if="dataErr.tahunPajak">{{dataErr.tahunPajak}}</span>
				</div>
				<div id="vp" name="vp" v-if="pengurangan">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Pengurangan</div>
						<div class="col-md-6 col-lg-6 col-xl-6">
							<select class="form-select" v-model="data.jenisPengurangan">
								<option v-for="item in jenisPengurangans" :value="item.id">{{item.name}}</option>
							</select>
						</div>
						<span class="text-danger" v-if="dataErr.jenisPengurangan">{{dataErr.jenisPengurangan}}</span>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Persentase Pengurangan</div>
						<div class="col-md-6"><input v-model="data.persentasePengurangan" class="form-control" /></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4">
	<div class="card-header">Penerimaan Berkas</div>
	<div class="card-body">
		<div>
			<div class="row">
				<div class="col-lg">
					<?php foreach($penerimaanBerkasData as $key => $item) { ?>
					<?php
					if($key == $pbSplit) {
						echo '</div><div class="col-lg">';
						$pbSplit += $pbBlockCount;
					}
					?>
					<div class="form-check">
						<input v-model="data.penerimaanBerkasTemp" class="form-check-input" type="checkbox" value="<?= $key ?>" id="check<?= $key ?>">
						<label class="form-check-label" for="check<?= $key ?>">
							<?= ($key + 1).'. '.$item ?>
						</label>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row">&nbsp</br></div>
		<div class="row">
			<div class="col-md-2 ">Catatan</div>
			<div class="col-md-10 "><input v-model="data.catatan" class="form-control" /></div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


