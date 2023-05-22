<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
	<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
		<input :value="data.npwpd.npwpd" class="form-control" disabled />
	</div>
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 text-md-end pe-md-2">
		Tanggal
	</div>
	<div class="xc-md-4 xc-xl-3 mb-2">
		<input :value="data.tanggalSpt" class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Jenis Usaha</div>
	<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
		<input :value="data.rekening.kode" class="form-control" disabled />
	</div>
	<div class="col col-lg-7 col-xl-6 col-xxl-5 mb-2">
		<input :value="data.rekening.jenisUsaha" class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nama Usaha</div>
	<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
		<input :value="data.objekPajak.nama" class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
	<div class="xc-3 pt-2 d-md-none">RT/RW</div>
	<div class="xc xc-lg-10 mb-2">
		<input :value="data.objekPajak.alamat" class="form-control" disabled />
	</div>
	<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
	<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
		<input :value="data.objekPajak.rtRw" class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Kelurahan</div>
	<div class="xc-md-6 col-lg-7 col-xl-6">
		<input :value="data.objekPajak.kelurahan.nama" class="form-control" disabled />
	</div>
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 pe-2 text-md-end">Kecamatan</div>
	<div class="xc-md-6 col-lg-7 col-xl-6">
		<input :value="data.objekPajak.kecamatan.nama" class="form-control" disabled />
	</div>
</div>
