<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/bphtb/verifikasi.js?v=20221206a');
$this->registerJsFile('@web/js/services/bphtb/validasi.js?v=20221206b');

?>
<div class="card mb-4">
	<div class="card-header">SSPD BPHTB</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-1">
						<button @click="submitCetak" class="btn bg-blue ms-2" disabled v-if="data.status == '15'">
							<i class="bi bi-check-lg"></i> Cetak
						</button>
					</div>
					<div class="col-xl-7">
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Staff</div>
							<div class="col-md-9 col-lg-10 col-xl-9" v-if="data.namaStaff"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.namaStaff }}</div><div class="col-md-9 col-lg-10 col-xl-9" v-else> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belum di verifikasi staff</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Dispenda</div>
							<div class="ccol-md-9 col-lg-10 col-xl-9" v-if="data.validasiDisependa">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sudah di Valdidasi</div><div class="col-md-9 col-lg-9 col-xl-8" v-else> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belum di Validasi Dispenda </div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Petugas Lapangan</div>
							<div class="col-md-9 col-lg-10 col-xl-9"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.namaPetugasLapangan }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Petugas Lapangan</div>
							<div class="col-md-9 col-lg-4 col-xl-4"><input v-model="data.namaPetugasLapangan" class="form-control"/></div>
						</div>				
						<div class="row g-0 mb-3" v-if="data.alasanReject">
							<div class="col-md-2 col-lg-2 col-xl-3">Alasan Reject</div>
							<div class="col-md-9 col-lg-10 col-xl-9"> : <strong><p v-html="data.alasanReject"></p></div></strong>
						</div>		
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Verifikasi Bank</div>
							<div class="col-md-9 col-lg-10 col-xl-9" v-if="data.status == '10'"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sudah di Verifikasi Bank</div><div class="col-md-9 col-lg-9 col-xl-8" v-else> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belum di Verifikasi Bank </div>
						</div>	
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Tanggal Verifikasi {{ jbtStaff }}</div>
							<div class="col-md-9 col-lg-2 col-xl-2"><datepicker v-model="data.tglValidasiDispenda" format="DD-MM-YYYY" /></div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Status</div>
							<div class="col-md-9 col-lg-10 col-xl-9" v-if="jbtStaff != null"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Sudah di-approve oleh {{ jbtStaff }}.</strong></div> <div class="col-md-9 col-lg-2 col-xl-2" v-else> - </div>
						</div>

						<div class="row g-0 mb-3" v-if="(jabatan_id == 4 || jabatan_id == 0) && formTolak != true">
							<div class="col-md-3 col-lg-3 col-xl-3">
								<button @click="submitValidasi(data)" class="btn bg-blue ms-2">
									<i class="bi bi-check-lg"></i> Validasi
								</button>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3" v-if="(data.status == 09 || data.status == 10 || data.status == 12)">
								<button @click="showTolakForm()" class="btn bg-danger ms-2">
									<i class="bi bi-check-lg"></i> Batal
								</button>
							</div>
						</div>
						<div class="row g-0 mb-3" v-if="formTolak == true">
							<div class="row g-0 mb-3">
								<div class="col-md-2 col-lg-2 col-xl-3">Alasan Reject</div>
								<div class="col-md-9 col-lg-10 col-xl-9 w-90"><textarea  class="form-control" v-model="data.alasanReject" rows="3"></textarea></div>
							</div>
							<div class="row g-0 mb-3">
								<div class="col-md-2 col-lg-2 col-xl-3">Kurang Bayar</div>
								<div class="col-md-9 col-lg-10 col-xl-9"><input v-model="data.kurangBayar" class="form-control"/></div>
							</div>
							<div>&nbsp;</div>
							<div class="col-md-3 col-lg-3 col-xl-3">
								<button @click="submitBatal(data)" class="btn bg-danger ms-2">
									<i class="bi bi-check-lg"></i> Simpan Pembatalan
								</button>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3">
								<button @click="submitKurangBayar(data)" class="btn bg-danger ms-2">
									<i class="bi bi-check-lg"></i> Kurang Bayar
								</button>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3">
								<button @click="hideTolakForm()" class="btn bg-blue ms-2">
									<i class="bi bi-check-lg"></i> Kembali
								</button>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="row g-0 mb-3" v-if="data.idBilling">
							<div class="col-md-3 col-lg-3 col-xl-4">ID Billing</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.idBilling }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">No. Pelayanan</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.noPelayanan }}</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">No. SSPD</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.noDokumen }}</div>
						</div>		
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">Tanggal Jatuh Tempo Pembayaran</div>
							<div class="col-md-8 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ data.tglExpBilling }}</div>
						</div>
						<div class="row g-0 mb-3" v-if="data.alasanReject">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
							<div class="col-md-8 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
					</div>
				</div>
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
			<div class="col-xl-5">				
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">1. Nama Wajib Pajak</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.namaWp}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">2. NIK</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.wajibPajak_NIK}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">3. Alamat Wajib Pajak</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.alamat}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">4. Kelurahan/Desa</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.kelurahan_wp}}</div>
				</div>							
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">7. Kabupaten</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.kabupaten_wp}}</div>
				</div>
			</div>
			<div class="col-xl-3">
				<div class="row g-0 mb-3">			
					<div class="col-xl">						
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
						</div>					
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
						</div>					
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
						</div>						
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-3 col-xl-4">5. RT/RW</div>
							<div class="col-md-6 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.rtRw}}</div>
						</div>						
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-3 col-xl-4">&nbsp;</div>
							<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3">						
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
					<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
				</div>								
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
					<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
				</div>									
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-3 col-xl-4">&nbsp;</div>
					<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
				</div>						
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-3 col-xl-4">6. Kecamatan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.kecamatan_wp}}</div>
				</div>							
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-3 col-xl-4">8. Kode Post</div>
					<div class="col-md-6 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.kodePos}}</div>
				</div>
			</div>
		</div>
        <hr class="gray_line mt10 mb10"/>
		<div class="row">	
			<div class="col-1">
				<div>B.</div>
			</div>
			<div class="col-xl-6">
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">1. Nomor Object Pajak PBB</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.permohonanProvinsiID}}.{{data.permohonanKotaID}}.{{data.permohonanKecamatanID}}.{{data.permohonanKelurahanID}}.{{data.permohonanBlokID}}.{{data.noUrutPemohon}}.{{data.pemohonJenisOPID}} </div>
				</div>				
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">2. Letak Tanah Atau Bangunan</div>
					<div class="col-md-6 col-lg-19 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.lokasiOp}}</div>
				</div>	
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">3. Kelurahan/Desa</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.opKelurahan}}</div>
				</div>						
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4">5. Kecamatan</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.opKecamatan}}</div>
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
			<div class="col-xl-5">
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
					<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">&nbsp;</div>
					<div class="col-md-6 col-lg-10 col-xl-8">&nbsp;</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">4. RT/RW</div>
					<div class="col-md-6 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.op_RtRW}}</div>
				</div>				
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">6. Kabupaten/Kota</div>
					<div class="col-md-6 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.opKota}}</div>
				</div>						
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">Harga/Referensi</div>
					<div class="col-md-6"><input v-model="data.hargaReferensi" class="form-control" disabled/></div>
				</div>
			</div>		
		</div>
		<div class="row">	
			<div class="col-1">
				<div>&nbsp;</div>
			</div>
			<div class="col-xl">
				<div>&nbsp;</div>
				<div><strong>Penghitungan NJOP PBB :</strong></div>
				<div>&nbsp;</div>
				<div class="table-responsive-sm">
					<table class="table">
						<thead>
							<tr>
							<th scope="col">Uraian</th>
							<th scope="col" colspan="3" style="text-align: center">Luas</th>
							<th scope="col" colspan="2" style="text-align: center">NJOP PBB/m<sup>2</sup></th>
							<th scope="col" colspan="2" style="text-align: center">Luas * NJOP PBB/m<sup>2</sup></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Tanah (bumi)</th>
								<th style="width: 10px;">7&nbsp;&nbsp;| </th>
								<td style="text-align: center; width: 50px;">{{ data.opLuasTanah }}</td>
								<th style="text-align: right; width: 10px;">m<sup>2</sup></th>
								<th style="width: 10px;">9&nbsp;&nbsp;| </th>
								<td style="text-align: right; width: 200px;">{{ data.njopLuasTanah }}</td>
								<th style="width: 10px;">11&nbsp;| </th>
								<td style="text-align: right;">{{ totalNJOPLB_F }}<br/><span style="font-size:7.0pt">angka 7 * angka 9</span></td>
							</tr>
							<tr>
								<th scope="row">Bangunan</th>
								<th style="width: 10px;">8&nbsp;&nbsp;| </th>
								<td style="text-align: center; width: 50px;">{{ data.opLuasBangunan }}</td>
								<th style="text-align: right; width: 10px;">m<sup>2</sup></th>
								<th style="width: 10px;">10&nbsp;| </th>
								<td style="text-align: right; width: 200px;">{{ data.njopLuasBangunan }}</td>
								<th style="width: 10px;">12&nbsp;| </th>
								<td style="text-align: right;">{{ totalNJOPLBB_F }}<br/><span style="font-size:7.0pt">angka 8 * angka 10</span></td>
							</tr>
							<tr>
								<th scope="row">&nbsp;</th>
								<th style="width: 10px;">&nbsp;</th>
								<td style="text-align: center; width: 50px;">&nbsp;</td>
								<th style="text-align: right; width: 10px;">&nbsp;</th>
								<th style="width: 10px;">&nbsp;</th>
								<td style="text-align: right; width: 200px;">NJOP PBB : </td>
								<th style="width: 10px;">13&nbsp;| </th>
								<td style="text-align: right;">{{ nilaiTotalOp_F }}<br/><span style="font-size:7.0pt">angka 11 + angka 13</span></td>
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
					<div class="col-md-6 col-lg-10 col-xl-8">15. Jenis perolehan hak atas tanah dan atau bangunan</div>
					<div class="col-md-3 col-lg-2 col-xl-4"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.jenisPerolehanOp}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-10 col-xl-8">16. No. Sertifikasi</div>
					<div class="col-md-3 col-lg-2 col-xl-4"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.noSertifikatOp}}</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-5">14. Harga Transaksi/Nilai Pasar</div>
					<div class="col-md-6 col-lg-2 col-xl-4 align-items-end"><input v-model="nilaiOp_F" class="form-control align-items-end" disabled/></div>
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
									<td>{{ npop_F }}</td>
								</tr>
								<tr>
									<th scope="row">2. NPOPTKP</th>
									<td>{{ npoptkp_F }}</td>
								</tr>
								<tr>
									<th scope="row">3. NPOPKP</th>
									<td>{{ totalNpop_F }}</td>
								</tr>
								<tr>
									<th scope="row">4. Bea Perolehan hak atas tanah dan Bangunan yang terutang</th>
									<td>{{ totalNJOP_F }}</td>
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
					<div class="col-md-3 col-lg-10 col-xl-9" v-if="data.jenisSetoran=='STB'"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.jenisSetoranTanggal}}</div><div class="col-md-3 col-lg-2 col-xl-4" v-else> - </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-2 col-xl-3">Tanggal</div>
					<div class="col-md-3 ccol-lg-10 col-xl-9" v-if="data.jenisSetoran=='SKBKB'"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.jenisSetoranTanggal}}</div><div class="col-md-3 col-lg-2 col-xl-4" v-else> - </div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-2 col-xl-3">Tanggal</div>
					<div class="col-md-3 col-lg-10 col-xl-9" v-if="data.jenisSetoran=='SKBKBT'"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.jenisSetoranTanggal}}</div><div class="col-md-3 col-lg-2 col-xl-4" v-else> - </div>
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
					<div class="col-md-10 col-lg-10 col-xl-8"><strong>JUMLAH YANG DISETOR (dengan angka) :</strong></div>
					<div class="col-md-10 col-lg-10 col-xl-8"><strong>{{ totalNJOP_F }}</strong></div>
					<div class="col-md-10 col-lg-10 col-xl-8">&nbsp;</div>
					<div class="col-md-10 col-lg-10 col-xl-8">&nbsp;</div>
					<div class="col-md-10 col-lg-10 col-xl-8"><span style="font-size:7.0pt">(berdasarkan perhitungan C.4 dam pilihan di D)</span></div>
				</div>
			</div>		
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-10 col-lg-10 col-xl-8"><strong>(dengan huruf) :</strong></div>
					<div class="col-md-10 col-lg-10 col-xl-8">&nbsp;</div>
					<div class="col-md-10 col-lg-10 col-xl-8 w-100"><textarea  class="form-control" v-model="totalNJOPTerbilang" rows="3" disabled></textarea></div>
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
			<strong>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">Nama Petugas Lapangan</div>
					<div class="col-md-6 col-lg-6 col-xl-6">{{ data.namaPetugasLapangan }}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">Gambar OP</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.gambarInt'" v-if="data.gambarInt">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">a. SSPD</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranSspd'" v-if="data.lampiran.lampiranSspd">{{ data.lampiran.noSspd }}</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">b. Scan SPPT dan STTS/Struk ATM bukti pembayaran</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranSppt'" v-if="data.lampiran.lampiranSppt">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">PBB/Bukti Pembayaran PBB</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranIdentitasLainya'" v-if="data.lampiran.lampiranIdentitasLainya">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">c. Scan Identitas Wajib Pajak</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranFotocopiIdentitas'" v-if="data.lampiran.lampiranFotocopiIdentitas">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">d. Surat Kuasa Dari Wajib Pajak</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranSuratKuasaWp'" v-if="data.lampiran.lampiranSuratKuasaWp">Link</a></div>
					<div class="row g-0 mb-3">&nbsp;</div>
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
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranFotocopyIdentitasKwp'" v-if="data.lampiran.lampiranFotocopyIdentitasKwp">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">f. Scan kartu NPWP</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranFotocopyKartuNpwp'" v-if="data.lampiran.lampiranFotocopyKartuNpwp">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">g. Scan Akta Jual Beli / Hibah / Waris</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranFotocopyAktaJb'" v-if="data.lampiran.lampiranFotocopyAktaJb">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">h. Scan Sertifikat / Keterangan Kepemilikan Tanah</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranSertifikatKepemilikanTanah'" v-if="data.lampiran.lampiranSertifikatKepemilikanTanah">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">i. Scan Keterangan Waris</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranFotocopyKeteranganWaris'" v-if="data.lampiran.lampiranFotocopyKeteranganWaris">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">j. Scan Surat Pernyataan</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranFotocopySuratPernyataan'" v-if="data.lampiran.lampiranFotocopySuratPernyataan">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">k. Scan SPOP/LSPOP</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranSpoplspop'" v-if="data.lampiran.lampiranSpoplspop">Link</a></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-6 col-xl-6">l. Identitas lainya</div>
					<div class="col-md-6 col-lg-6 col-xl-6"><a v-bind:href="'data.lampiran.lampiranLainnya'" v-if="data.lampiran.lampiranLainnya">Link</a></div>
				</div>
			</div>	
			</strong>			
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="text-center">
					<div>.................., tgl {{ data.tanggal }}</div>
					<div>WAJIB PAJAK / PENYETOR</div>
					<div class="border-bottom">&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div class="border-bottom">{{ data.namaWp }}</div>
					<div>Nama lengkap dan tanda tangan</div>
				</div>
			</div>	
			<div class="col-xl">
				<div class="text-center">
					<div>MENGETAHUI</div>
					<div>PPAT Notaris</div>
					<div class="border-bottom">&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div class="border-bottom">PPAT NO{{ data.ppat_id}}</div>
					<div>Nama lengkap, stempel dan tanda tangan</div>
				</div>
			</div>	
			<div class="col-xl">
				<div class="text-center">
					<div>DITERIMA OLEH :</div>
					<div>TEMPAT PEMBAYARAN BPHTB</div>
					<div class="border-bottom">Tanggal :</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div class="border-bottom">&nbsp;</div>
					<div>Nama lengkap, stempel dan tanda tangan</div>
				</div>
			</div>	
			<div class="col-xl">
				<div class="text-center">
					<div>Telah diverifikasi :</div>
					<div class="border-bottom">An. Kepala Badan Pendapatan Daerah Kota Malang Kepala Bidang Pajak Daerah</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div class="border-bottom">&nbsp;</div>
					<div>Nama lengkap, stempel dan tanda tangan</div>
				</div>
			</div>				
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


