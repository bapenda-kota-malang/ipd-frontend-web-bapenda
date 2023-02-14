<div class="card mb-4">
	<div class="card-header">
		Filter
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-4 pt-1">
						NOP Bersama
					</div>
					<div class="col-md mb-2">
						<?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-4 pt-1">
						Alamat OP
					</div>
					<div class="col-md mb-2">
						<textarea class="form-control" disabled></textarea>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-4 pt-1">
						Alamat OP
					</div>
					<div class="col-md mb-2">
						<input class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row mb-3">
					<div class="col">&nbsp;</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-7 xc-xl-6 pt-1 text-lg-end pe-2">
						Luas Bangunan
					</div>
					<div class="col-md mb-2">
						<input class="form-control w-50" disabled />
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-7 xc-xl-6 pt-1 text-lg-end pe-2">
						Luas Bumi
					</div>
					<div class="col-md mb-2">
						<input class="form-control w-50" disabled />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<table class="table fit-form-control">
	<thead>
		<tr>
			<th class="text-center">NOP Anggota</th>
			<th class="text-center">Nama Wajib Pajak</th>
			<th class="text-center">L. Bumi Beban</th>
			<th class="text-center">L. Bgn. Beban</th>
			<th class="text-center">LJOP</th>
		</tr>
	</thead>
	<tbody>
		<?php for($i=1; $i<10; $i++){ ?>
		<tr>
			<td><input class="form-control"></td>
			<td><input class="form-control"></td>
			<td><input class="form-control"></td>
			<td><input class="form-control"></td>
			<td><input class="form-control"></td>
		</tr>
		<?php } ?>
	</tbody>
</table>