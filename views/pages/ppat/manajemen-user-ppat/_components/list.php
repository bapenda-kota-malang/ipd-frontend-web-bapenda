<?php

use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/ppat/list.js?v=20221108a');

?><div id="vueBox">
	<table class="table">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Nik</th>
				<th>Email</th>
				<th>Username</th>
				<th>Status</th>
				<th style="width:90px"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in data">
				<td>{{item.nama}}</td>
				<td>{{item.alamat}}</td>
				<td>{{item.nik}}</td>
				<td>{{item.user_email}}</td>
				<td>{{item.user_name}}</td>
				<td>Aktif</td>
				<td>
					<button type="button btn-sm" class="btn border-blue btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Aksi
					</button>
					<ul class="dropdown-menu dropdown-menu-end" style="width:150px">
						<li>
							<a :href="'/ppat/manajemen-user-ppat/' + item.id + '/edit'" class="dropdown-item" type="button">
								Edit
							</a>
							<!-- <button class="dropdown-item" type="button">
								<i class="bi bi-trash me-1"></i>
								Hapus
							</button> -->
						</li>
					</ul>
				</td>
			</tr>
			<tr v-if="noData"><td colspan="4" class="p-3 text-center">Tidak ada data</td></tr>
		</tbody>
	</table>
</div>
