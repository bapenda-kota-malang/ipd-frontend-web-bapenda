<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/_common/region.js?v=20221108a');
$this->registerJsFile('@web/js/services/penetapan/salinan-sppt-pbb/entry.js?v=20221108b');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-region-sppt.php'); ?>
<div class="card mb-4">
	<div class="card-body">
		<div class="p-3">
			<table class="w-100" style="font-size:9pt" align="center">
				<thead>
					<tr>
						<th class="text-center w-33">NOP</th>
						<th class="text-center w-33">NOP</th>
						<th class="text-center w-33">Jumlah</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<?php for ($i = 0; $i < 10; $i++) { ?>
						<tr class="w-100">
							<td class="col-md-4 mb-2">
								<div class="row justify-content-center align-items-center g-1">
									<div class="col-2"><input class="form-control" maxlength="5" /></div>
									<div class="col-2"><input class="form-control" maxlength="5" /></div>
									<div class="col-1"><input class="form-control" maxlength="2" /></div>
								</div>
							</td>
							<td class="col-md-4 mb-2">
								<div class="row justify-content-center align-items-center g-1">
									<div class="col-1"> S/D </div>
									<div class="col-2"><input class="form-control" maxlength="5" /></div>
									<div class="col-2"><input class="form-control" maxlength="5" /></div>
									<div class="col-1"><input class="form-control" maxlength="2" /></div>
								</div>
							</td>
							<td class="col-md-4">
								<div class="row justify-content-center align-items-center g-1">
									<div class="col-6"> 
										<input type="text" class="form-control mb-2" />
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="row">
			<div class="col">
				<div class="row g-0 g-md-1">
					<div class="col-1 pt-1 mb-1">Tgl Terbit</div>
					<div class="col-2 mb-2">
						<datepicker v-model="data.tanggalPengukuhan" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Jenis Cetakan
	</div>
	<div class="card-body">
		<div class="row justify-content-start align-items-center g-1">
			<div class="col-4 col-md-3 col-xl-2">Buku</div>
			<div class="xc-md-6 xc-lg-4 xc-xl-3">
				<div>
					<vueselect v-model="data.buku_id" :options="bukuOpts" :reduce="item => item.id" label="name" code="id" />
					<!-- <select class="form-select" v-model="data.buku">
						<option v-for="item in bukuOpts" :value="item.id">{{item.name}}</option>
					</select> -->
				</div>
			</div>
			<div class="col col-md-2 col-xxl-1">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						SPPT
					</label>
				</div>
			</div>
			<div class="col-12 col-md-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						STTS
					</label>
				</div>
			</div>
			<div class="col-12 col-md-3 col-lg-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						DHKP
					</label>
				</div>
			</div>
		</div>

		<div class="row g-1 mt-4">
			<div class="col-4 col-md-3 col-xl-2"> </div>
			<div class="xc-md-6 xc-lg-4 xc-xl-3"></div>
			<div class="col col-md-2 col-xxl-1">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						SPPT/STTS Tunggal
					</label>
				</div>
			</div>
			<div class="col-12 col-md-2 col-xxl-1 offset-4 offset-md-0">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						SPPT/STTS Ganda
					</label>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />