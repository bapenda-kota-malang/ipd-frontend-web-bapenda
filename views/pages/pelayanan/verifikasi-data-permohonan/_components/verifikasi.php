<?php 

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/permohonan/verifikasi.js?v=20230108a');
$this->registerJsFile('@web/js/services/pelayanan/verifikasi.js?v=20230108b');

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
						<select class="form-select" v-model="data.statusKolektif" disabled>
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
						<select class="form-select" v-model="data.bundlePelayanan" disabled>
							<option v-for="item in jenisPelayanans" :value="item.id">{{item.name}}</option>
						</select>
						<span class="text-danger" v-if="dataErr.jenisPelayanan">{{dataErr.jenisPelayanan}}</span>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Pemohon ??</div>
					<div class="col-md-6"><input v-model="data.namaWP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alamat Pemohon ??</div>
					<div class="col-md-6"><input v-model="data.letakOP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nop</div>
					<div class="col-md-1"><input v-model="data.NopProvinsi" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.NopDaerah" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.NopKecamatan" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.NopKelurahan" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.NopBlok" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.NopNoUrut" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.NopJenisOP" class="form-control" /></div>
				</div>
				<div>&nbsp;</div>
				<div v-if="data.bundlePelayanan=='06'||data.bundlePelayanan=='07'||data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nik ??</div>
						<div class="col-md-6"><input v-model="data.Nik" class="form-control"/></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Subjek Pajak</div>
						<div class="col-md-6"><input v-model="data.namaWP" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Letak Objek Pajak</div>
						<div class="col-md-6"><input v-model="data.letakOP" class="form-control"/></div>
					</div>
					<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alasan Pengurangan</div>
						<div class="col-md-6 col-lg-5 col-xl-7">
							<select class="form-select" v-model="data.alasanPengurangan">
								<option v-for="item in alasanPengurangans" :value="item.id">{{item.name}}</option>
							</select>
							<span class="text-danger" v-if="dataErr.alasanPengurangan">{{dataErr.alasanPengurangan}}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Penerimaan</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.tanggalTerima" format="DD/MM/YYYY" /></div>
					<span class="text-danger" v-if="dataErr.tanggalTerima">{{dataErr.tanggalTerima}}</span>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Perkiraan Selesai</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.tanggalSelesai" format="DD/MM/YYYY" /></div>
					<span class="text-danger" v-if="dataErr.tanggalSelesai">{{dataErr.tanggalSelesai}}</span>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Surat Permohonan</div>
					<div class="col-md-6 col-lg-4 col-xl-4"><datepicker v-model="data.tanggalPermohonan" format="DD/MM/YYYY" /></div>
					<span class="text-danger" v-if="dataErr.tanggalPermohonan">{{dataErr.tanggalPermohonan}}</span>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tahun Pajak</div>
					<div class="col-md-6 col-lg-2 col-xl-1"><input v-model="data.tahunPajak" class="form-control" /></div>
					<span class="text-danger" v-if="dataErr.tahunPajak">{{dataErr.tahunPajak}}</span>
				</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Persentase</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.persentasePengurangan" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Pengurangan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="data.jenisPengurangan">
								<option v-for="item in jenisPengurangans" :value="item.id">{{item.name}}</option>
							</select>
							<span class="text-danger" v-if="dataErr.jenisPengurangan">{{dataErr.jenisPengurangan}}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" v-if="data.bundlePelayanan=='06'||data.bundlePelayanan=='07'||data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">		
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-1 col-lg-1 col-xl-2 pt-1">Keterangan</div>
					<div class="col-md-8 col-lg-7 col-xl-9"><input v-model="data.keterangan" class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4" v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'||data.bundlePelayanan=='03'">
	<div class="card-header">Data E-SOP</div>
	<div class="card-body">
		<div class="row">
			<div class="row g-0 mb-3">
				<div class="col-md-12 col-lg-2 col-xl-4 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Pemilik Objek Pajak</strong></div>
				<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nik</div>
					<div class="col-md-6"><input v-model="data.oppbb.regWajibPajakPbb.nik" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Subjek Pajak</div>
					<div class="col-md-6"><input v-model="data.oppbb.regWajibPajakPbb.nama" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">NPWP</div>
					<div class="col-md-6"><input v-model="data.oppbb.regWajibPajakPbb.npwp" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alamat</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.oppbb.regWajibPajakPbb.jalan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Rt/RW</div>
					<div class="col-md-1"><input v-model="data.oppbb.regWajibPajakPbb.rt" class="form-control" /></div>
					<div class="col-md-1"> &nbsp;&nbsp;&nbsp; <span> /</span></div>
					<div class="col-md-1"><input v-model="data.oppbb.regWajibPajakPbb.rw" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kota</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.oppbb.regWajibPajakPbb.daerah_kode" class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Pekerjaan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="data.oppbb.regWajibPajakPbb.pekerjaan">
							<option v-for="item in pekerjaans" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regWajibPajakPbb.pekerjaan">{{dataErr.oppbb.regWajibPajakPbb.pekerjaan}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Status Kepemilikan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="data.oppbb.regWajibPajakPbb.statusKempemilikan">
							<option v-for="item in statusKepemilikans" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regWajibPajakPbb.statusKempemilikan">{{dataErr.oppbb.regWajibPajakPbb.statusKempemilikan}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Telp</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.oppbb.regWajibPajakPbb.telp" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Blok/Kav/No</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.oppbb.regWajibPajakPbb.blokKavNo" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kode Pos</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.oppbb.regWajibPajakPbb.kodePos" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelurahan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.oppbb.regWajibPajakPbb.kelurahan_kode" class="form-control" /></div>
				</div>
			</div>

			<div class="row g-0 mb-3">
				<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-12 col-lg-2 col-xl-4 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Letak Objek Pajak</strong></div>
				<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Jalan</div>
					<div class="col-md-6"><input v-model="data.oppbb.jalan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Blok/Kav/No</div>
					<div class="col-md-6"><input v-model="data.oppbb.blokKavNo" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Rt/RW</div>
					<div class="col-md-1"><input v-model="data.oppbb.rt" class="form-control" /></div>
					<div class="col-md-1"> &nbsp;&nbsp;&nbsp; <span> /</span></div>
					<div class="col-md-1"><input v-model="data.oppbb.rw" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelurahan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.oppbb.kelurahan_kode" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Persil</div>
					<div class="col-md-2 col-lg-1 col-xl-2"><input v-model="data.oppbb.noPersil" class="form-control" /></div>
					<div class="col-md-2 col-lg-1 col-xl-2"> &nbsp;&nbsp;&nbsp; Cabang</div>
					<div class="col-md-2 col-lg-1 col-xl-2"><input type="radio" v-bind:value="data.oppbb.statusCabang" v-bind:checked="data.oppbb.statusCabang=='1'" disabled>&nbsp;&nbsp;&nbsp;Ya</input></div>
					<div class="col-md-2 col-lg-1 col-xl-2"><input type="radio" v-bind:value="data.oppbb.statusCabang" v-bind:checked="data.oppbb.statusCabang=='2'" disabled>&nbsp;&nbsp;&nbsp;Tidak</input></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Foto Denah</div>
					<div class="col-md-6 col-lg-10 col-xl-8 row mb-6"><div></div></div>
				</div>
			</div>

			<div v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-4 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Info Objek Pajak</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Tanah</div>
						<div class="col-md-6"><input v-model="data.oppbb.regObjekPajakBumi.luasBumi" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Tanah</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="data.oppbb.regObjekPajakBumi.jenisBumi">
								<option v-for="item in jenisBumis" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.jenisBumi">{{dataErr.oppbb.regObjekPajakBumi.jenisBumi}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kode Znt</div>
						<div class="col-md-6"><input v-model="data.oppbb.regObjekPajakBumi.kodeZnt" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Bangunan</div>
						<div class="col-md-6"><input v-model="jumlahBangunan" class="form-control"/></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4" v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'">
<!-- <div class="card mb-4"> -->
	<div class="card-header">Data L-SPOP</div>
	<div class="card-body">
		<!-- <div class="row"> -->
		<div class="row" v-for="(regObjekPajakBng, index) in data.oppbb.regObjekPajakBumi.regObjekPajakBng">
			<div class="row g-0 mb-3">
				<div class="col-md-12 col-lg-2 col-xl-4 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Rincian Bangunan</strong></div>
				<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Bangunan</div>
					<div class="col-md-6"><input v-model="regObjekPajakBng.noBangunan" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Bangunan</div>
					<div class="col-md-6"><input v-model="regObjekPajakBng.jpb_kode" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Bangunan</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.luasBangunan" class="form-control"/></div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Jumlah Lantai</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.jmlLantaiBng" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tahun Dibangun</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.tahunDibangun" class="form-control"/></div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Tahun Renovasi</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.tahunRenovasi" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kondisi Bangunan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.kondisi">
							<option v-for="item in kondisiBangunans" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kondisi">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kondisi}}</span> -->
					</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Konstruksi</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.jenisKonstruksi">
							<option v-for="item in jenisKonstruksis" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.jenisKonstruksi">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.jenisKonstruksi}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Atap</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.jenisAtap">
							<option v-for="item in jenisAtaps" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.jenisAtap">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.jenisAtap}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Dinding</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.kodeDinding">
							<option v-for="item in kodeDindings" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kodeDinding">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kodeDinding}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Lantai</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.kodeLantai">
							<option v-for="item in kodeLantais" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kodeLantai">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kodeLantai}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Langit-langit</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.kodeLangitLangit">
							<option v-for="item in kodeLangitLangits" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kodeLangitLangit">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.kodeLangitLangit}}</span> -->
					</div>
				</div>
			</div>

			<div class="row g-0 mb-3">
				<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-12 col-lg-2 col-xl-4 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Fasilitas Bangunan</strong></div>
				<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Daya Listrik ??</div>
					<div class="col-md-6"><input v-model="regObjekPajakBng.regFasBangunan.jpbProdDaya" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah AC Split</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.regFasBangunan.fbJumlahACSplit" class="form-control"/></div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Jumlah Lantai ??</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.jmlLantaiBng" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah AC Window</div>
					<div class="col-md-6"><input v-model="regObjekPajakBng.regFasBangunan.fbJumlahACWindow" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Kolam Renang</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.fbLuasKolamRenang" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Finishing Kolam</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.fbTipeLapisanKolam">
							<option v-for="item in fbTipeLapisanKolams" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.fbTipeLapisanKolam">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.fbTipeLapisanKolam}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp;</div>
					<div class="col-md-2">Lampu</div>
					<div class="col-md-3"> &nbsp;&nbsp;&nbsp;</div>
					<div class="col-md-2">Lampu</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1"> &nbsp; </div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.regFasBangunan.fbTenisLampuBeton" class="form-control"/></div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Beton</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.regFasBangunan.fbTenisTanpaLampuBeton" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Lapangan Tenis</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.regFasBangunan.fbTenisAspal1" class="form-control"/></div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Aspal</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.regFasBangunan.fbTenisAspal2" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp; </div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.regFasBangunan.fbTenisLiatRumput1" class="form-control"/></div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Tanah Liat/Lumpur</div>
					<div class="col-md-2"><input v-model="regObjekPajakBng.regFasBangunan.fbTenisLiatRumput2" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Panjang Pagar</div>
					<div class="col-md-6"><input v-model="regObjekPajakBng.regFasBangunan.fbPagarPanjang" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Bahan Pagar</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.fbPagarBahan">
							<option v-for="item in fbPagarBahans" :value="item.id">{{item.name}}</option>
						</select>
						<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.fbPagarBahan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.fbPagarBahan}}</span> -->
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah PABX</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.fbPABX" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah PABX ??</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.fbPABX" class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Perikerasan Halaman (m<sup>2</sup>)</div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Ringan</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbHalamanRingan" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1"> &nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Sedang</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbHalamanSendang" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Berat</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbHalamanBerat" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Dgn Penutup Lantai</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbHalamanLantai" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Lift</div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Penumpang</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbLiftPenumpang" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1"> &nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Kapsul</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbLiftKapsul" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Barang</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbLiftBarang" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Tangga Berjalan </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Lebar <= 80m</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbTangga80" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Lebar > 80m</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbTangga81" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Pemadam Kebakaran</div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Hydrant</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbPKHydrant" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1"> &nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Sprinkler</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbPKSplinkler" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp; </div>
					<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Fire Alarm</div>
					<div class="col-md-3"><input v-model="regObjekPajakBng.regFasBangunan.fbPKFireAI" class="form-control"/></div>
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='02'||regObjekPajakBng.jpb_kode=='09'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Perkantoran Swasta/Gedung Pemerintahan (Jpb 2/9)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelas Bangunan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.kelasBangunan">
								<option v-for="item in kelasBangunans" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
				</div>
				<div class="col-xl">
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='03'||regObjekPajakBng.jpb_kode=='08'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-4 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Pabrik/Bengkel/Gudang/Pertanian (Jpb 3/8)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tinggi Kolom</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbProdTinggi" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Keliling Dinding</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbProdKeliling" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Lebar Bentang</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbProdLebar" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Mezzanine</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbProdLuas" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Daya Dukung Lantai</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbProdDaya" class="form-control" /></div>
					</div>
					<div class="row g-0 mb-3">
					</div>
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='04'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Toko/Apotek/Pasar/Ruko (Jpb 4)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelas Bangunan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.kelasBangunan">
								<option v-for="item in kelasBangunans" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
				</div>
				<div class="col-xl">
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='05'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Rumah Sakit/Klinik (Jpb 5)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelas Bangunan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.kelasBangunan">
								<option v-for="item in kelasBangunans" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Kamar dgn AC Central</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbKlinikACCentralKamar" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Ruang Lain dgn AC Central</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbKlinikACCentralRuang" class="form-control" /></div>
					</div>
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='06'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Bangunan Olahraga/Taman Rekreasi (Jpb 6)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelas Bangunan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.kelasBangunan">
								<option v-for="item in kelasBangunans" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
				</div>
				<div class="col-xl">
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='07'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Hotel/Wisma (Jpb 7)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Hotel</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.jpbHotelJenis">
								<option v-for="item in jpbHotelJeniss" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.jpbHotelJenis">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.jpbHotelJenis}}</span> -->
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Kamar dgn AC Central</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbHotelACCentralKamar" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Bintang</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.jpbHotelBintang">
								<option v-for="item in jpbHotelBintangs" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.jpbHotelBintang">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.jenisPelayanans}}</span> -->
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Ruang Lain dgn AC Central</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbHotelACCentralRuang" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Kamar</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbHotelJmlKamar" class="form-control" /></div>
					</div>
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='12'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Bangunan Parkir (Jpb 12)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelas Bangunan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.kelasBangunan">
								<option v-for="item in kelasBangunans" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErroppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.jenisPelayanans}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
				</div>
				<div class="col-xl">
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='13'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Appartemen (Jpb 13)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelas Bangunan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.kelasBangunan">
								<option v-for="item in kelasBangunans" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan}}</span> -->
						</div>
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Appartemen</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbApartemenJumlah" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3"> &nbsp;
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Kamar dgn AC Central</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbApartemenACCentralKamar" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3"> &nbsp;
					</div>
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Luas Ruang Lain dgn AC Central</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbApartemenACCentralLain" class="form-control" /></div>
					</div>
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='15'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Tangki Minyak (Jpb 15)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kapasitas Tangki</div>
						<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="regObjekPajakBng.regFasBangunan.jpbTankiKapasitas" class="form-control" /></div>
					</div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Letak Tangki</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.jpbTankiLetak">
								<option v-for="item in jpbTankiLetaks" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.jpbTankiLetak">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.jpbTankiLetak}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
				</div>
			</div>

			<div v-if="regObjekPajakBng.jpb_kode=='16'">
				<div class="row g-0 mb-3">
					<div class="col-md-12"> &nbsp;&nbsp;&nbsp; </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-12 col-lg-2 col-xl-5 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Data Tambahan Gedung Sekolah (Jpb 16)</strong></div>
					<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
				</div>
				<div class="col-xl">
					<div class="row g-0 mb-3">
						<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelas Bangunan</div>
						<div class="col-md-6 col-lg-10 col-xl-8">
							<select class="form-select" v-model="regObjekPajakBng.regFasBangunan.kelasBangunan">
								<option v-for="item in kelasBangunans" :value="item.id">{{item.name}}</option>
							</select>
							<!-- <span class="text-danger" v-if="dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan">{{dataErr.oppbb.regObjekPajakBumi.regObjekPajakBng.regFasBangunan.kelasBangunan}}</span> -->
						</div>
					</div>
				</div>
				<div class="col-xl">
				</div>
				<div class="col-xl">
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4">
	<div class="card-header">Data Lampiran</div>
	<div class="card-body">
		<div class="row">
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'||data.bundlePelayanan=='03'||data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 "> &nbsp;&nbsp;&nbsp; Foto KTP</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'||data.bundlePelayanan=='03'">
				<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Foto Scan Bukti Kepemilikan</div>
				<div class="col-md-3 col-lg-2 col-xl-3 pt-1" v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'">
					<select class="form-select" v-model="data.bundlePelayanan" :disabled="id != null && id != ''">
						<option v-for="item in jenisPelayanans" :value="item.id">{{item.name}}</option>
					</select>
					<span class="text-danger" v-if="dataErr.jenisPelayanan">{{dataErr.jenisPelayanan}}</span>
				</div>
				<div class="col-md-4 col-lg-3 col-xl-4 pt-1"> &nbsp; </div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Foto Objek Pajak</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='01'||data.bundlePelayanan=='02'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Surat Pernyataan</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='03'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Surat Permohonan Pembetulan</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='01'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SPPT Tetangga</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Kartu Keluarga</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SK Kelurahan</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SK Dinas Terkait</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SK Keputusan Pensiun</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SK Liquiditas</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SK Pengurangan Tahun Sebelumnya</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SPPT Tahun Berjalan</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Slip Gaji</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Bukti Pelunasan SPPT Tahun Sebelumnya</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Bukti Pembayaran Tagihan Rekening</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Laporan Keuangan</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Laporan Penerimaan dan Pengeluaran</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Akta Pendirian Perusuhaan/Yayasan</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; CashFlow</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; SPT PPH Tahun Sebelumnya</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4" v-if="data.bundlePelayanan=='06'||data.bundlePelayanan=='07'||data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
	<div class="card-header">Data Lampiran Hasil Pemeriksaan</div>
	<div class="card-body">
		<div class="row">
			<div class="row g-0 mb-3">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; LHP</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Upload File</a></div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Telaah Staff</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Upload File</a></div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Approval</div>
	<div class="card-body">
		<div class="row g-0 mb-3">
			<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Verifikasi Staff</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
			<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Tanggal Verifikasi</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
		</div>
		<div class="row g-0 mb-3">
			<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alasan Penolakan</div>
			<div class="col-md-6"><input v-model="data.Nik" class="form-control"/></div>
		</div>
		<div class="row g-0 mb-3">
			<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Verifikasi Kasubid</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
			<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Tanggal Verifikasi</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
		</div>
		<div class="row g-0 mb-3">
			<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Verifikasi Kabid</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
			<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Tanggal Verifikasi</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
		</div>
		<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
			<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Verifikasi Sekban</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
			<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Tanggal Verifikasi</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
		</div>
		<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='06'||data.bundlePelayanan=='07'||data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
			<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Verifikasi Kaban</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
			<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Tanggal Verifikasi</div>
			<div class="col-md-2"><input v-model="data.Npwp" class="form-control"/></div>
		</div>
		<div class="row g-0 mb-3" v-if="data.bundlePelayanan=='08'||data.bundlePelayanan=='10'">
			<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Pengurangann</div>
			<div class="col-md-1"><input v-model="data.Nik" class="form-control"/></div>
			<div class="col-md-4">%</div>
		</div>
	</div>
</div>
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<hr />
<div class="d-flex justify-content-center">
	<div>
		<a href="<?= $backUrl ?>" class="btn bg-grey-300">
			<i class="bi bi-chevron-left"></i> Kembali
		</a>
		<button v-if="hideApproval != true" class="btn bg-danger ms-2" data-bs-toggle="modal" data-bs-target="#rejectRequestModal">
			<i class="bi bi-x-lg"></i> Tolak
		</button>
		<button v-if="hideApproval != true" class="btn bg-blue ms-2" data-bs-toggle="modal" data-bs-target="#approveRequestModal">
			<i class="bi bi-check-lg"></i> Terima
		</button>
	</div>
</div>

<div id="approveRequestModal" class="modal fade" data-bs-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Terima Permohonan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Proses akan <strong>MENERIMA</strong> permohonan. Lanjutkan Proses?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button @click="approveRequest(data)" type="button" class="btn btn-primary">Terima</button>
			</div>
		</div>
	</div>
</div>
<div id="rejectRequestModal" class="modal fade" data-bs-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Tolak Permohonan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Proses akan <strong>MENOLAK</strong> permohonan. Lanjutkan Proses?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button @click="rejectRequest(this.data)" type="button" class="btn btn-primary">Tolak</button>
			</div>
		</div>
	</div>
</div>



