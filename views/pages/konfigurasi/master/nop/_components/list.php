<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/nop/nop.js?v=20230405a');
$this->registerJsFile('@web/js/helper/nop.js?v=20230405a');
$this->registerJsFile('@web/js/services/nop/nop.js?v=20230405a');

?>
<table class="table">
	<thead>
		<tr>
			<th style="width:50px"></th>
			<th style="width:150px">NOP</th>
			<th>Letak</th>
			<th>No Sertifikat</th>
			<th>Tahun Pajak SPPT</th>
			<th style="width:100px"></th>
		</tr>
	</thead>
	<tbody>
		<tr v-if="entryData.length==0">
			<td colspan="7" class="p-4 text-center">Tidak ada data</td>
		</tr>
		<tr v-else v-for="(item, idx) in data" >
			<td></td>
			<td>{{`${item.provinsi_kode}${item.daerah_kode}${item.kecamatan_kode}${item.kelurahan_kode}${item.kodeBlok}${item.noUrut}${item.kodeJenisOp}`}}</td>
			<td>{{item.lokasiOp}}</td>
			<td>{{item.noSertifikat}}</td>
			<td>{{item.tahunPajakSppt}}</td>
			<td class="text-end">
				<div class="btn-group">
					<button class="btn btn-outline-primary border-slate-300 dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots-vertical"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end" style="width:150px">
						<li><button @click="showEntry(idx)" class="dropdown-item"><i class="bi bi-pencil me-1"></i> Edit</button></li>
						<li><button @click="showDel(idx)" class="dropdown-item"><i class="bi bi-x-lg me-1"></i> Hapus</button></li>
					</ul>
				</div> 
			</td>
		</tr>
	</tbody>
</table>

<div id="entryFormModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>{{entryFormTitle}}</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="card mb-4">
					<div class="card-header">Data OP</div>
					<div class="card-body">
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">NOP</div>
							<div class="xc-md mb-2">
								<?php
								$nopName = 'entryData';
								include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
								?>
							</div>
						</div>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">Letak Tanah dan/atau Bangunan</div>
							<div class="xc-md mb-2"><input v-model="entryData.lokasiOp" class="form-control"></div>
						</div>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">Provinsi</div>
							<div class="xc-md mb-2">
								<vueselect v-model="provinsi_kode"
									:options="provinsiList"
									:reduce="item => item.kode"
									label="nama"
									code="kode"
									@option:selected="refreshSelect(provinsi_kode, provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', daerahList, 'kode', 'kode'); nopProvChange(provinsi_kode);"
								/>
							</div>
						</div>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">Kota/Kabupaten</div>
							<div class="xc-md mb-2">
								<vueselect v-model="daerah_kode"
									:options="daerahList"
									:reduce="item => item.kode"
									label="nama"
									code="kode"
									@option:selected="refreshSelect(daerah_kode, daerahList, '/kecamatan?daerah_kode={kode}&no_pagination=true', kecamatanList, 'kode', 'kode'); nopDaerahChange(daerah_kode)"
								/>
							</div>
						</div>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">Kecamatan</div>
							<div class="xc-md mb-2">
								<vueselect v-model="kecamatan_kode"
									:options="kecamatanList"
									:reduce="item => item.kode"
									label="nama"
									code="kode"
									@option:selected="refreshSelect(kecamatan_kode, kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahanList, 'kode', 'kode'); nopKecamatanChange(kecamatan_kode);"
								/>
							</div>
						</div>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">Kelurahan</div>
							<div class="xc-md mb-2">
								<vueselect v-model="kelurahan_kode"
									:options="kelurahanList"
									:reduce="item => item.kode"
									label="nama"
									code="kode"
									@option:selected="nopKelurahanChange(kelurahan_kode)"
								/>
							</div>
						</div>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">RT/RW</div>
							<div class="xc-md-5 xc-lg-4 mb-2"><input v-model="entryData.opRtRw" maxlength="5" class="form-control"></div>
						</div>
					</div>
				</div>
				<div class="card mb-4">
					<div class="card-header">Perhitungan NJOP PBB</div>
					<div class="card-body py-1">
						<table class="table fit-form-control">
							<thead>
								<tr>
									<th class="text-center" style="width:20%;">Uraian</th>
									<th class="text-center" style="width:28%;">Luas<br />(Diisi luas tanah dan atau bangunan yang haknya diperoleh)</th>
									<th class="text-center" style="width:28%;">NJOP PBB/m2<br />(Diisi Berdasarkan SPPT PBB thaun terjaadiny perolehan hak/tahun)</th>
									<th class="text-center" style="">Luas x NJOP PBB/m2</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="pt-1">Tanah (Bumi)</td>
									<td class="px-2">
										<div class="input-group">
											<input v-model="entryData.luasTanahOp" class="form-control" >
											<span class="input-group-text" id="basic-addon2">m²</span>
										</div>
									</td>
									<td class="px-2">
										<div class="input-group">
											<span class="input-group-text" id="basic-addon2">Rp</span>
											<input v-model="entryData.njopTanahOp" class="form-control" >
										</div>
									</td>
									<td>
										<div class="input-group">
											<span class="input-group-text" id="basic-addon2">Rp</span>
											<input v-model="njopTanah" class="form-control" readonly >
										</div>
									</td>
								</tr>
								<tr>
									<td class="pt-1">Bangunan</td>
									<td class="px-2">
										<div class="input-group">
											<input v-model="entryData.luasBangunanOp" class="form-control" >
											<span class="input-group-text" id="basic-addon2">m²</span>
										</div>
									</td>
									<td class="px-2">
										<div class="input-group">
											<span class="input-group-text" id="basic-addon2">Rp</span>
											<input v-model="entryData.njopBangunanOp" class="form-control" >
										</div>
									</td>
									<td>
										<div class="input-group">
											<span class="input-group-text" id="basic-addon2">Rp</span>
											<input v-model="njopBangunan" class="form-control" readonly >
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="3" class="pt-1">Total</td>
									<td>
										<div class="input-group">
											<span class="input-group-text" id="basic-addon2">Rp</span>
											<input v-model="njopTotalCalculate" class="form-control" readonly >
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">Nomor Sertifikat</div>
							<div class="xc-md-5 xc-lg-4 mb-2"><input v-model="entryData.noSertifikat" class="form-control"></div>
						</div>
						<div class="row">
							<div class="xc-md-5 xc-lg-4 pt-1">Tahun Pajk SPPT</div>
							<div class="xc-md-5 xc-lg-4 mb-2"><input v-model="entryData.tahunPajakSppt" maxlength="4" class="form-control"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button @click="submitEntry" class="btn bg-blue"><i class="bi bi-check-lg"></i> Simpan</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>

<div id="confirmDelModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Konfirmasi Hapus Data</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-1">Proses akan menghapus data dengan informasi sebagai berikut:</div>
				<div class="row">
					<div class="col-md-3 ps-4">NOP</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{`${entryData.provinsi_kode}${entryData.daerah_kode}${entryData.kecamatan_kode}${entryData.kelurahan_kode}${entryData.kodeBlok}${entryData.noUrut}${entryData.kodeJenisOp}`}}</div>
				</div>
				<div class="row">
					<div class="col-md-3 ps-4">Lokasi</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.lokasiOp}}</div>
				</div>
				<div class="row">
					<div class="col-md-3 ps-4">No Sertifikat</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.noSertifikat}}</div>
				</div>
				<div class="row">
					<div class="col-md-3 ps-4">Tahjun Pajak</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.tahunPajakSppt}}</div>
				</div>
				<div class="mt-4">Lanjutkan Proses?</div>
			</div>
			<div class="modal-footer">
				<button @click="submitDel" class="btn bg-danger"><i class="bi bi-check-lg"></i> Iya, Hapus Data</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>
