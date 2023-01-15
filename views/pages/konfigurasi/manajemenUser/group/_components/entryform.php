<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerJsFile('@web/js/refs/menu-arr.js?v=20230101a');
$this->registerJsFile('@web/js/dto/group/create.js?v=20230101a');
$this->registerJsFile('@web/js/services/group/entryform.js?v=20230101a');

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
							<input class="form-check-input mt-2" type="checkbox" value="">
						</div>
					</th>
					<th class="text-center">Fitur</th>
					<th class="text-center">Hak Akses</th>
					<th style="width:50px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item,idx) in menuPrivillegeList" v-if="!item.deleted">
					<td>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="">
						</div>
					</td>
					<td>{{ item.title }}</td>
					<td class="text-center">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" :id="'priv' + idx + '_read'" v-model="item.privilegesObj.read" value="1">
							<label class="form-check-label" :for="'priv' + idx + '_read'">Baca</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" :id="'priv' + idx + '_create'" v-model="item.privilegesObj.create" value="1">
							<label class="form-check-label" :for="'priv' + idx + '_create'">Tambah</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" :id="'priv' + idx + '_update'" v-model="item.privilegesObj.update" value="1">
							<label class="form-check-label" :for="'priv' + idx + '_update'">Update</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" :id="'priv' + idx + '_update'" v-model="item.privilegesObj.delete" value="1">
							<label class="form-check-label" :for="'priv' + idx + '_update'">Hapus</label>
						</div>
					</td>
					<td class="nav">
						<button @click="deleteSelectedMenu(idx)" class="btn bg-danger"><i class="bi bi-x"></i></button>
					</td>
				</tr>
			</tbody>
		</table>
		<button @click="showMenuList" class="btn bg-blue"><i class="bi bi-plus"></i> Tambah</button>
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
						<tr v-for="(item, idx) in menuArray">
							<td :class="'ps-' + item[2]">
								<div class="d-flex">
									<div class="form-check">
										<input type="checkbox":id="'menuPath_'+item[0]" :value="idx+' '+item[0]" :checked="item[4]"  @click="checkSelectedMenu($event, item, idx)" class="form-check-input">
									</div>
									<div>
										<label :for="'menuPath_'+item[0]" class="form-check-label pointer">{{item[1]}}</label>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bg-grey-300" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<!-- <button type="button" class="btn bg-blue" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>OK</button> -->
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
