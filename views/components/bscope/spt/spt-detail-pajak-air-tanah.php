<template v-if="rekening_objek == '08'">
	<div class="row g-1">
		<div class="col-md-4 border-bottom">Peruntukan</div>
		<div class="col-md-4 border-bottom">Jenis</div>
		<div class="col-md-4 border-bottom">Pengenaan</div>
	</div>
	<div class="row g-1">
		<div class="col-md-4">
			<input :value="data.detailSptAir.peruntukan" class="form-control" disabled>
		</div>
		<div class="col-md-4">
			<input :value="data.detailSptAir.jenisAbt" class="form-control" disabled>
		</div>
		<div class="col-md-4">
			<input :value="data.detailSptAir.pengenaan" class="form-control" disabled>
		</div>
	</div>
</template>
