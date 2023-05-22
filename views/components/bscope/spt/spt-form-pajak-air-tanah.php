<template v-if="rekening_objek == '08'">
	<div class="row g-1">
		<div class="col-md-4 border-bottom">Peruntukan</div>
		<div class="col-md-4 border-bottom">Jenis</div>
		<div class="col-md-4 border-bottom">Pengenaan</div>
	</div>
	<div class="row g-1">
		<div class="col-md-4">
			<select v-model="data.dataDetails.peruntukan" class="form-select">
				<option v-for="(item) in peruntukanAirs" :value="item">{{item}}</option>
			</select>
		</div>
		<div class="col-md-4">
			<select v-model="data.dataDetails.jenisAbt" class="form-select">
				<option v-for="(item) in jenisAbts" :value="item">{{item}}</option>
			</select>
		</div>
		<div class="col-md-4">
			<input v-model="data.dataDetails.pengenaan" class="form-control">
		</div>
	</div>
</template>
