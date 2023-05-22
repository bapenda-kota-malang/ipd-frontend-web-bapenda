<div v-if="!rekening_objek" class="p-3 text-center" :class="{ 'd-none': !mountedStatus }">
	<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
</div>
<template v-else>
	<div class="row">
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Nomor SPT</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.NomorSpt" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Billing</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.kodeBilling" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Virtual Account</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.vaJatim" disabled /></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Periode Awal</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.periodeAwal" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Periode Akhir</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.periodeAkhir" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Jatuh Tempo</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.jatuhTempo" disabled /></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Subtotal E-Tax</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Total E-Tax</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Tax E-Tax</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Potensi</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.jumlahPajak" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Tarif Pajak (%)</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.tarifPajak.tarifPersen" disabled /></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row g-2 mb-1">
				<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Jumlah Pajak</div>
				<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" :value="data.total" disabled /></div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-lg-8 col-xl-10 col-xxl-8">
			<div class="row g-0">
				<div class="col-lg-3 col-xl-2 col-xxl-2 ">Keterangan</div>
				<div class="col-lg col-xl-9 col-xxl-8"><textarea class="form-control" disabled>{{data.keteranganPajak}}</textarea></div>
			</div>
		</div>
	</div>
</template>
