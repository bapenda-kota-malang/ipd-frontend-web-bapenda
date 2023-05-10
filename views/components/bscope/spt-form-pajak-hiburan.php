<template v-if="rekening_objek == '03'">
	<div class="row g-0">
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pengunjung Weekday</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input v-model="data.dataDetails.pengunjungWeekday" class="form-control" />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pengunjung Weekend</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input v-model="data.dataDetails.pengunjungWeekend" class="form-control" />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekday</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input v-model="data.dataDetails.pertunjukanWeekday" class="form-control" />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekend</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input v-model="data.dataDetails.pertunjukanWeekend" class="form-control" />
		</div>
	</div>
	<div class="row g-0">
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jumlah Meja</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input v-model="data.dataDetails.jumlahMeja" class="form-control" />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Ruangan</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input v-model="data.dataDetails.jumlahRuangan" class="form-control" />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Karcis Bebas</div>
		<div class="xc-md-3 xc-lg-2 mb-2 pt-1">
			<div class="form-check form-check-inline me-1">
				<input type="radio" name="kbRadio" v-model="data.dataDetails.karcisBebas" v-bind:value="true" class="form-check-input" id="kbYa">
				<label class="form-check-label" for="kbYa">Ya</label>
			</div>
			<div class="form-check form-check-inline me-0">
				<input type="radio" name="kbRadio" v-model="data.dataDetails.karcisBebas" v-bind:value="false" class="form-check-input" id="kbTidak">
				<label class="form-check-label" for="kbTidak">Tidak</label>
			</div>
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Karcis Bebas</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input v-model="data.dataDetails.jumlahKarcisBebas" class="form-control" />
		</div>
	</div>
	<div class="row g-2">
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Mesin Tiket</div>
		<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-2 pt-1">
			<div class="form-check form-check-inline">
				<input type="radio" name="mtRadio" v-model="data.dataDetails.mesinTiket" v-bind:value="true" class="form-check-input" id="mtYa">
				<label class="form-check-label" for="mtYa">Ya</label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" name="mtRadio" v-model="data.dataDetails.mesinTiket" v-bind:value="false" class="form-check-input" id="mtTidak">
				<label class="form-check-label" for="mtTidak">Tdk</label>
			</div>
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-2 pt-1 text-xl-end">Pembukuan</div>
		<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-2 pt-1">
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
	<div class="row">
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jenis Kelas dan Tarif</div>
		<div class="col-md col-lg-6 col-xl-4">
			<table>
				<thead class="table table-sm fit-form-control">
					<tr>
						<th class="bg-slate-300">Kelas</th>
						<th class="bg-slate-300">Tarif</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(item, idx) in data.dataDetails.kelas">
						<td>
							<input v-model="data.dataDetails.kelas[idx]" class="form-control">
						</td>
						<td>
							<input v-model="data.dataDetails.tarif[idx]" class="form-control">
						</td>
					</tr>
				</tbody>
			</table>
			<button @click="addHiburanClass(data.dataDetails)" class="btn bg-primary">Tambah</button>
		</div>
	</div>
</template>