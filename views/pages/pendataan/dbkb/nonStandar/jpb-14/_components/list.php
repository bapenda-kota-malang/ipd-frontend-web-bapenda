<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/dbkb/jpb14.js?v=20230405a');
$this->registerJsFile('@web/js/services/dbkb/jpb14.js?v=20230309a');

?>
<table class="table">
	<thead>
		<tr>
			<th style="width:50px"></th>
			<th>Kode Prov.</th>
			<th>Kode Kota</th>
			<th>Tahun</th>
			<th class="text-end">Nilai</th>
			<th style="width:100px"></th>
		</tr>
	</thead>
	<tbody>
		<tr v-if="data.length==0">
			<td colspan="9" class="p-4 text-center">Tidak ada data</td>
		</tr>
		<tr v-else v-for="(item, idx) in data" >
			<td></td>
			<td>{{item.provinsi_kode}}</td>
			<td>{{item.daerah_kode}}</td>
			<td>{{item.tahunDbkbJpb14}}</td>
			<td class="text-end">{{item.nilaiDbkbJpb14}}</td>
			<td class="text-end">
				<div class="btn-group">
					<button class="btn btn-outline-primary border-slate-300 dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots-vertical"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end" style="width:150px">
						<li><button @click="showEntry(idx)" class="dropdown-item"><i class="bi bi-pencil me-1"></i> Edit</button></li>
						<li><button @click="showDel(idx)" class="dropdown-item"><i class="bi bi-x-lg me-1"></i> Hapus</button></li>
					</ul>
				</div> 
			</td>
		</tr>
	</tbody>
</table>

<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-sliders me-2"></i>Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Tahun</div>
					<div class="xc-5 mb-2"><input v-model="filter.tahunDbkbJpb14" class="form-control" /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Nilai</div>
					<div class="xc-6 mb-2"><input v-model="filter.nilaiDbkbJpb14" class="form-control" /></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<button type="button" @click="applyFilter" class="btn bg-blue"><i class="bi bi-check-lg me-2"></i>OK</button>
			</div>
		</div>
	</div>
</div>

<div id="entryFormModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>{{entryFormTitle}}</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Provinsi</div>
					<div class="xc mb-2">
						<vueselect v-model="entryData.provinsi_kode"
							:options="provinsiList"
							:reduce="item => item.kode"
							label="nama"
							code="kode"
						/>
					</div>
				</div>				
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Kota/Kab</div>
					<div class="xc mb-2">
						<vueselect v-model="entryData.daerah_kode"
							:options="daerahList"
							:reduce="item => item.kode"
							label="nama"
							code="kode"
						/>
					</div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Tahun</div>
					<div class="xc-5 mb-2"><input v-model="entryData.tahunDbkbJpb14" class="form-control" /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Nilai</div>
					<div class="xc-6 mb-2"><input v-model="entryData.nilaiDbkbJpb14" class="form-control" /></div>
				</div>
			</div>
			<div class="modal-footer">
				<button @click="submitEntry" class="btn bg-blue"><i class="bi bi-check-lg"></i> Simpan</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>

<div id="confirmDelModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Konfirmasi Hapus Data</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-1">Proses akan menghapus data dengan informasi sebagai berikut:</div>
				<div class="row">
					<div class="xc-5 ps-4">Kode Prov.</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.provinsi_kode}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Kode Kota</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.daerah_kode}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Tahun</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.tahunDbkbJpb14}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Kelas</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.kelasDbkbJpb14}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Min</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.lantaiMinJpb14}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Max</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.lantaiMaxJpb14}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Nilai</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.nilaiDbkbJpb14}}</div>
				</div>
				<div class="mt-4">Lanjutkan Proses?</div>
			</div>
			<div class="modal-footer">
				<button @click="submitDel" class="btn bg-danger"><i class="bi bi-check-lg"></i> Iya, Hapus Data</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>

