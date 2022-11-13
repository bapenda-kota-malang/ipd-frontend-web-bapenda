<?php

use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/sptpd/list.js?v=20221114b');

?>
<!-- <ul class="nav nav-pills justify-content-center mb-3">
	<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="#semua">Semua</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#baru">Baru</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#pembayaran">Pembayaran</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#peyetoran">Penyetoran</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#jatuhtempo">Jatuh Tempo</a>
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
			<tr v-if="data.length==0">
				<td colspan="11" class="p-4 text-center">Tidak ada data</td>
			</tr>
			<tr v-for="item in data">
				<td><input type="checkbox" /></td>
				<td>{{item.NomorSpt}}</td>
				<td>{{item.createdAt}}</td>
				<td>{{item.periodeAkhir + ' s/d ' + item.periodeAkhir}}</td>
				<td>{{item.jatuhTempo}}</td>
				<td>{{item.rekening_id}}</td>
				<td>{{item.npwpd_Id}}</td>
				<td>{{'-'}}</td>
				<td>{{item.jumlahPajak}}</td>
				<td>{{item.status}}</td>
				<td class="text-center">
					<!-- <div class="btn-group">
						<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Aksi
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Detail</a></li>
							<li><a class="dropdown-item" href="#">Edit</a></li>
							<li><a class="dropdown-item" href="#">Hapus</a></li>
						</ul>
					</div> -->
				</td>
			</tr>
		</tbody>
	</thead>
</table>

<input type="hidden" id="objekPajak" value="<?= $objekPajak ?>" />
