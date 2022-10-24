<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="relasi-tab" data-bs-toggle="tab" data-bs-target="#relasi-tab-pane" type="button" role="tab" aria-controls="relasi-tab-pane" aria-selected="true">Relasi NOP - NPWP</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload-tab-pane" type="button" role="tab" aria-controls="upload-tab-pane" aria-selected="false">Upload NPWP</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="daftar-tab" data-bs-toggle="tab" data-bs-target="#daftar-tab-pane" type="button" role="tab" aria-controls="daftar-tab-pane" aria-selected="false">Daftar NOP-NPWP</button>
	</li>
</ul>
<div class="tab-content border p-3" id="myTabContent" style="border-top:none!important">
	<div class="tab-pane fade show active" id="relasi-tab-pane" role="tabpanel" aria-labelledby="relasi-tab" tabindex="0">
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xl-2 pt-2">
				NOP
			</div>
			<div class="col-md mb-2">
				<?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xl-2 pt-2">
				Nama WP
			</div>
			<div class="col-md col-lg-7 col-xl-6 col-xxl-5 mb-2">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xl-2 pt-2">
				Alamat WP
			</div>
			<div class="col-md mb-2">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xl-2 pt-2">
				Alamat OP
			</div>
			<div class="col-md mb-2">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xl-2 pt-2">
				NPWP
			</div>
			<div class="col-md-4 col-xl-3 col-xxl-2 mb-2">
				<div class="row g-1">
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-3"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-md-4 col-xl-3 col-xxl-2 mb-2">
				<div class="row g-1">
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-3"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xl-2 pt-2">
				NIP/Nama Perekam
			</div>
			<div class="col-md-3 col-xl-2 mb-2">
				<input type="text" class="form-control">
			</div>
			<div class="col-md col-lg-7 col-xl-6 col-xxl-5 mb-2">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-3 col-lg-2 col-xl-2 pt-2">
				Tgl Rekam
			</div>
			<div class="col-md-3 col-xl-2 mb-2">
				<input type="text" class="form-control">
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="upload-tab-pane" role="tabpanel" aria-labelledby="upload-tab" tabindex="0">
		<div class="row">
			<div class="col col-lg-5 col-xl-4 col-xxl3">
				<div class="text-center bg-blue p-2">Nomor Objek Pajak</div>
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
			</div>
			<div class="col col-lg-5 col-xl-4 col-xxl3">
				<div class="text-center bg-blue p-2">Nomor POkok Wajib Pajak</div>
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
				<input type="text" class="form-control">
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="daftar-tab-pane" role="tabpanel" aria-labelledby="daftar-tab" tabindex="0">
		<div class="row mb-3">
			<div class="col-lg-5 col-xl-3 pt-2">Filter Berdasarkan Wilayah</div>
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-1">
						<input type="text" class="form-control">
					</div>
					<div class="col-1">
						<input type="text" class="form-control">
					</div>
					<div class="col-1">
						<input type="text" class="form-control">
					</div>
					<div class="col-1">
						<input type="text" class="form-control">
					</div>
					<div class="col">
						<input type="text" class="form-control">
					</div>
					<div class="col-1">
						<button class="btn bg-blue">OK</button>
					</div>
				</div>
			</div>
		</div>
		<table class="w-100">
			<thead>
				<tr>
					<td class="p-2 bg-blue text-center" style="width:150px">NOP</td>
					<td class="p-2 bg-blue text-center" style="width:150px">NPWP</td>
					<td class="p-2 bg-blue text-center">Nama WP</td>
					<td class="p-2 bg-blue text-center">Alamat WP</td>
					<td class="p-2 bg-blue text-center">Alamat OP</td>
				</tr>
			</thead>
			<tbody>
				<?php for($i=1; $i<=10; $i++) { ?>
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

