<?php 

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// include Yii::getAlias('@dummyDataPath').'/pelayanan.php';

$this->registerJsFile('@web/js/services/pelayanan/list.js?v=20221108a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>No Pelayanan</th>
			<th>Status Kolektif</th>
			<th>Nama</th>
			<th>Jenis Pelayanan</th>
			<th>NOP</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th style="width:120px"></th>
		</tr>
		<tbody>
		<!-- @click="goTo(urls.pathname + '/' + item.id, $event)" -->
			<tr v-for="item in data" class="pointer">
				<td class="text-center"><input type="checkbox" class="form-check-input"/></td>
				<td>{{ item.noPelayanan }}</td>
				<td>{{ item.statusKolektif }}</td>
				<td>{{ item.namaWP }} </td>
				<td>{{ item.jenisPelayanan }}</td>
				<td>{{ item.nop }}</td>
				<td v-if="item.tanggalTerima">{{ item.tanggalTerima }}</td> <td v-else>-</td>
				<td>{{ item.status }}</td>
				<td class="text-end">
					<div class="btn-group">
						<button type="button" class="btn border-blue btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Aksi
						</button>
						<ul class="dropdown-menu" style="width:170px">
							<!-- <li><a class="dropdown-item" href="#"><i class="bi bi-search me-2"></i> Detail</a></li> -->
							<li><a class="dropdown-item" :href="'/pelayanan/verifikasi-data-permohonan/'+ item.id +'/verifikasi'"><i class="bi bi-pencil me-2"></i> Approve</a></li>
							<!-- <li><a class="dropdown-item" :href="'/pelayanan/verifikasi-data-permohonan/'+ item.id +'/verifikasi-sppt'"><i class="bi bi-pencil me-2"></i> Approve SPPT</a></li> -->
							<!-- <li><a class="dropdown-item" :href="'/pelayanan/verifikasi-data-permohonan/'+ item.id +'/status'" ><i class="bi bi-check-lg me-2"></i> Ubah Status</a></li> -->
							<!-- <li><a class="dropdown-item" :href="'/pelayanan/verifikasi-data-permohonan/'+ item.id +'/delete'"><i class="bi bi-x-lg me-2"></i> Hapus</a></li> -->
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
					<div class="col-md-3 pt-1">No Pelayanan</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Status Kolektif</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option value="0">Individu</option>
							<option value="1">Masal / Kolektif</option>
						</select>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Nama</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">NOP</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Tanggal</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<button type="button" class="btn bg-blue"><i class="bi bi-check-lg me-2"></i>OK</button>
			</div>
		</div>
	</div>
</div>


