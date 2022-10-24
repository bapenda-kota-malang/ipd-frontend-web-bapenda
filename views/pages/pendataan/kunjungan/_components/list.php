<?php

include Yii::getAlias('@dummyDataPath').'/global.php';

?>
<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Nomor</th>
			<th>Jenis Usaha</th>
			<th>Nama Objek Pajak</th>
			<th>Nama Pemilik</th>
			<th>Kecamatan</th>
			<th>Kelurahan</th>
			<th>Petugas</th>
			<th>Tanggal</th>
			<th style="width:90px"></th>
		</tr>
		<tbody>
			<?php foreach($globalData  as $item) { ?>
			<tr>
				<td><input type="checkbox" /></td>
				<td><?= $item->code ?></td>
				<td><?= $item->jenisUsaha ?></td>
				<td><?= $item->in2 ?></td>
				<td><?= $item->namaLengkap ?></td>
				<td><?= $item->district ?></td>
				<td><?= $item->village ?></td>
				<td><?= $item->opt_user_name ?></td>
				<td><?= $item->date1 ?></td>
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
	</thead></table>
