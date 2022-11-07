<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:40px;"><input type="checkbox" class="form-check-input"/></th>
			<th>Assessment</th>
			<th>Golongan</th>
			<th>Nomor</th>
			<th>NPWPD/RD</th>
			<th>Jenis Usaha</th>
			<th>Nama WP</th>
			<th>Nama Pemilik</th>
			<th>Kecamatan</th>
			<th>Kelurahan</th>
			<th>Tgl NPWPD</th>
			<th class="text-center">Status</th>
			<th class="text-center" style="width:80px">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
			<td class="text-center"><input type="checkbox" class="form-check-input"/></td>
			<td>{{ item.jenisPajak }}</td>
			<td>{{ golongans[item.golongan] }}</td>
			<td>{{ item.nomor }}</td>
			<td>{{ item.npwpd }}</td>
			<td>{{ item.rekening.nama }}</td>
			<td v-if="item.pemilik">{{ item.pemilik[0].nama }}</td> <td v-else>-</td>
			<td v-if="item.pemilik">{{ item.pemilik[0].nama  }}</td> <td v-else>-</t/d>
			<td v-if="item.objekPajak">{{ item.objekPajak.kecamatan.nama }}</td> <td v-else>-</td>
			<td v-if="item.objekPajak">{{ item.objekPajak.kelurahan.nama }}</td> <td v-else>-</td>
			<td v-if="item.tanggalNpwpd">{{ item.tanggalNpwpd }}</td> <td v-else>-</td>
			<td class="text-center">{{ npwpdStatuses[item.status] }}</td>
			<td class="text-center">
				<button type="button btn-sm" class="btn border-blue btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
					Aksi
				</button>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<button @click="goTo(item.id + '/edit')" class="dropdown-item" type="button">
							Edit
						</button>
						<!-- <button class="dropdown-item" type="button">
							<i class="bi bi-trash me-1"></i>
							Hapus
						</button> -->
					</li>
				</ul>
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
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Assesmen</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option>Self</option>
							<option>Operator</option>
						</select>						
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Golongan</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option>Golongan 1 (Orang Pribadi)</option>
							<option>Golongan 2 (Orang Pribadi)</option>
						</select>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Jenis Usaha</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option>...........</option>
							<option>...........</option>
							<option>...........</option>
							<option>...........</option>
							<option>...........</option>
						</select>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Nama WP</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Nama Pemilik</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Kecamatan</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Kelurahan</div>
					<div class="col-md ps-md-2"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 pt-1">Status</div>
					<div class="col-md ps-md-2">
						<select class="form-control">
							<option>Aktif</option>
							<option>Tidak Aktif</option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-2"></i>Tutup</button>
				<button type="button" class="btn bg-blue"><i class="bi bi-check-lg me-2"></i>OK</button>
			</div>
		</div>
	</div>
</div>

<?php
$this->registerJsFile('@web/js/refs/common.js?v=20221107a');
$this->registerJsFile('@web/js/services/pendaftaran-wp/list.js?v=20221101');
$this->registerJsFile('@web/js/app-list.js?v=20221107a');
