<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/dto/objek-pajak-pbb/lspop-create.js?v=20230227a');
$this->registerJsFile('@web/js/services/spop/lspop-entryform.js?v=202301206a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Formulir</div>
	<div class="card-body">
		<div class="row g-0">
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1">NOP</div>
					<div class="col">
						<?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?>
						<span v-if="dataErr['provinsi_kode']" class="text-danger">{{dataErr['provinsi_kode']}}</span>
						<span v-else-if="dataErr['daerah_kode']" class="text-danger">{{dataErr['daerah_kode']}}</span>
						<span v-else-if="dataErr['kecamatan_kode']" class="text-danger">{{dataErr['kecamatan_kode']}}</span>
						<span v-else-if="dataErr['kelurahan_kode']" class="text-danger">{{dataErr['kelurahan_kode']}}</span>
						<span v-else-if="dataErr['noUrut']" class="text-danger">{{dataErr['noUrut']}}</span>
						<span v-else-if="dataErr['blok_kode']" class="text-danger">{{dataErr['blok_kode']}}</span>
						<span v-else-if="dataErr['jenisOp']" class="text-danger">{{dataErr['jenisOp']}}</span>
						<!-- <span v-if="dataErr['(embedded:NopDetailCreateRequiredDto).provinsi_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateRequiredDto).provinsi_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateRequiredDto).daerah_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateRequiredDto).daerah_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateRequiredDto).kecamatan_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateRequiredDto).kecamatan_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateRequiredDto).kelurahan_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateRequiredDto).kelurahan_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateRequiredDto).noUrut']" class="text-danger">{{dataErr['(embedded:NopDetailCreateRequiredDto).noUrut']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateRequiredDto).blok_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateRequiredDto).blok_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateRequiredDto).jenisOp']" class="text-danger">{{dataErr['(embedded:NopDetailCreateRequiredDto).jenisOp']}}</span> -->
					</div>
				</div>
			</div>
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1 pe-lg-2 text-lg-end">Nomor Formulir</div>
					<div class="col-md-6 col-xl-4 mb-2">
						<div class="row g-1">
							<div class="col-3">
								<input v-model="noFormulier[0]" class="form-control" type="number" maxlength="4" />
							</div>
							<div class="col-3">
								<input v-model="noFormulier[1]" v-model="" class="form-control" type="number" maxlength="4" />
							</div>
							<div class="col-2">
								<input v-model="noFormulier[2]" v-model="" class="form-control" type="number" maxlength="3" />
							</div>
						</div>
						<span v-if="dataErr['noFormulirSpop']" class="text-danger">{{dataErr['noFormulirSpop']}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">Rincian Data Bangunan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1">No. Bangunan</div>
					<div class="xc-md mb-2">
						<input v-model="data.noBangunan" class="form-control" />
						<span v-if="dataErr['noFormulirSpop']" class="text-danger">{{dataErr['noFormulirSpop']}}</span>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1">Jenis Bangunan</div>
					<div class="xc-md mb-2">
						<div>
							<vueselect v-model="data.jpb_kode"
								:options="jpbs"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
						<span v-if="dataErr['noFormulirSpop']" class="text-danger">{{dataErr['noFormulirSpop']}}</span>
					</div>
				</div>
				<div class="row g-1">
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-8 xc-lg-12 xc-xl-10 pt-1">Luas Bangunan</div>
							<div class="xc-md mb-2">
								<input v-model="data.luasBangunan" class="form-control" />
								<span v-if="dataErr['noFormulirSpop']" class="text-danger">{{dataErr['noFormulirSpop']}}</span>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-8 xc-lg-12 xc-xl-10 pt-1 pe-2 text-end">Jml Lantai</div>
							<div class="xc-md mb-2">
								<input v-model="data.jmlLantaiBng" class="form-control" />
								<span v-if="dataErr['noFormulirSpop']" class="text-danger">{{dataErr['noFormulirSpop']}}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-8 xc-lg-12 xc-xl-10 pt-1">Thn Dibangun</div>
							<div class="xc-md mb-2">
								<input v-model="data.tahunDibangun" class="form-control" />
								<span v-if="dataErr['noFormulirSpop']" class="text-danger">{{dataErr['noFormulirSpop']}}</span>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-8 xc-lg-12 xc-xl-10 pt-1 pe-2 text-end">Thn Renovasi</div>
							<div class="xc-md mb-2">
								<input v-model="data.tahunRenovasi" class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1">Kondisi Bangunan</div>
					<div class="xc-md mb-2">
						<div>
							<vueselect v-model="data.kondisi"
								:options="kondisis"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
						<span v-if="dataErr['noFormulirSpop']" class="text-danger">{{dataErr['noFormulirSpop']}}</span>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Konstruksi</div>
					<div class="xc-md mb-2">
						<div>
							<vueselect v-model="data.jenisKonstruksi"
								:options="jenisKonstruksis"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Atap</div>
					<div class="xc-md mb-2">
						<div>
							<vueselect v-model="data.jenisAtap"
								:options="jenisAtaps"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Dinding</div>
					<div class="xc-md mb-2">
						<div>
							<vueselect v-model="data.kodeDinding"
								:options="kodeDindings"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Lantai</div>
					<div class="xc-md mb-2">
						<div>
							<vueselect v-model="data.kodeLantai"
								:options="kodeLantais"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">Langit-langit</div>
					<div class="xc-md mb-2">
						<div>
							<vueselect v-model="data.kodeLangitLangit"
								:options="kodeLangitLangits"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">Fasilitas</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1">Daya Listrik</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input v-model="data.dayaListrik" class="form-control">
							<span class="input-group-text">watt</span>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1">Jumlah AC</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input v-model="data.jmlAcSplit" class="form-control">
							<span class="input-group-text">Split</span>
						</div>
					</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input v-model="data.jmlAcWindow" class="form-control">
							<span class="input-group-text">Window</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 pe-lg-2 text-lg-end">AC Sentral</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<select class="form-select">
							<option v-model="data.acCentral" :value="false">Tidk Ada</option>
							<option v-model="data.acCentral" :value="true">Ada</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1">Luas Kolam Renang</div>
					<div class="xc-md-7 xc-lg-6 xc-xl-5 mb-2">
						<div class="input-group">
							<input v-model="data.luasKolam" class="form-control">
							<span class="input-group-text">m²</span>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1">Finishing Kolam</div>
					<div class="xc-md xc-lg-12 xc-xl-11 mb-2">
						<div class="W-75">
							<vueselect v-model="data.finishingKolam"
								:options="finishingKolams"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 pe-2 text-lg-end">Luas Perkerasan</div>
					<div class="xc-md mb-2">
						<div class="row g-1">
							<div class="xc-md-10 xc-lg mb-2">
								<div class="input-group">
									<input v-model="data.luasHalamanKerasRingan" class="form-control">
									<span class="input-group-text w-50">Ringan</span>
								</div>
							</div>
							<div class="xc-md-10 xc-lg mb-2">
								<div class="input-group">
									<input v-model="data.luasHalamanKerasSedang" class="form-control">
									<span class="input-group-text w-50">Sedang</span>
								</div>
							</div>
						</div>
						<div class="row g-1">
							<div class="xc-md-10 xc-lg mb-2">
								<div class="input-group">
									<input v-model="data.luasHalamanKerasBerat" class="form-control">
									<span class="input-group-text w-50">Berat</span>
								</div>
							</div>
							<div class="xc-md-10 xc-lg mb-2">
								<div class="input-group">
									<input v-model="data.luasHalamanKerasPenutup" class="form-control">
									<span class="input-group-text w-50">Penutup Lantai</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-4 xc-lg-6 xc-xl-5 pt-1 border-right">Jml Lapangan Tenis</div>
					<div class="xc-md mb-2 pe-3">
						<table class="table fit-form-control">
							<thead>
								<tr>
									<td class="text-center p-1" style="width:40%; background-color:#e9ecef">Jenis</td>
									<td class="text-center p-1" style="width:30%; background-color:#e9ecef">+Lampu</td>
									<td class="text-center p-1x" style="width:30%; background-color:#e9ecef">-Lampu</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Beton</td>
									<td><input v-model="data.jmlLapTenisBetonLamp" class="form-control"></td>
									<td><input v-model="data.jmlLapTenisBetonNonLamp" class="form-control"></td>
								</tr>
								<tr>
									<td>Aspal</td>
									<td><input v-model="data.jmlLapTenisAspalLamp" class="form-control"></td>
									<td><input v-model="data.jmlLapTenisAspalNonLamp" class="form-control"></td>
								</tr>
								<tr>
									<td>Tanah Liat / Rumput</td>
									<td><input v-model="data.jmlLapTenisTanahLamp" class="form-control"></td>
									<td><input v-model="data.jmlLapTenisTanahNonLamp" class="form-control"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col">
						<div class="row g-1">
							<div class="xc-md-8 xc-lg-12 xc-xl-10 pe-2 text-lg-end">
								Elevator<br />
								(Lift)
							</div>
							<div class="xc">
								<div class="input-group">
									<input v-model="data.jmlElevatorPenumpang" class="form-control">
									<span class="input-group-text w-50">Penumpang</span>
								</div>
								<div class="input-group">
									<input v-model="data.jmlElevatorKapsul" class="form-control">
									<span class="input-group-text w-50">Kapsul</span>
								</div>
								<div class="input-group">
									<input v-model="data.jmlElevatorBrg" class="form-control">
									<span class="input-group-text w-50">Barang</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
					<div class="row g-1">
							<div class="xc-md-8 xc-xl-8 pe-2 text-md-end">
								Eskalator<br />
								(Tangga Berjalan)
							</div>
							<div class="xc">
								<div class="input-group">
									<input v-model="data.jmlEskalatorKecil" class="form-control">
									<span class="input-group-text w-50">lbr<=0,0m</span>
								</div>
								<div class="input-group">
									<input v-model="data.jmlEskalatorBesar" class="form-control">
									<span class="input-group-text w-50">lbr>0,8m</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-5 pt-1">Panjang Pagar</div>
					<div class="xc-md-7 xc-xl-6 xc-xxl-5 mb-2">
						<div class="input-group">
							<input v-model="data.panjangPagar" class="form-control">
							<span class="input-group-text w-50">m</span>
						</div>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-5 pt-1">Bahan</div>
					<div class="xc-md mb-2">
						<div class="w-75">
							<vueselect v-model="data.bahanPagar"
								:options="bahanPagars"
								:reduce="item => item.kode"
								label="nama"
								code="kode"
							/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-5 pt-1 pe-lg-2 text-md-end">Pemadam Kebakaran</div>
					<div class="xc-md mb-2">
						<div class="form-check">
							<input v-model="data.statusHydrant" class="form-check-input" type="checkbox" id="hydrant" />
							<label class="form-check-label" for="hydrant">Tidak ada hyrant</label>
						</div>
						<div class="form-check">
							<input v-model="data.statusSprinkler" class="form-check-input" type="checkbox" id="sprinkler" />
							<label class="form-check-label" for="sprinkler">Tidak ada sprinkler</label>
						</div>
						<div class="form-check">
							<input v-model="data.statusFireAlarm" class="form-check-input" type="checkbox" id="fireAlarm" />
							<label class="form-check-label" for="fireAlarm">Tidak ada fire alarm</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-5 pt-1">Jumlah PABX</div>
					<div class="xc-md-7 xc-xl-6 mb-2">
						<input v-model="data.jmlPabx" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-8 xc-xl-6 pt-1 pe-lg-2 text-md-end">Kedalaman Sumur Artesis</div>
					<div class="xc-md xc-xl-6 mb-2">
						<div class="input-group">
							<input v-model="data.kedalamanSumurArtesis" class="form-control">
							<span class="input-group-text w-50">m</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<h6>Fasilitas Tambahan</h6>

	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">Identitas Pendata / Pejabat Berwenang</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-4 col-xl-4">
				<div class="row g-1">
					<div class="xc-md-6 xc-lg-10 xc-xl-6 pt-1">Tgl Kunjungan Kembali</div>
					<div class="xc-md mb-2">
						<div>
							<datepicker v-model="tanggalPerekaman" format="DD/MM/YYYY" />
						</div>
						<span v-if="dataErr['tanggalPerekaman']" class="text-danger">{{dataErr['tanggalPerekaman']}}</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xl-4">
				<div class="row g-1">
					<div class="xc-md-6 c-lg-10 xc-xl-6 pt-1">Tgl Pendataan</div>
					<div class="xc-md mb-2">
						<div>
							<datepicker v-model="tanggalPendataan" format="DD/MM/YYYY" />
						</div>
						<span v-if="dataErr['tanggalPendataan']" class="text-danger">{{dataErr['tanggalPendataan']}}</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xl-4">
				<div class="row g-1">
					<div class="xc-md-6 xc-lg-7 xc-xl-6 pt-1 text-lg-end">NIP Pendata</div>
					<div class="xc-md mb-2">
						<input v-model="data.pendata_pegawai_nip" class="form-control" />
						<span v-if="dataErr['pendata_pegawai_nip']" class="text-danger">{{dataErr['pendata_pegawai_nip']}}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="d-none d-lg-inline col-lg-4 col-xl-4">
				&nbsp;
			</div>
			<div class="col-lg-4 col-xl-4">
				<div class="row g-1">
					<div class="xc-md-6 xc-lg-10 xc-xl-6 pt-1">Tanggal Penelitian</div>
					<div class="xc-md mb-2">
						<div>
							<datepicker v-model="tanggalPemeriksaan" format="DD/MM/YYYY" />
						</div>
						<span v-if="dataErr['tanggalPemeriksaan']" class="text-danger">{{dataErr['tanggalPemeriksaan']}}</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xl-4">
				<div class="row g-1">
					<div class="xc-md-6 xc-lg-8 xc-xl-6 pt-1 text-lg-end">NIP Peneliti</div>
					<div class="xc-md mb-2">
						<input v-model="data.pemeriksa_pegawai_nip" class="form-control" />
						<span v-if="dataErr['pemeriksa_pegawai_nip']" class="text-danger">{{dataErr['pemeriksa_pegawai_nip']}}</span>
					</div>
				</div>
			</div>
			<div class="d-none d-lg-inline-block col-lg">
			</div>
		</div>
	</div>
</div>
