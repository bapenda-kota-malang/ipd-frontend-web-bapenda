<template v-if="rekening_objek == '03'">
	<div class="row g-0">
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pengunjung Weekday</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input :value="data.detailSptHiburan.pengunjungWeekday" class="form-control" disabled />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pengunjung Weekend</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input :value="data.detailSptHiburan.pengunjungWeekend" class="form-control" disabled />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekday</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input :value="data.detailSptHiburan.pertunjukanWeekday" class="form-control" disabled />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekend</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input :value="data.detailSptHiburan.pertunjukanWeekend" class="form-control" disabled />
		</div>
	</div>
	<div class="row g-0">
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jumlah Meja</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input :value="data.detailSptHiburan.jumlahMeja" class="form-control" disabled />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Ruangan</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input :value="data.detailSptHiburan.jumlahRuangan" class="form-control" disabled />
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Karcis Bebas</div>
		<div class="xc-md-3 xc-lg-2 mb-3 pt-1">
			<strong>{{ data.detailSptHiburan.karcisBebas ? 'Ya' : 'Tidak' }}</strong>
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Karcis Bebas</div>
		<div class="xc-md-3 xc-lg-2 mb-2">
			<input :value="data.detailSptHiburan.jumlahKarcisBebas" class="form-control" disabled />
		</div>
	</div>
	<div class="row g-2">
		<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Mesin Tiket</div>
		<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-3 pt-1">
			<strong>{{ data.detailSptHiburan.mesinTiket ? 'Ya' : 'Tidak' }}</strong>
		</div>
		<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
		<div class="xc-md-5 xc-lg-4 xc-xl-2 pt-1 text-xl-end">Pembukuan</div>
		<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-3 pt-1">
			<strong>{{ data.detailSptHiburan.pembukuan ? 'Ya'  : 'Tidak' }}</strong>
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
					<tr v-for="(item, idx) in data.detailSptHiburan.kelas">
						<td>
							<input :value="data.detailSptHiburan.kelas[idx]" class="form-control" disabled>
						</td>
						<td>
							<input :value="data.detailSptHiburan.tarif[idx]" class="form-control" disabled>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>