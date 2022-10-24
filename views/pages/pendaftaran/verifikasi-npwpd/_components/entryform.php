
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl-2 xol-lg-3 col-md-4 mb-3">
				Assesmen
				<select class="form-control">
					<option>Self</option>
					<option>Operator</option>
				</select>
			</div>
			<div class="col-xl-3 xol-lg-4 col-md-5 mb-3">
				Golongan
				<select class="form-control">
					<option>Golongan 1 (Orang Pribadi)</option>
					<option>Golongan 2 (Orang Pribadi)</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-2 col-lg-3 col-md-3 mb-3">
				Nomor
				<input class="form-control" />
			</div>
			<div class="col-xl-3 col-lg-4 col-md-4">
				Nomor Registrasi
				<input class="form-control mb-3" />
			</div>
			<div class="col-xl-3 col-lg-4 col-md-4 mb-3">
				NPWP
				<input class="form-control" />
			</div>
		</div>
		<div class="mb-3">
			Opsi Penomoran
			<div class="form-check my-2">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
				<label class="form-check-label" for="flexCheckDefault">
					Gunakan Penomoran Otomatis
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 mb-3">
				NPWPD
				<input class="form-control" />
			</div>
			<div class="col-lg-3 col-md-6 mb-3">
				Tanggal NPWPD
				<input class="form-control" />
			</div>
			<div class="col-lg-3 col-md-6 mb-3">
				Tanggal Pengukuhan
				<input class="form-control" />
			</div>
			<div class="col-lg-2 col-md-6 mb-3">
				Status
				<input class="form-control" />
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 mb-3">
				Jenis Usaha
				<input class="form-control" />
			</div>
			<div class="col-md mb-3">
				&nbsp;
				<input class="form-control" />
			</div>
			<div class="col-md mb-3">
				&nbsp;
				<input class="form-control" />
			</div>
		</div>
		<div class="row">
			<div class="col-lg col-md-6 mb-3">
				Mulai Usaha
				<input class="form-control" />
			</div>
			<div class="col-lg col-md-6 mb-3">
				Luas Bangunan
				<input class="form-control" />
			</div>
			<div class="col-lg col-md-6 mb-3">
				Jam Buka Usaha
				<input class="form-control" />
			</div>
			<div class="col-lg col-md-6 mb-3">
				Jam Tutup Usaha
				<input class="form-control" />
			</div>
			<div class="col-lg col-md-6 mb-3">
				Rata-Rata Pengunjung
				<input class="form-control" />
			</div>
		</div>
		<div class="row">
			<div class="col-md mb-3">
				Potensi Omset Perbulan
				<input class="form-control" />
			</div>
			<div class="col-lg-2 col-md-3 mb-3">
				Penerangan Genset
				<div class="d-flex pt-2">
					<div class="form-check me-5">
						<input class="form-check-input" type="radio" name="genetYa" id="gensetYa">
						<label class="form-check-label" for="gensetYa">
							Ya
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gensetTidak" id="gensetTidak" checked>
						<label class="form-check-label" for="gensetTidak">
							Tidak
						</label>
					</div>
				</div>
			</div>
			<div class="col-md mb-3">
				Air Tanah
				<div class="d-flex pt-2">
					<div class="form-check me-5">
						<input class="form-check-input" type="radio" name="airTanahYa" id="airTanahYa">
						<label class="form-check-label" for="airTanahYa">
							Ya
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="airTanahTidak" id="airTanahTidak" checked>
						<label class="form-check-label" for="airTanahTidak">
							Tidak
						</label>
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
					<th><input type="checkbox" /></th>
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
		</table>
		<button class="btn bg-blue">Tambah</button>
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
					<th><input type="checkbox" /></th>
					<th>Klasifikasi</th>
					<th>Jumlah</th>
					<th>Unit</th>
					<th>Tarif</th>
					<th>Keterangan</th>
				</tr>
			</thead>
		</table>
		<button class="btn bg-blue">Tambah</button>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Pemilik
	</div>
	<div class="card-body">
		<input type="checkbox" /> Alamat Pemilik sama dengan Alamat Object Pajak
		<table class="table table-bordered">
			<thead>
				<tr>
					<th><input type="checkbox" /></th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th>Kota</th>
					<!-- <th>Kecamatan</th> -->
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th>Status</th>
				</tr>
			</thead>
		</table>
		<button class="btn bg-blue">Tambah</button>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
	Data Narahubung
	</div>
	<div class="card-body">
		<input type="checkbox" /> Alamat Narahubung sama dengan Alamat Object Pajak
		<table class="table table-bordered">
			<thead>
				<tr>
					<th><input type="checkbox" /></th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th>Kota</th>
					<!-- <th>Kecamatan</th> -->
					<th>Kelurahan</th>
					<th>No Telp</th>
					<th>Status</th>
				</tr>
			</thead>
		</table>
		<button class="btn bg-blue">Tambah</button>
	</div>
</div>
