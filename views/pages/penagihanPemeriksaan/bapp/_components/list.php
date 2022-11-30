<?php

use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221130a');
$this->registerJsFile('@web/js/services/bapp/list.js?v=20221130a');

?>
<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>NPWPD</th>
			<th>Nama Usaha</th>
			<th>No Surat Undangan</th>
			<th>Tanggal Pemeriksaan</th>
			<th>Verifikasi Kasubid</th>
			<th style="width:120px"></th>
		</tr>
		<tbody>
			<tr v-if="data.length==0">
				<td colspan="11" class="p-4 text-center">Tidak ada data</td>
			</tr>
			<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
				<td><input type="checkbox" /></td>
				<td>{{ item.suratPemberitahuan.spt.npwpd.npwpd }}</td>
				<td>{{ item.suratPemberitahuan.spt.npwpd.objekPajak.nama }}</td>
				<td>{{ item.suratPemberitahuan.nomor }}</td>
				<td>{{ item.tanggalPemeriksaan }}</td>
				<td>{{ item.status }}</td>
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
