<?php

use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/sptpd/list.js?v=20221108a');

?>
<!-- <ul class="nav nav-pills justify-content-center mb-3">
	<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="#">Semua</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Baru</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Pembayaran</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Penyetoran</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Jatuh Tempo</a>
	</li>
</ul> -->
<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>No SPTPD</th>
			<th>Tanggal</th>
			<th>Masa Pajak</th>
			<th>Jatuh Tempo</th>
			<th>Pajak/Retribusi</th>
			<th>NPWPD</th>
			<th>Nama Wajib Pajak</th>
			<th>Jumlah Pajak</th>
			<th>Status</th>
			<th style="width:120px"></th>
		</tr>
		<tbody>
			<tr>
				<td><input type="checkbox" /></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<td><?= '...' ?></td>
				<!-- <td class="text-center">
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
				</td> -->
			</tr>
		</tbody>
	</thead></table>
