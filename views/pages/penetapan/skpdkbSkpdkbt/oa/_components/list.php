<?php 

$data = [
	['G-12341', '231.241.2341', 'Santo Sembodo', 'Pajak X', '12/10/2022', '12/10/2022', 5623000, 0, 0, 0, 0, 210000, '21/05/2022', '21/07/2022', 'SKPD', 'admin', ''],
	['G-12341', '231.241.2341', 'Santo Sembodo', 'Pajak X', '12/10/2022', '12/10/2022', 5623000, 0, 0, 0, 0, 210000, '21/05/2022', '21/07/2022', 'SKPD', 'admin', ''],
	['G-12341', '231.241.2341', 'Santo Sembodo', 'Pajak X', '12/10/2022', '12/10/2022', 5623000, 0, 0, 0, 0, 210000, '21/05/2022', '21/07/2022', 'SKPD', 'admin', ''],
	['G-12341', '231.241.2341', 'Santo Sembodo', 'Pajak X', '12/10/2022', '12/10/2022', 5623000, 0, 0, 0, 0, 210000, '21/05/2022', '21/07/2022', 'SKPD', 'admin', ''],
	['G-12341', '231.241.2341', 'Santo Sembodo', 'Pajak X', '12/10/2022', '12/10/2022', 5623000, 0, 0, 0, 0, 210000, '21/05/2022', '21/07/2022', 'SKPD', 'admin', ''],
]

?>
<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
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
			<?php foreach($data as $item) { ?>
			<tr>
				<td><input type="checkbox" /></td>
				<td><?= $item[0] ?></td>
				<td><?= $item[1] ?></td>
				<td><?= $item[2] ?></td>
				<td><?= $item[3] ?></td>
				<td><?= $item[4] ?></td>
				<td><?= $item[5] ?></td>
				<td><?= $item[6] ?></td>
				<td><?= $item[7] ?></td>
				<td><?= $item[8] ?></td>
				<td><?= $item[9] ?></td>
				<td><?= $item[10] ?></td>
				<td><?= $item[11] ?></td>
				<td><?= $item[12] ?></td>
				<td><?= $item[13] ?></td>
				<td><?= $item[14] ?></td>
				<td><?= $item[15] ?></td>
				<td><?= $item[16] ?></td>
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
