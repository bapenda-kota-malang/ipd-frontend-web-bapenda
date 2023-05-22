<template v-if="rekening_objek == '07'">
	<div class="row g-1">
		<div class="col-md-4 border-bottom">Jenis Kendaraan</div>
		<div class="col-md-4 border-bottom">Kapasitas</div>
		<div class="col-md-4 border-bottom">Tarif</div>
	</div>
	<div v-for="(item, idx) in data.detailSptParkir" class="row g-1">
		<div class="col-md-4">
			<input :value="jenisKendaraans[item.jenisKendaraan-1].nama" class="form-control" disabled />
		</div>
		<div class="col-md-4">
			<input :value="item.kapasitas" class="form-control" disabled />
		</div>
		<div class="col-md-4">
			<input :value="item.tarif" class="form-control" disabled />
		</div>
	</div>
</template>
