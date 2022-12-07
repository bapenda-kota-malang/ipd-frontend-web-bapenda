<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/verifikasi/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/verifikasi/entryform.js?v=20221108b');

?>
<div class="card mb-4">
	<div class="card-header">SSPD BPHTB</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Verifikasi Staff</div>
					<div class="col-md-6"><input v-model="data.verifikasiStaff" class="form-control" @change="checkNOP($event, data.jenisPelayanan)" :disabled="!nopdata"/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Verifikasi Dispenda</div>
					<div class="col-md-6"><input v-model="data.verifikasiDispenda" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Petugas Lapangan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.verifikasiPetugasLapangan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Petugas Lapangan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.verifikasiPetugasLapangan2" class="form-control" /></div>
				</div>				
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alasan Reject</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.verifikasiAlasanReject" class="form-control" /></div>
				</div>
				<?php if(isset($showVerifikasi)) { ?>
				<button @click="submitVerifikasi" class="btn bg-blue ms-2">
					<i class="bi bi-check-lg"></i> Varifikasi
				</button>
				<button @click="submitTolakVerifikasi" class="btn bg-blue ms-2">
					<i class="bi bi-check-lg"></i> Tolak
				</button>
				<?php } ?>
				<?php if(isset($showValidasi)) { ?>
				<button @click="submitValidasi" class="btn bg-blue ms-2">
					<i class="bi bi-check-lg"></i> Validasi
				</button>
				<button @click="submitTolakValidasi" class="btn bg-blue ms-2">
					<i class="bi bi-check-lg"></i> Tolak
				</button>
				<?php } ?>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No. Pelayanan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.noPelayanan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No. SSPD</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.noSSPD" class="form-control" /></div>
				</div>		
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tanggal Jatuh Tempo Pembayaran</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input v-model="data.verifikasiTanggalJatuhTempo" class="form-control" /></div>
				</div>
			</div>				
		</div>
	</div>
</div>
	
<div class="card mb-4">
	<div class="card-header">PERHATIAN : Bacalah petunjuk pengisian pada halaman belakang lembar ini terlebih dahulu</div>
	<div class="card-body">
		<div class="row" :disabled="!nopdata">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Wajib Pajak</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.namaWajibPajak}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">NIK</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.nik}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Alamat Wajib Pajak</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.alamatWajibPajak}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelurahan/Desa</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.kelurahan}}</div>
						</div>
						<div class="col-xl">
							<div class="row g-0 mb-3">
								<div class="col-md-3 col-lg-2 col-xl-4 pt-1">RT/RW</div>
								<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.rtRw}}</div>
							</div>
							<div class="row g-0 mb-3">
								<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kecamatan</div>
								<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.kecamatan}}</div>
							</div>
						</div>
					<div class="col-xl">
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kabupaten</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.kabupaten}}</div>
						</div>
						<div class="col-xl">
							<div class="row g-0 mb-3">
								<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp;</div>
								<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
							</div>
							<div class="row g-0 mb-3">
								<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kode Post</div>
								<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.kodepost}}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nomor Object Pajak PBB</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.noObjekPajakPBB}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Letak Tanah Atau Bangunan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.letakObjekPajak}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kelurahan/Desa</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.kelurahanOP}}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">RT/RW</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.rtRwOP}}</div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kecamatan</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.kecamatanOP}}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Kabupaten/Kota</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.kabupatenKotaOP}}</div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-9">
								<select class="form-select" v-model="data.pilihAlamat">
									<option v-for="item in pilihAlamats" :value="item.id">{{item.name}}</option>
								</select>
								<span class="text-danger" v-if="dataErr.pilihAlamat">{{dataErr.pilihAlamat}}</span>
							</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Harga/Referensi</div>
							<div class="col-md-6"><input v-model="data.hargaReferensi" class="form-control" disabled/></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="table-responsive-sm">
						<table class="table">
							<thead>
								<tr>
								<th scope="col">Uraian</th>
								<th scope="col">Luas</th>
								<th scope="col">NJOP PBB/m2</th>
								<th scope="col">Luas * NJOP PBB/m2</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for='(item, index) in data.sspd.detil'>
									<th scope="row">{{ item.uraian }}</th>
									<td>{{ item.luas }}</td>
									<td>{{ item.njop }}</td>
									<td>{{ item.luasNjop }}</td>
								</tr>
								<tr>
									<th scope="row">&nbsp;</th>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>{{ item.totalNjop }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis perolehan hak atas tanah dan atau bangunan</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.jenisPerolehan}}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Harga Transaksi/Nilai Pasar</div>
							<div class="col-md-6"><input v-model="data.hargaTransaksi" class="form-control" disabled/></div>
						</div>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No. Sertifikasi</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.sspd.noSertifikasi}}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4 pt-1">&nbsp;</div>
							<div class="col-md-6">&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-9 col-lg-2 col-xl-4 pt-1">PENGHITUNGAN BPHTB (hanya diisi berdasarkan penghitungan Wajib Pajak)</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="table-responsive-sm">
						<table class="table">
							<tbody>
								<tr v-for='(item, index) in data.sspd.perhitungan'>
									<th scope="row">{{ index }}. {{ item.uraian }}</th>
									<td>{{ item.value }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


