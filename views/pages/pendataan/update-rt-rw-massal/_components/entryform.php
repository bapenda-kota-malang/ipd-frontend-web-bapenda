<div class="row">
	<div class="col-lg-6">
		<?php 
		$title = 'Paramter Utama';
		include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock-col2.php');
		?>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">
				Perubahan Data
			</div>
			<div class="p-3">
				<table style="font-size:9pt">
					<thead>
						<tr>
							<th class="text-center"></th>
							<th class="text-center" style="width:60px">Blok</th>
							<th class="text-center" style="width:60px">Urut</th>
							<th class="text-center" style="width:30px"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="padding-right:50px">Kode Blok/Urut Awal</td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
						</tr>
						<tr>
							<td style="padding-right:50px">Kode Blok/Urut Akhir</td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
							<td><input type="text" class="form-control"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="d-none d-lg-block" style="height:114px"></div>
		</div>
	</div>
</div>
