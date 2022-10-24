<div id="vueBox">
	<table class="table">
		<thead>
			<tr>
				<th style="width:100px">Id</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Group</th>
				<th>Posisi</th>
				<th>Status</th>
				<th style="width:90px"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in data">
				<td>{{item.id}}</td>
				<td>{{item.name}}</td>
				<td>{{item.name}}</td>
				<td>{{item.group_id}}</td>
				<td v-if="item.position == 1">Bapenda</td>
				<td v-else-if="item.position == 2">PPAT</td>
				<td v-else>Wajib Pajak</td>
				<td>Aktif</td>
				<td>
					<div v-if="item.position != 3">
						<button type="button btn-sm" class="btn border-blue btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Aksi
						</button>
						<ul class="dropdown-menu dropdown-menu-end" style="width:150px">
							<li>
								<button @click="goTo(item.id + '/edit')" class="dropdown-item" type="button">
									Edit
								</button>
								<!-- <button class="dropdown-item" type="button">
									<i class="bi bi-trash me-1"></i>
									Hapus
								</button> -->
							</li>
						</ul>
					</div>
				</td>
			</tr>
			<tr v-if="noData"><td colspan="4" class="p-3 text-center">Tidak ada data</td></tr>
		</tbody>
	</table>
</div>

<?php

$this->registerJsFile(
	'@web/js/services/user/list.js',
);
