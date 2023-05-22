<div v-if="!rekening_objek" class="p-3 text-center">
	<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
</div>
<div v-else>
	<table class="table custom">
		<thead>
			<tr>
				<th>No SPTPD/SKPDKB</th>
				<th>Masa Pajak</th>
				<th>Nominal</th>
				<th>Tanggal Pembayaran</th>
			</tr>
		</thead>
		<tbody>
			<template v-if="riwayat.length>0">
				<tr v-for="(item, idx) in riwayat">
					<td>{{item.nomorSpt}}</td>
					<td>{{item.masaPajak}}</td>
					<td>{{item.jumlahPajak}}</td>
					<td>{{item.tanggalBayar}}</td>
				</tr>
			</template>
			<template v-else>
				<td colspan="4" class="p-3 text-center">Tidak ada data</td>
			</template>
		</tbody>
	</table>
</div>
