<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/bphtb/verifikasi.js?v=20221206a');
$this->registerJsFile('@web/js/services/bphtb/verifikasi.js?v=20221206b');

?>
<div class="card mb-4">
	<div class="card-header">SSPD BPHTB</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-1">
						<button @click="submitCetak" class="btn bg-blue ms-2" disabled>
							<i class="bi bi-check-lg"></i> Cetak
						</button>
					</div>
					<div class="col-xl-7">
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Staff</div>
							<div class="col-md-9 col-lg-9 col-xl-8">{{ data.namaStaff }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Dispenda</div>
							<div class="col-md-9 col-lg-9 col-xl-8" v-if="data.validasiDisependa">Sudah di Verifikasi Dispenda</div><div class="col-md-9 col-lg-9 col-xl-8" v-else> Belum di Verifikasi Dispenda </div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Petugas Lapangan</div>
							<div class="col-md-9 col-lg-9 col-xl-8">{{ data.namaPetugasLapangan }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Petugas Lapangan</div>
							<div class="col-md-9 col-lg-5 col-xl-4"><input v-model="data.namaPetugasLapangan" class="form-control"/></div>
						</div>				
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Alasan Reject</div>
							<div class="col-md-9 col-lg-9 col-xl-8"><p v-html="data.alasanReject"></p></div>
						</div>		
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Bank</div>
							<div class="col-md-9 col-lg-9 col-xl-8" v-if="data.validasiBank">Sudah di Verifikasi Bank</div><div class="col-md-9 col-lg-9 col-xl-8" v-else> Belum di Verifikasi Bank </div>
						</div>	
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Tanggal Verifikasi Bank</div>
							<div class="col-md-9 col-lg-2 col-xl-2"><datepicker v-model="data.tglValidasiBank" format="DD/MM/YYYY" /></div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Status</div>
							<div class="col-md-9 col-lg-2 col-xl-2" v-if="data.kodeValidasi">Sudah di-approve oleh Kabid.</div> <div class="col-md-9 col-lg-2 col-xl-2" v-else> - </div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">ID Billing</div>
							<div class="col-md-8 col-lg-10 col-xl-8">{{ data.idBilling }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">No. Pelayanan</div>
							<div class="col-md-8 col-lg-10 col-xl-8">{{ data.noPelayanan }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">No. SSPD</div>
							<div class="col-md-8 col-lg-10 col-xl-8">{{ data.sspdLama }}</div>
						</div>		
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Tanggal Jatuh Tempo Pembayaran</div>
							<div class="col-md-8 col-lg-10 col-xl-8">{{ data.tglExpBilling }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
					</div>
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
			</div>				
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header"><strong>PERHATIAN</strong> : Bacalah petunjuk pengisian pada halaman belakang lembar ini terlebih dahulu</div>
	<div class="card-body">
		<div class="row">
			<div class="col-1">
				<div>A.</div>
			</div>
			<div class="col-xl">				
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">1. Nama Wajib Pajak</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.namaWp}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">2. NIK</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.wajibPajak_NIK}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">3. Alamat Wajib Pajak</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.alamat}}</div>
				</div>

				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">4. Kelurahan/Desa</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.kabupaten_wp}}</div>
						</div>							
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-3">7. Kabupaten</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.kabupaten_wp}}</div>
						</div>
					</div>
					<div class="col-xl">							
						<div class="row g-0 mb-3">
							<div class="col-xl">							
								<div class="row g-0 mb-3">
									<div class="col-md-3 col-lg-3 col-xl-4">5. RT/RW</div>
									<div class="col-md-6 col-lg-10 col-xl-8">{{data.rtRw}}</div>
								</div>						
								<div class="row g-0 mb-3">
									<div class="col-md-23 col-lg-3 col-xl-4">&nbsp;</div>
									<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
								</div>
							</div>
							<div class="col-xl">							
								<div class="row g-0 mb-3">
									<div class="col-md-3 col-lg-3 col-xl-4">6. Kecamatan</div>
									<div class="col-md-6 col-lg-10 col-xl-8">{{data.kecamatan_wp}}</div>
								</div>							
								<div class="row g-0 mb-3">
									<div class="col-md-3 col-lg-3 col-xl-4">8. Kode Post</div>
									<div class="col-md-6 col-lg-10 col-xl-8">{{data.kodePos}}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <hr class="gray_line mt10 mb10"/>
		<div class="row">	
			<div class="col-1">
				<div>B.</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">Nomor Object Pajak PBB</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.permohonanProvinsiID}}.{{data.permohonanKotaID}}.{{data.permohonanKecamatanID}}.{{data.permohonanKelurahanID}}.{{data.permohonanBlokID}}.{{data.noUrutPemohon}}.{{data.pemohonJenisOPID}} </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">Letak Tanah Atau Bangunan</div>
					<div class="col-md-6 col-lg-10 col-xl-8">{{data.lokasiOp}}</div>
				</div>	
				<div class="row g-0 mb-3">
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Kelurahan/Desa</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.opKelurahan}}</div>
						</div>						
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Kecamatan</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.opKecamatan}}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-9">
								<select class="form-select" v-model="data.pilihAlamat">
									<option v-for="item in pilihAlamats" :value="data.id">{{data.name}}</option>
								</select>
								<span class="text-danger" v-if="dataErr.pilihAlamat">{{dataErr.pilihAlamat}}</span>
							</div>
						</div>
					</div>
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">RT/RW</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.op_RtRW}}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Kabupaten/Kota</div>
							<div class="col-md-6 col-lg-10 col-xl-8">{{data.opKota}}</div>
						</div>						
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Harga/Referensi</div>
							<div class="col-md-6"><input v-model="data.hargaReferensi" class="form-control" disabled/></div>
						</div>
					</div>
				</div>
			</div>		
		</div>
		<div class="row">	
			<div class="col-1">
				<div>&nbsp;</div>
			</div>
			<div class="col-xl">
				<div><strong>Penghitungan NJOP PBB :</strong></div>
				<div>&nbsp;</div>
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
							<tr>
								<th scope="row">Tanah (bumi)</th>
								<td>7&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp; {{ data.opLuasTanah }}</td>
								<td>9&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp; {{ data.njopLuasTanah }}</td>
								<td>11&nbsp;| &nbsp;&nbsp;&nbsp; {{ data.opLuasTanah * data.njopLuasTanah }}</td>
							</tr>
							<tr>
								<th scope="row">Bangunan</th>
								<td>8&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp; {{ data.opLuasBangunan }}</td>
								<td>10&nbsp;| &nbsp;&nbsp;&nbsp; {{ data.njopLuasBangunan }}</td>
								<td>12&nbsp;| &nbsp;&nbsp;&nbsp; {{ data.opLuasBangunan * data.njopLuasBangunan }}</td>
							</tr>
							<tr>
								<th scope="row">&nbsp;</th>
								<td>&nbsp;</td>
								<td>NJOP PBB : </td>
								<td>{{ data.nilaiOp }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">	
			<div class="col-1">
				<div>&nbsp;</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-10 col-xl-8">Jenis perolehan hak atas tanah dan atau bangunan</div>
					<div class="col-md-3 col-lg-2 col-xl-4">{{data.jenisPerolehanOp}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-10 col-xl-8">No. Sertifikasi</div>
					<div class="col-md-3 col-lg-2 col-xl-4">{{data.noSertifikatOp}}</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-5">Harga Transaksi/Nilai Pasar</div>
					<div class="col-md-6 col-lg-2 col-xl-4"><input v-model="data.nilaiOp" class="form-control" disabled/></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-5">&nbsp;</div>
					<div class="col-md-6 col-lg-2 col-xl-4">&nbsp;</div>
				</div>
			</div>
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-1">
				<div>C.</div>
			</div>
			<div class="col-xl">
				<div>PENGHITUNGAN BPHTB (hanya diisi berdasarkan penghitungan Wajib Pajak)</div>
			</div>
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-1">
				<div>&nbsp;</div>
			</div>
			<div class="col-xl">
				<div class="col-xl">
					<div class="table-responsive-sm">
						<table class="table">
							<tbody>
								<tr>
									<th scope="row">1. NPOP</th>
									<td>{{ data.npop }}</td>
								</tr>
								<tr>
									<th scope="row">2. NPOPTKP</th>
									<td>{{ data.npoptkp }}</td>
								</tr>
								<tr>
									<th scope="row">3. NPOPKP</th>
									<td>{{ data.npop - data.npoptkp }}</td>
								</tr>
								<tr>
									<th scope="row">4. Bea Perolehan hak atas tanah dan Bangunan yang terutang</th>
									<td>{{ (5 / 100) * (data.npop - data.npoptkp) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-1">
				<div>D.</div>
			</div>
			<div class="col-xl">
				<div>Jumlah setoran berdasarkan</div>
			</div>
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-1">
				<div>&nbsp;</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6"><input type="radio" v-bind:value="data.jenisSetoran" v-bind:checked="data.jenisSetoran=='PWP'" disabled>&nbsp;&nbsp;&nbsp;Perhitungan Wajib Pajak</input></div>
					<div class="col-md-3 col-lg-6 col-xl-6">&nbsp;</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6"><input type="radio" v-bind:value="data.jenisSetoran" v-bind:checked="data.jenisSetoran=='STB'" disabled>&nbsp;&nbsp;&nbsp;STB</input></div>
					<div class="col-md-3 col-lg-6 col-xl-6">Nomor &nbsp; : &nbsp; {{data.jenisSetoranNomor}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6"><input type="radio" v-bind:value="data.jenisSetoran" v-bind:checked="data.jenisSetoran=='SKBKB'" disabled>&nbsp;&nbsp;&nbsp;SKBKB</input></div>
					<div class="col-md-3 col-lg-6 col-xl-6">Nomor &nbsp; : &nbsp; {{data.jenisSetoranNomor}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6"><input type="radio" v-bind:value="data.jenisSetoran" v-bind:checked="data.jenisSetoran=='SKBKBT'" disabled>&nbsp;&nbsp;&nbsp;SKBKBT</input></div>
					<div class="col-md-3 col-lg-6 col-xl-6">Nomor &nbsp; : &nbsp; {{data.jenisSetoranNomor}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6"><input type="radio" v-bind:value="data.jenisSetoranHitungSendiri" v-bind:checked="data.jenisSetoranHitungSendiri!=null && data.jenisSetoranHitungSendiri!=''" disabled>&nbsp;&nbsp;&nbsp;Pengurangan dihitung sendiri karena</input></div>
					<div class="col-md-3 col-lg-6 col-xl-6">{{data.jenisSetoranHitungSendiri}}</div>
				</div>
			</div>	
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-2 col-xl-3">&nbsp;</div>
					<div class="col-md-3 col-lg-10 col-xl-9">&nbsp;</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-2 col-xl-3">Tanggal</div>
					<div class="col-md-3 col-lg-10 col-xl-9" v-if="data.jenisSetoran=='STB'">{{data.jenisSetoranTanggal}}</div><div class="col-md-3 col-lg-2 col-xl-4" v-else> - </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-2 col-xl-3">Tanggal</div>
					<div class="col-md-3 ccol-lg-10 col-xl-9" v-if="data.jenisSetoran=='SKBKB'">{{data.jenisSetoranTanggal}}</div><div class="col-md-3 col-lg-2 col-xl-4" v-else> - </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-2 col-xl-3">Tanggal</div>
					<div class="col-md-3 col-lg-10 col-xl-9" v-if="data.jenisSetoran=='SKBKBT'">{{data.jenisSetoranTanggal}}</div><div class="col-md-3 col-lg-2 col-xl-4" v-else> - </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-2 col-xl-3">&nbsp;</div>
					<div class="col-md-3 col-lg-10 col-xl-9">&nbsp;</div>
				</div>
			</div>				
		</div>
        <hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-1">
				<div>&nbsp;</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-10 col-lg-10 col-xl-8">JUMLAH YANG DISETOR (dengan angka) :</div>
					<div class="col-md-10 col-lg-10 col-xl-8">{{ (5 / 100) * (data.npop - data.npoptkp) }}</div>
					<div class="col-md-10 col-lg-10 col-xl-8">&nbsp;</div>
					<div class="col-md-10 col-lg-10 col-xl-8">&nbsp;</div>
					<div class="col-md-10 col-lg-10 col-xl-8"><span>(berdasarkan perhitungan C.4 dam pilihan di D)</span></div>
				</div>
			</div>		
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-10 col-lg-10 col-xl-8">(dengan huruf) :</div>
					<div class="col-md-10 col-lg-10 col-xl-8">&nbsp;</div>
					<div class="col-md-10 col-lg-10 col-xl-8 w-100"><textarea  class="form-control" v-model="data.npop" rows="3" disabled></textarea></div>
				</div>
			</div>			
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-1">
				<div>E.</div>
			</div>
			<div class="col-xl">
				<div>Lampiran</div>
			</div>
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-1">
				<div>&nbsp;</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">Nama Petugas Lapangan</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">Gambar OP</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">a. SSPD</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">b. Scan SPPT dan STTS/Struk ATM bukti pembayaran</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">PBB/Bukti Pembayaran PBB</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">c. Scan Identitas Wajib Pajak</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">d. Surat Kuasa Dari Wajib Pajak</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4">Nama Pemberi Kuasa</div>
							<div class="col-md-9 col-lg-10 col-xl-8 w-75"><input v-model="data.lampiran.namaKuasa" class="form-control" disabled/></div>
						</div>
					</div>
					<div class="col-xl">
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-2 col-xl-4">Alamat Pemberi Kuasa</div>
							<div class="col-md-9 col-lg-10 col-xl-8 w-75"><input v-model="data.lampiran.alamatKuasa" class="form-control" disabled/></div>
						</div>						
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">e. Scan Identitas Kuasa Wajib Pajak</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">f. Scan kartu NPWP</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">g. Scan Akta Jual Beli / Hibah / Waris</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">h. Scan Sertifikat / Keterangan Kepemilikan Tanah</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">i. Scan Keterangan Waris</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">j. Scan Surat Pernyataan</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">k. Scan SPOP/LSPOP</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">l. Identitas lainya</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a href=""></a></div>
				</div>
			</div>				
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="text-center">
					<div>.................., tgl 28-06-2022</div>
					<div>WAJIB PAJAK / PENYETOR</div>
					<div class="card-header">&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
				</div>
			</div>	
			<div class="col-xl">
				<div class="text-center">
					<div>MENGETAHUI</div>
					<div>PPAT Notaris</div>
					<div class="card-header">&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
				</div>
			</div>	
			<div class="col-xl">
				<div class="text-center">
					<div>DITERIMA OLEH :</div>
					<div>TEMPAT PEMBAYARAN BPHTB</div>
					<div class="card-header">Tanggal :</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
				</div>
			</div>	
			<div class="col-xl">
				<div class="text-center">
					<div>Telah diverifikasi :</div>
					<div class="card-header">An. Kepala Badan Pendapatan Daerah Kota Malang Kepala Bidang Pajak Daerah</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
				</div>
			</div>				
		</div>
	</div>
</div>
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


