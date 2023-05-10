<?php

$data = [
	['A-2201500', 'Rp. XXX.XXX', '01-09-2022', 'September 2022'],
	['A-2201400', 'Rp. XXX.XXX', '01-08-2022', 'Agustus 2022'],
	['A-2201300', 'Rp. XXX.XXX', '01-07-2022', 'July 2022'],
	['A-2201200', 'Rp. XXX.XXX', '01-06-2022', 'Juni 2022'],
	['A-2201100', 'Rp. XXX.XXX', '01-05-2022', 'Mei 2022'],
]

?>
<table class="table custom">
	<thead>
		<tr>
			<th>No SPTPD/SKPDKB</th>
			<th>Nominal</th>
			<th>Tanggal Pembayaran</th>
			<th>Masa Pajak</th>
		</tr>
	<tbody>
		<?php foreach ($data as $item) { ?>
			<tr>
				<td><?= $item[0] ?></td>
				<td><?= $item[1] ?></td>
				<td><?= $item[2] ?></td>
				<td><?= $item[3] ?></td>
			</tr>
		<?php } ?>
	</tbody>
	</thead>
</table>

