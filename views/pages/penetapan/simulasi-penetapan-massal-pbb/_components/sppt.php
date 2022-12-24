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

$this->registerJsFile('@web/js/dto/spptsimulasi/simulasi.js?v=20221206a');
$this->registerJsFile('@web/js/dto/spptsimulasi/spptsimulasi.js?v=20221206a');
$this->registerJsFile('@web/js/services/spptsimulasi/spptsimulasi.js?v=20221206b');

?>
<div class="card mb-4">
	<div class="card-header">Cari</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-2 col-lg-2 col-xl-3">NOP</div>
					<div class="col-md-9 col-lg-10 col-xl-9 t-1">
						<table><tbody>
							<tr>
								<td style="width: 35px;"><input v-model="data2.provinsiID" class="form-control"/></td>
								<td style="width: 35px;"><input v-model="data2.kotaID" class="form-control"/></td>
								<td style="width: 42px;"><input v-model="data2.kecamatanID" class="form-control"/></td>
								<td style="width: 42px;"><input v-model="data2.kelurahanID" class="form-control"/></td>
								<td style="width: 42px;"><input v-model="data2.blokID" class="form-control"/></td>
								<td style="width: 48px;"><input v-model="data2.noUrut" class="form-control"/></td>
								<td style="width: 26px;"><input v-model="data2.jenisOpId" class="form-control"/></td>
							</tr>
						</tbody></table>
					</div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-xl-7">
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-2 col-xl-3">Tahun Pajak</div>
							<div class="col-md-9 col-lg-10 col-xl-9 align-items-right">
								<div class="w-25 align-self-end">
									<input v-model="data2.tahunPajak" class="form-control" @input="submitGetData"/>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>				
		</div>
	</div>				
</div>
<div class="card mb-4">
	<div class="card-header">SPPT</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Letak Tanah Atau Bangunan</div>
					<div class="col-md-6 col-lg-19 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.blokKavNoWP_sppt}}</div>
				</div>		
				<div class="row g-0 mb-3">	
					<div class="col-xl">		
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-3 col-xl-4"> RT/RW</div>
							<div class="col-md-6 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.rtWP_sppt}}/{{data.rwWP_sppt}}</div>
						</div>	
					</div>	
					<div class="col-xl">		
						<div class="row g-0 mb-3">
							<div class="col-md-2 col-lg-3 col-xl-4"> Persil</div>
							<div class="col-md-6 col-lg-10 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.noPersil_sppt}}</div>
						</div>	
					</div>	
				</div>	
			</div>	
			<div class="col-xl">			
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Nama Wajib Pajak</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.namaWP_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Alamat Wajib Pajak</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.jalanWPskp_sppt}}</div>
				</div>
			</div>				
		</div>
        <hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-xl">
				<div>&nbsp;</div>
				<div><strong>Penghitungan NJOP :</strong></div>
				<div>&nbsp;</div>
				<div class="table-responsive-sm">
					<table class="table">
						<thead>
							<tr>
							<th scope="col">Uraian</th>
							<th scope="col" colspan="2" style="text-align: center">Luas/m<sup>2</sup></th>
							<th scope="col" colspan="1" style="text-align: center">Kelas</th>
							<th scope="col" colspan="1" style="text-align: center">NJOP/m<sup>2</sup></th>
							<th scope="col" colspan="1" style="text-align: center">Luas * NJOP/m<sup>2</sup></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Tanah (bumi)</th>
								<td style="text-align: center; width: 50px;">{{ data.luasBumi_sppt }}</td>
								<th style="text-align: right; width: 10px;">m<sup>2</sup></th>
								<td style="text-align: center; width: 50px;">{{ data.KelasTanah_Id }}</th>
								<td style="text-align: right; width: 200px;">{{ totalTanahM2 }}</td>
								<td style="text-align: right;">{{ data.njopBumi_sppt }}<br/><span style="font-size:7.0pt">angka 7 * angka 9</span></td>
							</tr>
							<tr>
								<th scope="row">Bangunan</th>
								<td style="text-align: center; width: 50px;">{{ data.luasBangunan_sppt }}</td>
								<th style="text-align: right; width: 10px;">m<sup>2</sup></th>
								<td style="text-align: center; width: 50px;">{{ data.KelasBangunan_Id }}</th>
								<td style="text-align: right; width: 200px;">{{ totalBangunanM2 }}</td>
								<td style="text-align: right;">{{ data.njopBangunan_sppt }}<br/><span style="font-size:7.0pt">angka 8 * angka 10</span></td>
							</tr>
							<tr>
								<th scope="row">Tanah (bumi) *</th>
								<td style="text-align: center; width: 50px;">0</td>
								<th style="text-align: right; width: 10px;">m<sup>2</sup></th>
								<td style="text-align: center; width: 50px;">0</th>
								<td style="text-align: right; width: 200px;">0</td>
								<td style="text-align: right;">0<br/><span style="font-size:7.0pt">angka 7 * angka 9</span></td>
							</tr>
							<tr>
								<th scope="row">Bangunan *</th>
								<td style="text-align: center; width: 50px;">0</td>
								<th style="text-align: right; width: 10px;">m<sup>2</sup></th>
								<td style="text-align: center; width: 50px;">0</th>
								<td style="text-align: right; width: 200px;">0</td>
								<td style="text-align: right;">0<br/><span style="font-size:7.0pt">angka 8 * angka 10</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">				
			<div class="col-xl">				
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Jumlah NJOP Bumi</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.njopBumi_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Jumlah NJOP Bangunan</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.njopBangunan_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> NJOP Sebagai Dasar Pengenaan PBB</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.njop_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> BTKP / NJOPTKP</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.njopTKP_sppt}}</div>
				</div>							
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Nilai Jual Kena Pajak</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.njKPskp_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Pajak Bumi dan Bangunan Terhutang</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.pbbTerhutang_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Factor Pengurang</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.faktorpengurangan_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Pajak Bumi dan Bangunan yang Harus Dibayar</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.pbbYgHarusDibayar_sppt}}</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Denda yang Harus Dibayar</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Pajak Bumi dan Bangunan yang Telah Dibayar</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Selisih [Kurang Bayar]</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</div>
				</div>
			</div>
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-xl">				
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Tanggal Jatuh Tempo/Tempat Pembayaran</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.tanggalJatuhTempo_sppt}}</div>
				</div>
			</div>
			<div class="col-xl">		
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-9 col-xl-8"> / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.kppbbBank_Id}}</div>
				</div>
			</div>	
		</div>
		<hr class="gray_line mt10 mb10"/>
		<div class="row">
			<div class="col-xl">				
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> Tanggal Terbit</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.tanggalTerbit_sppt}}</div>
				</div>
			</div>
			<div class="col-xl">		
				<div class="row g-0 mb-3">
					<div class="col-md-6 col-lg-3 col-xl-4"> Tanggal Cetak</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.tanggalCetak_sppt}}</div>
				</div>
			</div>	
			<div class="col-xl">		
				<div class="row g-0 mb-3">
					<div class="col-md-4 col-lg-3 col-xl-4"> NIP Pencetak</div>
					<div class="col-md-6 col-lg-9 col-xl-8"> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{data.nipPencetakan_sppt}}</div>
				</div>
			</div>	
			<div class="col-xl">		
				<div class="row g-0 mb-3">
					<div class="col-6">&nbsp;</div>
					<div class="col-6">
						<a href="sppt" class="btn bg-blue-300">
							<i class="bi bi-check-left"></i> Kembali 
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />


