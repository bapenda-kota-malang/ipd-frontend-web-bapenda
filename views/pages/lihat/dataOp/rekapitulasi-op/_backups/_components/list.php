<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

?>

<div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row">
				<div class="col-3 text-left">Provinsi</div>
				<div class="col">
					<select class="form-control">
						<option value="">Pilih Provinsi</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Dati II</div>
				<div class="col">
					<select class="form-control">
						<option value="">Pilih Dati II</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="row">
				<div class="col-3 text-left">Kecamatan</div>
				<div class="col">
					<select class="form-control">
						<option value="">Pilih Kecamatan</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Tahun Pajak</div>
				<div class="col">
					<input type="number" name="" id="" class="form-control">
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-4">
			<button class="btn btn-block btn-primary">Cari</button>
		</div>
	</div>
</div>
<hr>

<table class="table custom">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode / Kelurahan</th>
			<th>Jumlah OP / Jumlah BNG</th>
			<th>Luas Total Bumi / Luas Total BNG</th>
			<th>NJOP Bumi / NJOP BNG</th>
			<th>Tahun Pajak / Jumlah SPPT</th>
			<th>PBB Terhutang / PBB Harus Dibayar</th>
			<th>Lunas / Jatuh Tempo</th>
			<th>Pembayaran SPPT / Pembayaran SKP SPOP</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="(item, idx) in 5">
			<td>{{idx + 1}}</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
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