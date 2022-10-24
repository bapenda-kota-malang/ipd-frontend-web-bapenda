<div class="card mb-4">
	<div class="p-3">
		<div class="row g-1">
			<div class="col-xl-1 pt-1">NOP</div>
			<div class="col"><?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?></div>
			<div class="col-xl-1 pt-1">Tahun</div>
			<div class="col-xl-1"><input type="text" class="form-control"></div>
			<div class="col ms-auto"></div>
		</div>
		<hr />
		<div class="row g-1">
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-lg-2 pt-1">No. KTP</div>
					<div class="col pe-lg-5 mb-2">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="row g-1">
					<div class="col-lg-2 pt-1">Alamat OP</div>
					<div class="col pe-lg-5 mb-2">
						<textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
					</div>
				</div>
				<div class="row g-1">
					<div class="col-lg-2 pt-1">RT/RW</div>
					<div class="col-lg-1 mb-2">
						<input type="text" class="form-control">
					</div>
					<div class="col-lg-1 mb-2">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-lg-2 pt-1">Nama WP</div>
					<div class="col pe-lg-5 mb-2">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="row g-1">
					<div class="col-lg-2 pt-1">Alamat WP</div>
					<div class="col pe-lg-5 mb-2">
						<textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="p-3">
		<table style="font-size:9pt">
			<thead>
				<tr>
					<th class="text-center">NOP</th>
					<th class="text-center">Letak OP</th>
					<th class="text-center">Luas Bumi</th>
					<th class="text-center">Luas Bg</th>
					<th class="text-center">NJOP</th>
					<th class="text-center">Bumi</th>
					<th class="text-center">Bgn</th>
					<th class="text-center">Flag NJOPTKP</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i<10; $i++) { ?>
				<tr>
					<td><?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td class="text-center"><input type="checkbox"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>