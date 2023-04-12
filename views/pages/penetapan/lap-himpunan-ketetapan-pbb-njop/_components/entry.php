<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/penetapan/cetak-massal/massal.js?v=20221108a');
$this->registerJsFile('@web/js/services/penetapan/cetak-massal/entry.js?v=20221108b');

$noRtRw = true;
$showTahun = true;
// include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock.php');
?>
<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="p-3">
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-xl-1 pt-1">Provinsi</div>
					<div class="col-2 col-md-1">
						<vueselect v-model="item.daerah_id"
							:options="daerahs"
							:reduce="thisTtem => thisTtem.id"
							label="nama"
							code="id"
							:clearable="false"
							@option:selected="refreshSelect(item.daerah_id, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', pemilikLists[idx].kelurahans, 'kode')"
						/>
					</div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-xl-1 pt-1">Dati II</div>
					<div class="col-2 col-md-1">
						
					</div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-xl-1 pt-1">Kecamatan</div>
					<div class="col-2 col-md-1">
						
					</div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-xl-1 pt-1">Kelurahan</div>
					<div class="col-2 col-md-1">
						
					</div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-xl-1 pt-1 mb-1">Tahun</div>
					<div class="col-md-3 col-lg-2 col-xl-1 mb-2"><input class="form-control" /></div>
				</div>
			</div>
		</div>
		</div>
	<div class="col-lg-6">
		<div class="card mb-4">
			<div class="card-body">
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						1. Himpunan Ketetapan PBB Sektor Pedesaan
					</label>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						2. Himpunan Ketetapan PBB Sektor Perkotaan
					</label>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						3. Himpunan Ketetapan PBB Sektor Pedesaan dan Perkotaan
					</label>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						4. Himpunan Ketetapan PBB per Golongan Buku Ketetapan per Kecamatan
					</label>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						5. Himpunan NJOP per Kelurahan
					</label>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						6. Himpunan Nama Wajib Pajak per Kelurahan
					</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Jenis Cetakan
	</div> -->
	<div class="card-body">
		<div class="row g-1">
			<div class="col-4">
				<div class="row g-1">
					<div class="col-2 text-left mt-2">Buku :</div>
					<div class="col-5 mb-2">
						<div class="row g-0 g-md-1">
							<div class="col-lg pt-1 mb-1">
								<?php
								$buku = ['Buku 1', 'Buku 2', 'Buku 3', 'Buku 4', 'Buku 5'];
								foreach ($buku as $key => $item) {
								?>
									<div class="form-check">
										<input v-model="data.bukuIds" class="form-check-input" type="checkbox" value="<?= $item ?>" id="check<?= $key ?>">
										<label class="form-check-label" for="check<?= $key ?>">
											<?= $item ?>
										</label>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />