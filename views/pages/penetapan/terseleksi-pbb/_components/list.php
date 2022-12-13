<?php

$data = [
	['Lorem Ipsum', 'Dolor Sit Amet', 'Vulcanus Salabi'],
	['Draya Alsacari', 'Lis Duanis', 'Elfseria Sama'],
	['Lorem Dogama', 'Sita Meta', 'Drogama'],
]

?>
<div class="alert alert-danger">NOTE: This is dummy data sample</div>
<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Kolom 1</th>
			<th>Kolom 2</th>
			<th>Kolom 3</th>
			<th style="width:120px"></th>
		</tr>
	<tbody>
		<?php foreach ($data as $item) { ?>
			<tr>
				<td><input type="checkbox" /></td>
				<td><?= $item[0] ?></td>
				<td><?= $item[1] ?></td>
				<td><?= $item[2] ?></td>
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