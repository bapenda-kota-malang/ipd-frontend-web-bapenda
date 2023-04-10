<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/refs/penguranganStatusCode.js?v=20221108a');
$this->registerJsFile('@web/js/services/keberatan/list.js?v=20221108a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:40px;"><input type="checkbox" class="form-check-input"/></th>
			<th>Tanggal</th>
			<th>Pemohon</th>
			<th>NPWPD</th>
			<th>Nama Usaha</th>
			<th class="text-center">Status</th>
			<!-- <th class="text-center" style="width:80px">Aksi</th> -->
		</tr>
	</thead>
	<tbody>
		<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
			<td class="text-center"><input type="checkbox" class="form-check-input"/></td>
			<td>{{ item.tanggalPengajuan }}</td>
			<td>{{ item.pemohon.name }}</td>
			<td>{{ item.spt ? item.spt.npwpd.npwpd : '-' }}</td>
			<td>{{ item.spt ? item.spt.npwpd.objekPajak.nama : '-' }}</td>
			<td class="text-center">{{ penguranganStatuses[item.status] }}</td>
			<!-- <td class="text-center">
				<button type="button btn-sm" class="btn border-blue btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Aksi
				</button>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<a :href="urls.pathname + '/' + item.id + '/edit'" class="dropdown-item" type="button">
							Edit
						</a>
					</li>
				</ul>
			</td> -->
		</tr>
	</tbody>
</table>
