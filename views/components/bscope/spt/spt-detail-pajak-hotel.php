<template v-if="rekening_objek == '01'">
	<div class="row mb-3">
		<div class="col-lg-6 col-xl-5 col-xxl-6">
			<div class="row">
				<div class="col-10 col-md-6 col-lg-9 col-xl-8">Menggunakan Kas Register/Komputer/Pos:</div>
				<div class="col"><strong>{{data.detailSptHotel.kasRegister ? 'Ya' : 'Tidak'}}</strong></div>
			</div>
		</div>
		<div class="col-lg-6 col-xl-5 col-xxl-6">
			<div class="row">
				<div class="col-10 col-md-6 col-lg-9 col-xl-8">Mengadakan Pembukuan Pencatatan</div>
				<div class="col"><strong>{{data.detailSptHotel.pembukuan ? 'Ya' : 'Tidak'}}</strong></div>
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
			<tr v-for="(item, idx) in data.detailSptHotel.golonganKamar">
				<td><input :value="data.detailSptHotel.golonganKamar[idx]" class="form-control" disabled></td>
				<td><input :value="data.detailSptHotel.tarif[idx]" type="number" class="form-control" disabled></td>
				<td><input :value="data.detailSptHotel.jumlahKamar[idx]" type="number" class="form-control" disabled></td>
				<td><input :value="data.detailSptHotel.jumlahKamarYangLaku[idx]" type="number" class="form-control" disabled></td>
			</tr>
		</tbody>
	</table>
</template>
