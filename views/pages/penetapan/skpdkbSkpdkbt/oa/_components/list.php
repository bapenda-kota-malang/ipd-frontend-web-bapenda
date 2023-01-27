<?php

use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/skpdkb-skpdkbt/oa/list.js?v=20221117a');

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
		<tr v-for="(val, key) in data">
			<td><input type="checkbox" /></td>
			<td>{{val.NomorSpt}}</td>
			<td>{{val.npwpd_Id}}</td>
			<td>{{val.objekPajak?.nama}}</td>
			<td>{{val.rekening?.jenis}}</td>
			<td>{{val.periodeAwal}}</td>
			<td>{{val.periodeAkhir}}</td>
			<td>{{val.jumlahPajak}}</td>
			<td>{{val.kenaikan}}</td>
			<td>{{val.pengurangan}}</td>
			<td>{{val.bunga}}</td>
			<td>{{val.denda}}</td>
			<td>{{val.jumlahPajak}}</td>
			<td>{{val.tanggalSpt}}</td>
			<td>{{val.jatuhTempo}}</td>
			<td>{{val.jatuhTempo}}</td>
			<td>{{val.kabid?.name}}</td>
			<td>{{val.keteranganPajak}}</td>
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
	</tbody>
	</thead>
</table>