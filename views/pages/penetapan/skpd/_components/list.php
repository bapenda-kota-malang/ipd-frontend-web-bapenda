<?php

use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/skpd/list.js?v=20221117a');

?>
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
			<th class="text-end">Jumlah Pajak</th>
			<th class="text-center">Status</th>
			<th style="width:120px"></th>
		</tr>
		<tbody>
			<tr v-if="data.length==0">
				<td colspan="11" class="p-4 text-center">Tidak ada data</td>
			</tr>
			<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
				<td><input type="checkbox" /></td>
				<td>{{item.nomorSpt}}</td>
				<td>{{item.createdAt}}</td>
				<td>{{item.periodeAkhir + ' s/d ' + item.periodeAkhir}}</td>
				<td>{{item.jatuhTempo}}</td>
				<td>{{item.rekening.jenisUsaha}}</td>
				<td>{{item.npwpd.npwpd}}</td>
				<td>{{item.objekPajak.nama}}</td>
				<td class="text-end">{{item.jumlahPajak}}</td>
				<td class="text-center">{{item.status}}</td>
				<td class="text-center">
					 <div class="btn-group">
						<button type="button" class="btn btn-outline-primary border-slate-300 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Aksi
						</button>
						<ul class="dropdown-menu" style="width:150px">
							<!-- <li><a class="dropdown-item" href="#">Detail</a></li> -->
							<li><a :href="`${urls.pathname}/${item.id}/edit`" class="dropdown-item">Edit</a></li>
							<!-- <li><a class="dropdown-item" href="#">Hapus</a></li> -->
						</ul>
					</div> 
				</td>
			</tr>
		</tbody>
	</thead>
</table>

<input type="hidden" id="objekPajak" value="<?= $objekPajak ?>" />
