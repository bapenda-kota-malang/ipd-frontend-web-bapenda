<?php

include Yii::getAlias('@dummyDataPath') . '/global.php';

?>
<div class="table-responsive">
	<table class="table custom">
		<thead>
			<tr>
				<th style="width:40px"><input class="form-check-input" type="checkbox" value=""></th>
				<th>No SKP</th>
				<th>NPWPD</th>
				<th>Nama WP</th>
				<th>Rekening</th>
				<th>Periode Awal</th>
				<th>Periode Akhir</th>
				<th>Jumlah SKPD</th>
				<th>Kenaikan</th>
				<th>Pengurang</th>
				<th>Bunga</th>
				<th>Denda</th>
				<th>Jumlah</th>
				<th>Tgl Penetapan</th>
				<th>Batas Bayar</th>
				<th>Dasar Penetapan</th>
				<th>Nama User</th>
				<th>Keterangan</th>
				<th style="width:90px"></th>
			</tr>
		<tbody>
			<?php foreach ($globalData  as $item) { ?>
				<tr>
					<td><input type="checkbox" /></td>
					<td><?= $item->code ?></td>
					<td><?= $item->npwpd ?></td>
					<td><?= $item->namaLengkap ?></td>
					<td><?= $item->in1 ?></td>
					<td><?= $item->date1 ?></td>
					<td><?= $item->date2 ?></td>
					<td><?= $item->count1 ?></td>
					<td><?= $item->percent1 ?></td>
					<td><?= $item->percent2 ?></td>
					<td><?= $item->percent3 ?></td>
					<td><?= $item->val1 ?></td>
					<td><?= $item->val2 ?></td>
					<td><?= $item->date1 ?></td>
					<td><?= $item->date2 ?></td>
					<td><?= $item->in2 ?></td>
					<td><?= $item->opt_user_name ?></td>
					<td><?= "" ?></td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Detail</a></li>
								<li><a class="dropdown-item" href="#">Edit</a></li>
								<li><a class="dropdown-item" href="#">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
		</thead>
	</table>
</div>