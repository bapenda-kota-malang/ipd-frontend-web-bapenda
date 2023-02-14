<div class="card mb-4">
	<div class="card-header">
		Filter
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-4 pt-1">
						Provinsi
					</div>
					<div class="col-md mb-2">
						<textarea class="form-control" disabled></textarea>
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-6 xc-xl-4 pt-1">
						Dati II
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
						Kecamatan
					</div>
					<div class="col-md mb-2">
						<input class="form-control" disabled />
					</div>
				</div>
				<div class="row g-1">
					<div class="xc-md-8 xc-lg-7 xc-xl-6 pt-1 text-lg-end pe-2">
						Kelurahan
					</div>
					<div class="col-md mb-2">
						<input class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">
		Cari Blok
	</div>
	<div class="xc-md-4 xc-lg-3 xc-xl-2">
		<input type="text" class="form-control">
	</div>
</div>

<table class="table fit-form-control">
	<thead>
		<tr>
			<th class="text-center">Blok NOP</th>
			<th class="text-center">Letak OP</th>
			<th class="text-center">Nama WP</th>
			<th class="text-center">No. Bgn.</th>
			<th class="text-center">Nilai Individu</th>
			<th class="text-center">Nilai Sistem</th>
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
			<td><input class="form-control"></td>
		</tr>
		<?php } ?>
	</tbody>
</table>