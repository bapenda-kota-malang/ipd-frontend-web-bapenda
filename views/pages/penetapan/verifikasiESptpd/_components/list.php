<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Nomor</th>
			<th>Tanggal</th>
			<th>Masa Pajak</th>
			<th>Jatuh Tempo</th>
			<th>Pajak/Retribusi</th>
			<th>NPWPD</th>
			<th>Nama WP</th>
			<th>Jumlah Pajak</th>
			<th>Status</th>
			<th style="width:120px"></th>
		</tr>
		<tbody>
			<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
				<td><input type="checkbox" /></td>
				<td>{{item.id.substr(25,15)}}</td>
				<td>{{item.createdAt.substr(0,10)}}</td>
				<td>{{item.periodeAwal.substr(0,10) + ' s/d ' + item.periodeAkhir.substr(0,10)}}</td>
				<td>{{item.jatuhTempo.substr(0,10)}}</td>
				<td v-if="item.rekening.objek==01">Pajak Hotel</td>
				<td v-if="item.rekening.objek==02">Pajak Resto</td>
				<td v-if="item.rekening.objek==03">Pajak Hiburan</td>
				<td v-if="item.rekening.objek==04">Pajak Reklame</td>
				<td v-if="item.rekening.objek==05">Pajak Hotel</td>
				<td v-if="item.rekening.objek==06">Pajak Penerangan Jalan</td>
				<td v-if="item.rekening.objek==07">Pajak Parkir</td>
				<td v-if="item.rekening.objek==08">Pajak Air Tanah</td>
				<td>{{item.npwpd.npwpd}}</td>
				<td>{{item.laporUser.name}}</td>
				<td>{{item.tarifPajak_id}}</td>
				<td>-</td>
				<td>
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

<?php
$this->registerJsFile('@web/js/refs/common.js?v=20221108a');
$this->registerJsFile('@web/js/services/verifikasi-esptpd/list.js?v=20221108a');
$this->registerJsFile('@web/js/app-list.js?v=20221108a');
