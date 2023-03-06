<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/tempat-pembayaran-sppt-masal/tempat-pembayaran-sppt-masal.js?v=20221108a');
$this->registerJsFile('@web/js/services/tempat-pembayaran-sppt-masal/tempat-pembayaran-sppt-masal.js?v=20221117a');

?>
<div class="row mt-4">
	<div class="col">
		<table class="table table-custom">
			<thead>
				<tr>
					<th scope="col">Kode Kelurahan</th>
					<th scope="col">Nama Kelurahan</th>
					<th scope="col">BT</th>
					<th scope="col">BP</th>
					<th scope="col">Kd TP</th>
					<th scope="col">Nama Tempat Pembayaran</th>
					<th style="width:100px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.length==0">
					<td colspan="7" class="p-4 text-center">Tidak ada data</td>
				</tr>
				<tr v-else v-for="(val, idx) in data">
					<td>
						{{ val.kelurahan_kode }}
					</td>
					<td>
						{{ val.kelurahan?.nama }}
					</td>
					<td>
						{{ val.bank_tunggal.nama }}
					</td>
					<td>
						{{ val.bank_persepsi.nama }}
					</td>
					<td>
						{{ val.tp_kode }}
					</td>
					<td>
						{{ val.tempat_pembayaran.namaTp }}
					</td>
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
	</div>

</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-sliders me-2"></i>Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-3 text-left">Provinsi</div>
					<div class="col">
						<vueselect v-model="urls.dataSrcParams.provinsi_kode" :options="provinsiList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(urls.dataSrcParams.provinsi_kode, provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', daerahList, 'kode', 'kode')" />
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3 text-left">Kota / Kabupaten</div>
					<div class="col">
						<div>
							<vueselect v-model="urls.dataSrcParams.dati2_kode" :options="daerahList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(urls.dataSrcParams.dati2_kode, daerahList, '/kecamatan?daerah_kode={kode}&no_pagination=true', kecamatanList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3 text-left">Kecamatan</div>
					<div class="col">
						<div>
							<vueselect v-model="urls.dataSrcParams.kecamatan_kode" :options="kecamatanList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(urls.dataSrcParams.kecamatan_kode, kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahanList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-3 text-left">Tahun</div>
					<div class="col">
						<input type="text" class="form-control" v-model="urls.dataSrcParams.tahun" />
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<button type="button" @click="applyFilter" class="btn bg-blue"><i class="bi bi-check-lg me-2"></i>OK</button>
			</div>
		</div>
	</div>
</div>

<!-- entry modal -->
<div id="entryFormModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>{{entryFormTitle}}</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3 pt-1">Provinsi</div>
					<div class="col mb-2">
						<div>
							<vueselect v-model="entryData.provinsi_kode" :options="provinsiList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(entryData.provinsi_kode, provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', daerahList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Kota/Kabupaten</div>
					<div class="col mb-2">
						<div>
							<vueselect v-model="entryData.dati2_kode" :options="daerahList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(entryData.dati2_kode, daerahList, '/kecamatan?daerah_kode={kode}&no_pagination=true', kecamatanList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Kecamatan</div>
					<div class="col mb-2">
						<div>
							<vueselect v-model="entryData.kecamatan_kode" :options="kecamatanList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(entryData.kecamatan_kode, kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahanList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Kelurahan</div>
					<div class="col mb-2">
						<div>
							<vueselect v-model="entryData.kelurahan_kode" :options="kelurahanList" :reduce="item => item.kode" label="nama" code="id" />
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-3 pt-1">Tahun</div>
					<div class="col mb-2">
						<input v-model="entryData.tahun" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Kanwil</div>
					<div class="col mb-2">
						<vueselect v-model="entryData.kanwil_kode" :options="kanwilList" :reduce="item => item.kdKanwil" label="nmKanwil" code="id" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">KPPBB</div>
					<div class="col mb-2">
						<vueselect v-model="entryData.kppbb_kode" :options="kppbbList" :reduce="item => item.kdKppbb" label="nmKppbb" code="id" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Bank Tunggal</div>
					<div class="col mb-2">
						<div>
							<vueselect v-model="entryData.banktunggal_kode" :options="bankTunggalList" :reduce="item => item.kode" label="nama" code="id" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Bank Persepsi</div>
					<div class="col mb-2">
						<div>
							<vueselect v-model="entryData.bankpersepsi_kode" :options="bankPersepsiList" :reduce="item => item.kode" label="nama" code="id" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Tempat Pembayaran</div>
					<div class="col">
						<vueselect v-model="entryData.tp_kode" :options="tempatPembayaranList" :reduce="item => item.tp_id" label="namaTp" code="id" />
					</div>
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
					<div class="col-md-2 ps-4">ID</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.id}}</div>
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