<template v-if="rekening_objek == '02'">
	<div class="row g-1">
		<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1">Jml Meja</div>
		<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
			<input :value="data.detailSptResto.jumlahMeja" type="number" class="form-control" disabled>
		</div>
		<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 text-md-end pt-1">Jml Kursi</div>
		<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
			<input :value="data.detailSptResto.jumlahKursi" type="number" class="form-control" disabled>
		</div>
		<div class="d-none d-md-inline-block d-xl-none"></div>
		<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-xl-end">Tarif Minuman</div>
		<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
			<input :value="data.detailSptResto.tarifMinuman" type="number" class="form-control" disabled>
		</div>
		<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end">Tarif Makakan</div>
		<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
			<input :value="data.detailSptResto.tarifMakanan" type="number" class="form-control" disabled>
		</div>
		<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end">Jml Pengunjung</div>
		<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
			<input :value="data.detailSptResto.jumlahPengunjung" type="number" class="form-control" disabled>
		</div>
	</div>
</template>
