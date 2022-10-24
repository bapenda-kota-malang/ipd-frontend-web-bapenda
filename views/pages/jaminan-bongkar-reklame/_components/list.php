<?php 

$data = [
	['JB-121400013', 'D-12311', 'Dolor Sit Amet', '2022-12-11', 102100, 'Sinka Doula', 510200, 102100, 'Sinka Doula', 'Vast'],
	['JB-123490011', 'D-22919', 'Lis Duanis', '2022-04-18', 102100, 'Sinka Doula', 810200, 102100, 'Sinka Doula', 'Major'],
	['JB-121123111', 'D-19912', 'Sita Meta',  '2022-10-21', 102100, 'Sinka Doula', 210200, 102100, 'Sinka Doula', 'Tryna'],
]

?>
<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>No. Jaminan Bongkar</th>
			<th>No. SKPD</th>
			<th>Nama WP</th>
			<th>Tgl</th>
			<th>Batas Pengambilan</th>
			<th>Jenis Reklame</th>
			<th>Nominal</th>
			<th>Status</th>
			<th>Nama User</th>
			<th>Nama Rekening</th>
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
