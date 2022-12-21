<div id="vueBox">

	<div class="card mb-3">
		<div class="card-header"><div class="h5 mb-0">Detail Group</div></div>
		<div class="p-3">
			<div class="row g-1">
				<div class="col-md-3 col-lg-2 col-xxl-1">Nama</div>
				<div class="col-md mb-2">
					<input type="text" class="form-control" v-model="data.name">
					<span class="text-danger" v-if="dataErr.name">{{dataErr.name}}</span>
				</div>
			</div>
			<div class="row g-1">
				<div class="col-md-3 col-lg-2 col-xxl-1">Deskripsi</div>
				<div class="col-md">
					<input type="text" class="form-control" v-model="data.description">
					<span class="text-danger" v-if="dataErr.description">{{dataErr.description}}</span>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header"><div class="h5 mb-0">Hak Akses</div></div>
		<div class="p-3">
			<table class="table">
				<thead>
					<tr>
						<th style="width:40px">
							<div class="form-check">
								<input class="form-check-input mt-1" type="checkbox" value="">
							</div>
						</th>
						<th>Menu</th>
						<th style="width:120px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="item in menu">
						<td>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="">
							</div>
						</td>
						<td>{{ item.title }}</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php

$this->registerJsFile(
	'@web/js/services/group/entryform.js?v=20221221a',
);
