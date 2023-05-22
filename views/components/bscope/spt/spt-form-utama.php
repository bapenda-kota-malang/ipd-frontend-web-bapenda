<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
	<div class="col-8 col-md-3 col-lg-2 col-xl-3 col-xxl-2">
		<input v-model="npwpd" class="form-control" disabled />
	</div>
	<div v-if="!id" class="xc-md-5 xc-xl-4 mb-2"><button @click="showNpwpSearch" class="btn bg-blue"><i class="bi bi-search"></i> Cari NPWPD</button></div>
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 text-md-end pe-md-2">
		Tanggal
	</div>
	<div class="xc-md-4 xc-xl-3 mb-2">
		<datepicker v-model="data.spt.tanggalSpt" format="DD/MM/YYYY" />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Jenis Usaha</div>
	<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
		<input v-model="kodeRekening" class="form-control" disabled />
	</div>
	<div class="col col-lg-7 col-xl-6 col-xxl-5 mb-2">
		<input v-model="jenisUsaha" class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nama Usaha</div>
	<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
		<input v-model="namaUsaha" class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
	<div class="xc-3 pt-2 d-md-none">RT/RW</div>
	<div class="xc xc-lg-10 mb-2">
		<input v-model="alamatUsaha" class="form-control" disabled />
	</div>
	<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
	<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
		<input v-model="rtRwUsaha" class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Kelurahan</div>
	<div class="xc-md-6 col-lg-7 col-xl-6">
		<input v-model="kelurahanUsaha" class="form-control" disabled />
	</div>
	<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 pe-2 text-md-end">Kecamatan</div>
	<div class="xc-md-6 col-lg-7 col-xl-6">
		<input v-model="kecamatanUsaha" class="form-control" disabled />
	</div>
</div>
