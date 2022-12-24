<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerJsFile('@web/js/refs/menu-arr.js?v=20221221a');
$this->registerJsFile('@web/js/dto/group/create.js?v=20221221a');
$this->registerJsFile('@web/js/services/group/entryform.js?v=20221221a');

?>
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
				<tr v-for="item in menuPrivillegeList">
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
		<button @click="showMenuList" class="btn bg-blue">Tambah</button>
	</div>
</div>

<div class="modal fade" id="menuListModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-sliders me-2"></i>Daftar Menu / Fitur</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table table-striped">
					<tbody class="tree">
						<tr v-for="item in menuArray">
							<td :class="'ps-' + item[2]">
								<div class="d-flex">
									<div class="form-check">
										<input type="checkbox" :value="item[0]" @click="checkSelectedMenu(item[0])" class="form-check-input">
									</div>
									<div>
										{{item[1]}}
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
