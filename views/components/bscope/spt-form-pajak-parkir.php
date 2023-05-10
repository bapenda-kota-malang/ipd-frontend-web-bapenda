<template v-if="rekening_objek == '07'">
	<div class="row g-1">
		<div class="col-md-4 border-bottom">Jenis Kendaraan</div>
		<div class="col-md-4 border-bottom">Kapasitas</div>
		<div class="col-md-4 border-bottom">Tarif</div>
	</div>
	<div v-for="(item, idx) in data.dataDetails" class="row g-1">
		<div class="col-md-4">
			<select v-model="data.dataDetails[idx].jenisKendaraan" class="form-select">
				<option v-for="(item) in jenisKendaraans" :value="item.id">{{item.nama}}</option>
			</select>
		</div>
		<div class="col-md-4">
			<input v-model="data.dataDetails[idx].kapasitas" class="form-control">
		</div>
		<div class="col-md-4">
			<input v-model="data.dataDetails[idx].tarif" class="form-control">
		</div>
	</div>
</template>
