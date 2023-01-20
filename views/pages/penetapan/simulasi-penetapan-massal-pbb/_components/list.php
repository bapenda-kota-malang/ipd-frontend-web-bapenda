<?php 

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// include Yii::getAlias('@dummyDataPath').'/pelayanan.php';

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/spptsimulasi/listsimulasi.js?v=20221206a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>NOP</th>
			<th>NJOP Total</th>
			<th>Tanggal Terbit</th>
			<th>Tanggal Jatuh Tempo</th>
			<th>Tahun Pajak</th>
			<th style="width:120px"></th>
		</tr>
		<tbody>
			<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
				<td class="text-center"><input type="checkbox" class="form-check-input"/></td>
				<td>{{ item.nop }}</td>
				<td>{{ item.njop_sppt }}</td>
				<td>{{ item.tanggalTerbit_sppt }} </td>
				<td>{{ item.tanggalJatuhTempo_sppt }}</td>
				<td>{{ item.tahunPajakskp_sppt }}</td>
				<td class="text-end">
					<div class="btn-group">
						<a class="dropdown-item" :href="'/penetapan/simulasi-penetapan-massal-pbb/sppt'"><i class="bi bi-pencil me-2"></i> Lihat</a>
						<!-- <a class="dropdown-item" :href="'/penetapan/simulasi-penetapan-massal-pbb/'+ item.id +'/delete'"><i class="bi bi-pencil me-2"></i> Hapus</a> -->
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


