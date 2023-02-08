<?php 

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/harga-referensi/list.js?v=20221208a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Alamat</th>
			<th>Kelurahan</th>
			<th>Kecamatan</th>
			<th>Harga</th>
			<th></th>
		</tr>
		<tbody>
			<tr v-for="(item, index) in 5" class="pointer">
				<td>Jl. Mayjend</td>
				<td>Sukun</td>
				<td>Sukun</td>
				<td>Rp. 130.000</td>
				<td class="text-end">
					<div class="btn-group">
						<button type="button" class="btn border-blue btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Aksi
						</button>
						<ul class="dropdown-menu" style="width:170px">
							<!-- <li><a class="dropdown-item" href="#"><i class="bi bi-search me-2"></i> Detail</a></li> -->
							<li><a class="dropdown-item" :href="'/pendataan/harga-referensi/'+ index +'/edit'"><i class="bi bi-pencil me-2"></i> Edit</a></li>
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
				<!-- <div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Kode</div>
					<div class="col-md ps-md-2"><input v-model="data.kdTanah" class="form-control" /></div>
				</div> -->
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


