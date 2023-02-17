<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/penetapan/cetak-massal/massal.js?v=20221108a');
$this->registerJsFile('@web/js/services/penetapan/cetak-massal/entry.js?v=20221108b');

?>

<div v-if="data.isLoading == true">
	<!-- <div> -->
	<div class="overlay"></div>
	<div class="spanner show">
		<div class="loader"></div>
		<p>Sedang diproses...</p>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header fw-600">
		Jenis Proses
	</div>
	<div class="card-body">
		<div class="row ">
			<div class="col-6">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="form" v-model="data.formType">
					<label class="form-check-label" for="flexRadioDefault1">
						Penetapan Massal
					</label>
				</div>
			</div>
			<div class="col-6">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="report" v-model="data.formType">
					<label class="form-check-label" for="flexRadioDefault2">
						Cetak Massal
					</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Data 2
	</div> -->
	<div class="card-body">
		<?php
		$noRtRw = true;
		$showTahun = true;
		// include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock.php');
		?>

		<div class="">
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Provinsi</div>
				<div class="col-2 col-md-1"><input class="form-control" v-model="data.provinsiID" @input="propinsiChanged($event)" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" v-model="data.namaPropinsi" disabled /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Dati II</div>
				<div class="col-2 col-md-1"><input class="form-control" v-model="data.kotaID" @input="kotaChanged($event)" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" v-model="data.namaKota" disabled /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Kecamatan</div>
				<div class="col-2 col-md-1"><input class="form-control" v-model="data.kecamatanID" @input="kecamatanChanged($event)" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" v-model="data.namaKecamatan" disabled /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Kelurahan</div>
				<div class="col-2 col-md-1"><input class="form-control" v-model="data.kelurahanID" @input="kelurahanChanged($event)" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" v-model="data.namaKelurahan" disabled /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1 mb-1">Tahun Pajak</div>
				<div class="col-md-3 col-lg-2 col-xl-1 mb-2"><input class="form-control" v-model="data.tahunPajak" /></div>
			</div>

			<div v-if="(data.formType === 'report')">
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-xl-1 pt-1 mb-1">Buku</div>
					<div class="col-md-8 mb-2">
						<!-- <vueselect v-model="data.buku_id" :options="bukuOpts" :reduce="item => item.id" label="name" code="id" /> -->
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

		<div class="p-3">
			<table style="font-size:9pt" align="center">
				<thead>
					<tr>
						<th class="text-center"> </th>
						<th class="text-center">Buku 1</th>
						<th class="text-center">Buku 2</th>
						<th class="text-center">Buku 3</th>
						<th class="text-center">Buku 4</th>
						<th class="text-center">Buku 5</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<tr>
						<td>Tgl Jatuh Tempo </td>
						<td>
							<datepicker v-model="data.tglJatuhTempo1" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglJatuhTempo2" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglJatuhTempo3" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglJatuhTempo4" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglJatuhTempo5" format="DD/MM/YYYY" />
						</td>
					</tr>
					<tr>
						<td>Tgl Terbit </td>
						<td>
							<datepicker v-model="data.tglTerbit1" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglTerbit2" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglTerbit3" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglTerbit4" format="DD/MM/YYYY" />
						</td>
						<td>
							<datepicker v-model="data.tglTerbit5" format="DD/MM/YYYY" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>

<!-- <div class="card mb-4">
	<div class="card-header fw-600">
		Jenis Cetakan
	</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="col-4 col-md-3 col-xl-2"> </div>
			<div class="xc-md-6 xc-lg-4 xc-xl-3"> </div>
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

		<div class="row g-1">
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">Jumlah OP :</div>
					<div class="col-7"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">OP ke :</div>
					<div class="col-7"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">NOP</div>
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-2"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<hr />
<div class="d-flex justify-content-center">
	<button @click="submitData(data)" class="btn bg-blue ms-2">
		<i class="bi bi-check-lg"></i> Proses
	</button>
</div>