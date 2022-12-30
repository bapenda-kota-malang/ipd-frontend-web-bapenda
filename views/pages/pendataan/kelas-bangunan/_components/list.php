<?php 

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/kelas-bangunan/list.js?v=20221208a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Kode</th>
			<th>Tahun Awal</th>
			<th>Tahun Akhir</th>
			<th>Nilai Min</th>
			<th>Nilai Max</th>
			<th>Nilai /m<sup>2</sup></th>
			<!-- <th style="width:120px"></th> -->
		</tr>
		<tbody>
			<tr v-for="item in data" class="pointer">
				<td class="text-center"><input type="checkbox" class="form-check-input"/></td>
				<td>{{ item.kdBangunan }}</td>
				<td>{{ item.tahunAwalKelasBangunan }}</td>
				<td>{{ item.tahunAkhirKelasBangunan }} </td>
				<td>{{ item.nilaiMinBangunan }}</td>
				<td>{{ item.nilaiMaxBangunan }}</td>
				<td>{{ item.nilaiPerM2Bangunan }}</td>
				<td class="text-end">
					<div class="btn-group">
						<button type="button" class="btn border-blue btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Aksi
						</button>
						<ul class="dropdown-menu" style="width:170px">
							<!-- <li><a class="dropdown-item" href="#"><i class="bi bi-search me-2"></i> Detail</a></li> -->
							<li><a class="dropdown-item" :href="'/pendataan/kelas-bangunan/'+ item.id +'/edit'"><i class="bi bi-pencil me-2"></i> Edit</a></li>
							<button class="dropdown-item" type="button" @click="hapusItem(item.id)">
								<i class="bi bi-trash me-1"></i>Hapus
							</button>
						</ul>
					</div>
				</td>
			</tr>
		</tbody>
	</thead>
</table>

<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-sliders me-2"></i>Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Kode</div>
					<div class="col-md ps-md-2"><input v-model="data.kdTanah" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Tahun Awal</div>
					<div class="col-md ps-md-2"><input v-model="data.tahunAwalKelasBangunan" class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Tahun Akhir</div>
					<div class="col-md ps-md-2"><input v-model="data.tahunAkhirKelasBangunan" class="form-control" /></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<button type="button" class="btn bg-blue" data-bs-dismiss="modal"><i class="bi bi-check-lg me-2" @click="applyFilter"></i>OK</button>
			</div>
		</div>
	</div>
</div>


