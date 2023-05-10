<template v-if="rekening_objek == '01'">
	<div class="row mb-3">
		<div class="col-lg-6 col-xl-5 col-xxl-6">
			<div class="row">
				<div class="col-8 col-lg-7 col-xl-6">Menggunakan Kas Register/Komputer/Pos</div>
				<div class="col">
					<div class="form-check form-check-inline">
						<input type="radio" name="kasRadio" v-model="data.dataDetails.kasRegister" v-bind:value="true" class="form-check-input" id="kasYa">
						<label class="form-check-label" for="kasYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="kasRadio" v-model="data.dataDetails.kasRegister" v-bind:value="false" class="form-check-input" id="kasTidak">
						<label class="form-check-label" for="kasTidak">Tidak</label>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-xl-5 col-xxl-6">
			<div class="row">
				<div class="col-8 col-lg-7 col-xl-6">Mengadakan Pembukuan Pencatatan</div>
				<div class="col">
					<div class="form-check form-check-inline">
						<input type="radio" name="bukuRadio" v-model="data.dataDetails.pembukuan" v-bind:value="true" class="form-check-input" id="bukuYa">
						<label class="form-check-label" for="bukuYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="bukuRadio" v-model="data.dataDetails.pembukuan" v-bind:value="false" class="form-check-input" id="bukuTidak">
						<label class="form-check-label" for="bukuTidak">Tidak</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<table class="table fit-form-control">
		<thead>
			<tr>
				<th>Golongan Kamar</th>
				<th>Tarif</th>
				<th>Jumlah Kamar</th>
				<th>Kamar yang Laku</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(item, idx) in data.dataDetails.golonganKamar">
				<td><input v-model="data.dataDetails.golonganKamar[idx]" class="form-control"></td>
				<td><input v-model="data.dataDetails.tarif[idx]" type="number" class="form-control"></td>
				<td><input v-model="data.dataDetails.jumlahKamar[idx]" type="number" class="form-control"></td>
				<td><input v-model="data.dataDetails.jumlahKamarYangLaku[idx]" type="number" class="form-control"></td>
			</tr>
		</tbody>
	</table>
</template>
