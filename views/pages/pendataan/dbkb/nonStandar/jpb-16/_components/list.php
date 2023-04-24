<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/dbkb/jpb16.js?v=20221108a');
$this->registerJsFile('@web/js/services/dbkb/jpb16.js?v=20230309a');

?>
<table class="table">
	<thead>
		<tr>
			<th style="width:50px"></th>
			<th>Kode Prov.</th>
			<th>Kode Kota</th>
			<th>Tahun</th>
			<th>Kelas</th>
			<th class="text-end">Min</th>
			<th class="text-end">Max</th>
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
			<td>{{item.tahunDbkbJpb16}}</td>
			<td>{{item.kelasDbkbJpb16}}</td>
			<td class="text-end">{{item.lantaiMinJpb16}}</td>
			<td class="text-end">{{item.lantaiMaxJpb16}}</td>
			<td class="text-end">{{item.nilaiDbkbJpb16}}</td>
			<td class="text-end">
				<div class="btn-group">
					<button class="btn btn-outline-primary border-slate-300 dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots-vertical"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end" style="width:150px">
						<li><button @click="showEdit(idx)" class="dropdown-item"><i class="bi bi-pencil me-1"></i> Edit</button></li>
						<li><button @click="showDel(idx)" class="dropdown-item"><i class="bi bi-x-lg me-1"></i> Hapus</button></li>
					</ul>
				</div> 
			</td>
		</tr>
	</tbody>
</table>

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
					<div class="xc-5 mb-2"><input v-model="entryData.tahunDbkbJpb16" class="form-control" /></div>
					<div class="xc-6 pt-1 pe-2 text-end">Kelas</div>
					<div class="xc-5 mb-2"><input v-model="entryData.kelasDbkbJpb16" type="number" min="1" max="4" class="form-control" /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Min</div>
					<div class="xc-5 mb-2"><input v-model="entryData.lantaiMinJpb16" class="form-control" /></div>
					<div class="xc-6 pt-1 pe-2 text-end">Max</div>
					<div class="xc-5 mb-2"><input v-model="entryData.lantaiMaxJpb16" class="form-control" /></div>
				</div>
				<div class="row g-0 g-md-1">
					<div class="xc-4 pt-1">Nilai</div>
					<div class="xc-6 mb-2"><input v-model="entryData.nilaiDbkbJpb16" class="form-control" /></div>
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
					<div class="xc mb-1">{{entryData.tahunDbkbJpb16}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Kelas</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.kelasDbkbJpb16}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Min</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.lantaiMinJpb16}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Max</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.lantaiMaxJpb16}}</div>
				</div>
				<div class="row">
					<div class="xc-5 ps-4">Nilai</div>
					<div class="xc-1">:</div>
					<div class="xc mb-1">{{entryData.nilaiDbkbJpb16}}</div>
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

