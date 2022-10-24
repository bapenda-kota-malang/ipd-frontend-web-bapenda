
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1">Assesment</div>
					<div class="col mb-2"><input v-model="data.jenisPajak" class="form-control" disabled /></div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-4">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-5 pt-1 text-lg-end">Golongan</div>
					<div class="col mb-2"><input v-model="data.golongan" class="form-control" disabled /></div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-4">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-4 pt-1 text-xl-end">NPWP</div>
					<div class="col mb-2"><input v-model="data.npwp" class="form-control" disabled /></div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end text-xl-start">
						Nomor
					</div>
					<div class="col mb-2">
						<input v-model="data.nomor" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-4">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-5 pt-1 text-lg-end">
						Nomor Registrasi
					</div>
					<div class="col mb-2">
						<input v-model="data.nomorRegistrasi" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row g-xl-0">
			<div class="col-lg-6 col-xl-4">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 pt-1">NPWPD</div>
					<div class="col mb-2 ps-xl-3"><input v-model="data.npwpd" class="form-control ms-xl-1" disabled /></div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end">Tgl NPWPD</div>
					<div class="col mb-2 ps-xl-3"><input v-model="data.tanggalNpwpd" class="form-control" disabled /></div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-xl-end">Tgl Pengukuhan</div>
					<div class="col mb-2 ps-xl-3"><input v-model="data.tanggalPengukuhan" class="form-control" disabled /></div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-2">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end pe-lg-3">Status</div>
					<div class="col mb-2"><input class="form-control" disabled /></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6">
				<div class="row g-0">
					<div class="col-md-3 col-lg-4 col-xl-3 pt-1">Jenis Usaha</div>
					<div class="col mb-2 ">
						<input type="text" v-model="data.nomor" class="form-control ms-xl-1" disabled>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xl-3">
				<div class="row g-lg-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1">Mulai Usaha</div>
					<div class="col ps-lg-2 mb-2">
						<input type="text" v-model="data.tanggalMulaiUsaha.substr(0,10)" class="form-control ms-xl-1" disabled>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-lg-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end">Luas Bangunan</div>
					<div class="col ps-lg-2 mb-2">
						<input type="text" v-model="data.luasBangunan" class="form-control ms-xl-1" disabled>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-lg-end">Jam Buka Usaha</div>
					<div class="col ps-xl-2 mb-2">
						<input type="text" v-model="data.jamBukaUsaha" class="form-control" disabled>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1 text-xl-end">Jam Tutup Usaha</div>
					<div class="col ps-xl-2 mb-2">
						<input type="text" v-model="data.jamTutupUsaha" class="form-control" disabled>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-1" style="line-height:1em">Jml. Pengunjung<br/><small>(Rata-rata)</small></div>
					<div class="col ps-xl-2 mb-2">
						<input type="text" v-model="data.pengunjung" class="form-control ms-xl-1" disabled>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-xxl-1 text-xl-end">Potensi Omset<br/><small>(Perbulan)</small></div>
					<div class="col ps-lg-2 mb-2">
						<input type="text" v-model="data.omsetOp" class="form-control ms-xl-1" disabled>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-6 col-xl-4 col-xxl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xxl-6 pt-1 pt-xxl-0">Genset</div>
					<div class="col ps-xl-4 ps-xxl-3">
						<div class="row">
							<div class="col col-md-2 col-lg-3 col-xl-3 col-xxl-4 pt-1">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault" id="ya1">
									<label class="form-check-label" for="ya1">
										Ya
									</label>
								</div>
							</div>
							<div class="col pt-1">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault" id="tidak1">
									<label class="form-check-label" for="tidak1">
										Tidak
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg col-xl-4">
				<div class="row g-0">
					<div class="col-md-3 col-lg-4 col-xl-3 col-xxl-6 pt-1 text-lg-end">Air Tanah</div>
					<div class="col ps-lg-3">
						<div class="row">
							<div class="col col-md-2 col-xl-3 pt-1">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault" id="ya1">
									<label class="form-check-label" for="ya1">
										Ya
									</label>
								</div>
							</div>
							<div class="col pt-1 ps-lg-3">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault" id="tidak1">
									<label class="form-check-label" for="tidak1">
										Tidak
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Objek Pajak
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama / Tema</th>
					<th>NOP</th>
					<th>Alamat</th>
					<th>RT/RW</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in objekPajak" class="fit-form-control">
					<td><input type="text" class="form-control" v-model="item.nama" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.nop" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.alamat" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.rtRw" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kecamatan_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kelurahan_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.telp" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.status" disabled /></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Detail Objek Pajak
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Klasifikasi</th>
					<th>Jumlah</th>
					<th>Unit</th>
					<th>Tarif</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in detail_op" class="fit-form-control">
					<td><input type="text" class="form-control" v-model="item.jenisOp" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.jumlahOp" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.unitOp" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.tarifOp" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.notes" disabled /></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Pemilik
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in pemilik" class="fit-form-control">
					<td><input type="text" class="form-control" v-model="item.nama" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.alamat" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.rtRw" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kota_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kecamatan_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kelurahan_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.telp" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.status" disabled /></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
	Data Narahubung
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in narahubung" class="fit-form-control">
					<td><input type="text" class="form-control" v-model="item.nama" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.nik" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.alamat" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kota_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kecamatan_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.kelurahan_id" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.telp" disabled /></td>
					<td><input type="text" class="form-control" v-model="item.status" disabled /></td>
				</tr>
			</tbody>
		</table>
		<button class="btn bg-blue">Tambah</button>
	</div>
</div>
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php

$this->registerJsFile(
	'@web/js/services/verifikasi-npwpd/preview.js',
);
?>