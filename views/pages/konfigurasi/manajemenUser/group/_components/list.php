<div id="vueBox">
	<table class="table">
		<thead>
			<tr>
				<th style="width:100px">Id</th>
				<th>Nama</th>
				<th>Deskripsi</th>
				<th style="width:90px"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in data">
				<td>{{item.id}}</td>
				<td>{{item.name}}</td>
				<td>{{item.description}}</td>
				<td>
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
				</td>
			</tr>
			<tr v-if="noData"><td colspan="4" class="p-3 text-center">Tidak ada data</td></tr>
		</tbody>
	</table>
</div>

<?php

$this->registerJsFile(
	'@web/js/services/group/list.js',
);
