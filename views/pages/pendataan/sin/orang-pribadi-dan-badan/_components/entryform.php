<div class="card">
	<div class="p-3">
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xxl-1 pt-2">
				NOP
			</div>
			<div class="col-md mb-2">
			<?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?></div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xxl-1 pt-2">
				Nama
			</div>
			<div class="col-md col-lg-7 col-xl-6 col-xxl-5 mb-2">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xxl-1 pt-2">
				Alamat OP
			</div>
			<div class="col-md-9 col-lg mb-1">
				<input type="text" class="form-control">
			</div>
			<div class="col-md-3 col-lg-1 pt-2 text-lg-end">
				RT/RW
			</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<div class="row g-1">
					<div class="col"><input type="text" class="form-control"></div>
					<div class="col"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xxl-1 pt-2">
				Alamat WP
			</div>
			<div class="col-md-9 col-lg mb-1">
				<input type="text" class="form-control">
			</div>
			<div class="col-md-3 col-lg-1 pt-2 text-lg-end">
				RT/RW
			</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<div class="row g-1">
					<div class="col"><input type="text" class="form-control"></div>
					<div class="col"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xxl-1 pt-2">
				Jenis SIN
			</div>
			<div class="col-md col-lg-4 col-xl-3 col-xxl-2 mb-2">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xxl-1 pt-2">
				Bangunan
			</div>
			<div class="col-md col-lg-4 col-xl-3 col-xxl-2">
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1"><</span>
					<input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
					<span class="input-group-text" id="basic-addon2">></span>
				</div>
			</div>
		</div>
	</div>
</div>

<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="sertifikat-tab" data-bs-toggle="tab" data-bs-target="#sertifikat-tab-pane" type="button" role="tab" aria-controls="sertifikat-tab-pane" aria-selected="true">Sertifikat</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="pam-tab" data-bs-toggle="tab" data-bs-target="#pam-tab-pane" type="button" role="tab" aria-controls="pam-tab-pane" aria-selected="false">PAM</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="listrik-tab" data-bs-toggle="tab" data-bs-target="#listrik-tab-pane" type="button" role="tab" aria-controls="listrik-tab-pane" aria-selected="false">Listrik</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="gas-tab" data-bs-toggle="tab" data-bs-target="#gas-tab-pane" type="button" role="tab" aria-controls="gas-tab-pane" aria-selected="false">Gas</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="telpon-tab" data-bs-toggle="tab" data-bs-target="#telpon-tab-pane" type="button" role="tab" aria-controls="telpon-tab-pane" aria-selected="false">Telpon</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="kendaraan-tab" data-bs-toggle="tab" data-bs-target="#kendaraan-tab-pane" type="button" role="tab" aria-controls="kendaraan-tab-pane" aria-selected="false">Kendaraan</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="imb-tab" data-bs-toggle="tab" data-bs-target="#imb-tab-pane" type="button" role="tab" aria-controls="imb-tab-pane" aria-selected="false">IMB</button>
	</li>
</ul>
<div class="tab-content border p-3" id="myTabContent" style="border-top:none!important">
	<div class="tab-pane fade show active" id="sertifikat-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
		<table class="w-100">
			<column>
				<col style="width:60px">
				<col>
				<col style="width:60px">
				<col>
				<col style="width:120px">
				<col>
			</column>
			<thead>
				<tr>
					<th class="text-center">No Bumi</th>
					<th colspan="2" class="text-center">No Sertifikat</th>
					<th class="text-center">Jenis Hak</th>
					<th class="text-center">Tgl Sertifikat</th>
					<th class="text-center">Nama Sertifikat</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0;$i<5;$i++) { ?>
				<tr>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade show" id="pam-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
		<div class="row g-1">
			<div class="col-4 col-lg-3 col-xl-2">
				<div>No Pelanggan PAM</div>
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
			</div>
			<div class="col-4 col-lg-3 col-xl-2 text-center">
				Tahun Tagihan
				<div class="row">
					<div class="col-3"></div>
					<div class="col">
						<input type="text" class="form-control">
					</div>
					<div class="col-3"></div>
				</div>
			</div>
			<div class="col-4">
				<table class="w-100">
					<thead>
						<tr>
							<td class="text-center">Tahun</td>
							<td class="text-center">Bulan</td>
							<td class="text-center">Tagihan</td>
						</tr>
					</thead>
					<tbody>
						<?php for($i=0;$i<12;$i++) { ?>
						<tr>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="tab-pane fade show" id="listrik-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
		<div class="row g-1">
			<div class="col-4 col-lg-3 col-xl-2">
				<div>No Pelanggan Listrik</div>
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
			</div>
			<div class="col-4 col-lg-3 col-xl-2 text-center">
				Tahun Tagihan
				<div class="row">
					<div class="col-3"></div>
					<div class="col">
						<input type="text" class="form-control">
					</div>
					<div class="col-3"></div>
				</div>
			</div>
			<div class="col-4">
				<table class="w-100">
					<thead>
						<tr>
							<td class="text-center">Tahun</td>
							<td class="text-center">Bulan</td>
							<td class="text-center">Tagihan</td>
						</tr>
					</thead>
					<tbody>
						<?php for($i=0;$i<12;$i++) { ?>
						<tr>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="tab-pane fade show" id="gas-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
		<div class="row g-1">
			<div class="col-4 col-lg-3 col-xl-2">
				<div>No Pelanggan Gas</div>
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
			</div>
			<div class="col-4 col-lg-3 col-xl-2 text-center">
				Tahun Tagihan
				<div class="row">
					<div class="col-3"></div>
					<div class="col">
						<input type="text" class="form-control">
					</div>
					<div class="col-3"></div>
				</div>
			</div>
			<div class="col-4">
				<table class="w-100">
					<thead>
						<tr>
							<td class="text-center">Tahun</td>
							<td class="text-center">Bulan</td>
							<td class="text-center">Tagihan</td>
						</tr>
					</thead>
					<tbody>
						<?php for($i=0;$i<12;$i++) { ?>
						<tr>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="tab-pane fade show" id="telpon-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
		<div class="row g-1">
			<div class="col-4 col-lg-3 col-xl-2">
				<div>No Pelanggan Telpon</div>
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
			</div>
			<div class="col-4 col-lg-3 col-xl-2 text-center">
				Tahun Tagihan
				<div class="row">
					<div class="col-3"></div>
					<div class="col">
						<input type="text" class="form-control">
					</div>
					<div class="col-3"></div>
				</div>
			</div>
			<div class="col-4">
				<table class="w-100">
					<thead>
						<tr>
							<td class="text-center">Tahun</td>
							<td class="text-center">Bulan</td>
							<td class="text-center">Tagihan</td>
						</tr>
					</thead>
					<tbody>
						<?php for($i=0;$i<12;$i++) { ?>
						<tr>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="tab-pane fade show" id="kendaraan-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
		<table class="w-100">
			<column>
				<col style="width:120px">
				<col style="width:60px">
				<col style="width:160px">
				<col>
				<col style="width:120px">
				<col>
				<col style="width:50px">
				<col>
			</column>
			<thead>
				<tr>
					<th class="text-center">No Polisi</th>
					<th colspan="2" class="text-center">Jenis Kendaraan</th>
					<th class="text-center">Merk</th>
					<th class="text-center">Tahun</th>
					<th class="text-center">Nama Pemilik</th>
					<th class="text-center">Status</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0;$i<5;$i++) { ?>
				<tr>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade show" id="imb-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
	<table class="w-100">
			<column>
				<col style="width:120px">
				<col style="width:50px">
				<col style="width:160px">
				<col style="width:120px">
				<col>
				<col>
				<col style="width:50px">
				<col>
			</column>
			<thead>
				<tr>
					<th colspan="2" class="text-center">No IMB</th>
					<th class="text-center">Jenis IMB</th>
					<th class="text-center">Tgl</th>
					<th class="text-center">Nama</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0;$i<5;$i++) { ?>
				<tr>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
