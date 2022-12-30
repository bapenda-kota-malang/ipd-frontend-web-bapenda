<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/kunjungan/create.js?v=20221208a');
$this->registerJsFile('@web/js/services/kunjungan/entryform.js?v=20221208b');

?>
<div class="card mb-3">
	<div class="card-header h6 mb-0">
		Data Kunjungan
	</div>
	<div class="p-3">
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Jenis ID</div>
					<div class="col-sm-8 col-md-10 col-lg-8 pt-1">
						<div class="row">
							<div class="col-4 col-md-3 col-lg-4">
								<div class="form-check">
									<input v-model="typeNoNPWPD" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" @Change="typeOnChange" checked />
									<label class="form-check-label" for="flexRadioDefault1">
										NPWPD
									</label>
								</div>
							</div>
							<div class="col mb-1">
								<div class="form-check">
									<input v-model="typeNoNOP" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" @Change="typeOnChange" />
									<label class="form-check-label" for="flexRadioDefault2">
										NOP
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Nomor Id</div>
					<div class="col-sm-5 col-md-4 col-lg-6 mb-3"><input v-model="data.noKunjungan" type="text" class="form-control" @Change="getData" /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Jenis Pajak</div>
					<div class="col-sm-5 col-md-4 col-lg-8 pe-lg-5"><input v-model="data.jenisOP" type="text" class="form-control" disabled /></div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Nama OP</div>
					<div class="col-sm-5 col-md-4 col-lg mb-2"><input type="text" v-model="data.namaOP" class="form-control" disabled /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Nama WP</div>
					<div class="col-sm-5 col-md-4 col-lg-8 pe-lg-5 mb-2"><input v-model="data.namaWP" type="text" class="form-control" disabled /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-9">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-2 pt-1">Alamat WP</div>
					<div class="col-sm-5 col-md-4 col-lg-8 pe-lg-5 mb-2"><input v-model="data.alamatWP" type="text" class="form-control" disabled /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-9">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-2 pt-1">Agenda</div>
					<div class="col-sm-5 col-md-4 col-lg-8 pe-lg-5 mb-2">
						<textarea v-model="data.agenda" class="form-control" rows="3"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Tgl Kunjungan</div>
					<div class="col-sm-5 col-md-4 col-lg-4 mb-2"><datepicker v-model="data.tanggalKunjungan" format="DD/MM/YYYY" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header h6 mb-0">
		Data Kunjungan
	</div>
	<div class="p-3">
		<table class="table">
			<thead>
				<tr>
					<th style="width:50px">
						<div class="form-check">
							<input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
						</div>
					</th>
					<th>NIP</th>
					<th>Nama Petugas</th>
					<th>Jabatan</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in data.pegawais">
					<td>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
						</div>
					</td>
					<td><input v-model="item.nip" type="text" class="form-control" /></td>
					<td><input v-model="item.nama" type="text" class="form-control" /></td>
					<td>
						<select v-model="item.jabatan" class="form-select" aria-label="Default select example">
							<option v-for="(pangkat, index) in pangkats" :value="index">{{pangkat}}</option>
						</select>
						<span class="text-danger" v-if="itemErr.jabatan">{{itemErr.jabatan}}</span>
					</td>
					<td v-if="!item.nip">
						<button class="dropdown-item" type="button" @click="hapusData(index)">
							<i class="bi bi-trash me-1"></i>Hapus
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button class="btn bg-blue" @Click="newValue()">Tambah</button>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />