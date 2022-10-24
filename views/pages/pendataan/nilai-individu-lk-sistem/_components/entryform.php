<?php 
$noRtRw = true;
include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock.php');
?>

<div class="card">
	<div class="p-3">
		<table class="w-100" style="font-size:9pt">
			<thead>
				<tr>
					<th class="text-center">NOP</th>
					<th class="text-center">No Bgn</th>
					<th class="text-center">Luas Bgn</th>
					<th class="text-center">JPB</th>
					<th class="text-center">Kondisi</th>
					<th class="text-center">Jml Data</th>
					<th class="text-center">Konstruksi</th>
					<th class="text-center">Atap</th>
					<th class="text-center">Dinding</th>
					<th class="text-center">Lantai</th>
					<th class="text-center">Langit</th>
					<th class="text-center">Daya Listrik</th>
					<th class="text-center">Nilai Sistem</th>
					<th class="text-center">Nilai Individu</th>
					<th class="text-center">Selisih</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i<10; $i++) { ?>
				<tr>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
					<td><input type="text" class="form-control"></td>
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
</div>