<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/permohonan/verifikasi-sppt.js?v=20221108a');
$this->registerJsFile('@web/js/services/pelayanan/verifikasi-sppt.js?v=20221108b');

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
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Pemohon</div>
					<div class="col-md-6"><input v-model="data.namaPemohon" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alamat Pemohon</div>
					<div class="col-md-6"><input v-model="data.noSuratPermohonan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nop</div>
					<div class="col-md-1"><input v-model="data.Nop1" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.Nop2" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.Nop3" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.Nop4" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.Nop5" class="form-control" /></div>
					<div class="col-md-1"><input v-model="data.Nop6" class="form-control" /></div>
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
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4">
	<div class="card-header">Data E-SOP</div>
	<div class="card-body">
		<div class="row" :disabled="!nopdata">
			<div class="row g-0 mb-3">
				<div class="col-md-12 col-lg-2 col-xl-4 pt-1"> &nbsp;&nbsp;&nbsp; <strong>Pemilik Objek Pajak</strong></div>
				<div class="col-md-12"><hr class="gray_line mt10 mb10"/></div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nik</div>
					<div class="col-md-6"><input v-model="data.Nik" class="form-control" :disabled="!nopdata"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Subjek Pajak</div>
					<div class="col-md-6"><input v-model="data.namaWP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">NPWP</div>
					<div class="col-md-6"><input v-model="data.Npwp" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alamat</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.AlamatWP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Rt/RW</div>
					<div class="col-md-1"><input v-model="data.RtWp" class="form-control" /></div>
					<div class="col-md-1"> &nbsp;&nbsp;&nbsp; <span> /</span></div>
					<div class="col-md-1"><input v-model="data.RwWp" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kota</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.KotaWP" class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Pekerjaan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="data.jenisPelayanan" @change="jenisPelayananOnChange($event)" :disabled="id != null && id != ''">
							<option v-for="item in jenisPelayanans" :value="item.id">{{item.name}}</option>
						</select>
						<span class="text-danger" v-if="dataErr.jenisPelayanan">{{dataErr.jenisPelayanan}}</span>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Status Kepemilikan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">
						<select class="form-select" v-model="data.jenisPelayanan" @change="jenisPelayananOnChange($event)" :disabled="id != null && id != ''">
							<option v-for="item in jenisPelayanans" :value="item.id">{{item.name}}</option>
						</select>
						<span class="text-danger" v-if="dataErr.jenisPelayanan">{{dataErr.jenisPelayanan}}</span>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Telp</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.pekerjaanWP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Blok/Kav/No</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.pekerjaanWP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kode Pos</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.pekerjaanWP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelurahan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.pekerjaanWP" class="form-control" /></div>
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
					<div class="col-md-6"><input v-model="data.letakOP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Blok/Kav/No</div>
					<div class="col-md-6"><input v-model="data.blokKavNo" class="form-control"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Rt/RW</div>
					<div class="col-md-1"><input v-model="data.RtWp" class="form-control" /></div>
					<div class="col-md-1"> &nbsp;&nbsp;&nbsp; <span> /</span></div>
					<div class="col-md-1"><input v-model="data.RwWp" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelurahan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.kelurahanOP" class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
				</div>
			</div>

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
					<div class="col-md-6"><input v-model="data.letakOP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Tanah</div>
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
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kode Znt</div>
					<div class="col-md-6"><input v-model="data.letakOP" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jumlah Bangunan</div>
					<div class="col-md-6"><input v-model="data.blokKavNo" class="form-control"/></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Data Lampiran</div>
	<div class="card-body">
		<div class="row" :disabled="!nopdata">
			<div class="row g-0 mb-3">
				<div class="col-md-10 "> &nbsp;&nbsp;&nbsp; Foto KTP</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-3 col-lg-2 col-xl-3 pt-1"> &nbsp;&nbsp;&nbsp; Foto Scan Bukti Kepemilikan</div>
				<div class="col-md-3 col-lg-2 col-xl-3 pt-1">
					<select class="form-select" v-model="data.jenisPelayanan" @change="jenisPelayananOnChange($event)" :disabled="id != null && id != ''">
						<option v-for="item in jenisPelayanans" :value="item.id">{{item.name}}</option>
					</select>
					<span class="text-danger" v-if="dataErr.jenisPelayanan">{{dataErr.jenisPelayanan}}</span>
				</div>
				<div class="col-md-4 col-lg-3 col-xl-4 pt-1"> &nbsp; </div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
			</div>
			<div class="row g-0 mb-3">
				<div class="col-md-10 col-lg-9 col-xl-10 pt-1"> &nbsp;&nbsp;&nbsp; Foto Permohonan Pembetulan</div>
				<div class="col-md-2 col-lg-1 col-xl-2 pt-1"><a href="#" class="btn bg-blue ms-2"><i class="bi bi-pencil"></i> Lihat</a></div>
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
			<div class="col-md-6"><input v-model="data.Nik" class="form-control" :disabled="!nopdata"/></div>
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
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


