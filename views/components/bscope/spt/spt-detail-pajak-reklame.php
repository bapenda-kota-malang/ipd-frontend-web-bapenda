<template v-if="rekening_objek == '04'">
	<div class="row g-0">
		<div class="xc-md-4 xc-lg-3 xc-xl-2 mt-1">Judul Reklame</div>
		<div class="xc-md xc-lg mb-2">
			<input v-model="data.spt.judulReklame" class="form-control">
		</div>
	</div>
	<div class="row g-0">
		<div class="xc-md-4 xc-lg-3 xc-xl-2 mt-1">Produk Reklame</div>
		<div class="xc-md xc-lg mb-2">
			<input v-model="data.spt.namaProduk" class="form-control">
		</div>
	</div>
	<div class="row g-0">
		<div class="col-lg">
			<div class="row g-0">
				<div class="xc-md-4 xc-lg-6 xc-xl-4">Nama Penyewa</div>
				<div class="xc-md xc-lg mb-2">
					<input v-model="data.spt.namaPenyewa" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-lg">
			<div class="row g-0">
				<div class="xc-md-4 xc-lg-6 xc-xl-5 text-lg-end pe-2">Alamat Penyewa</div>
				<div class="xc-md xc-lg mb-2">
					<input v-model="data.spt.alamatPenyewa" class="form-control">
				</div>
			</div>
		</div>
	</div>
	<div class="row g-0 mb-3">
		<div class="xc-md-4 xc-lg-3 xc-xl-2 mt-1">Masa Pajak</div>
		<div class="xc-md-6 xc-lg-3 xc-xl-2 mb-2">
			<input v-model="data.spt.jenisMasa" class="form-control">
		</div>
		<div class="xc-md-4 xc-lg-3 xc-xl-2 mt-1 pe-2 text-md-end">Jml Tahun</div>
		<div class="xc-md-6 xc-lg-3 xc-xl-2 mb-2">
			<input v-model="data.spt.jumlahTahun" class="form-control">
		</div>
		<div class="xc-md-4 xc-lg-3 xc-xl-2 mt-1 pe-2 text-lg-end">Jml Bulan</div>
		<div class="xc-md-6 xc-lg-3 xc-xl-2 mb-2">
			<input v-model="data.spt.jumlahBulan" class="form-control">
		</div>
		<div class="xc-md-4 xc-lg-3 xc-xl-2 mt-1 pe-2 text-md-end text-lg-start text-xl-end">Jml Minggu</div>
		<div class="xc-md-6 xc-lg-3 xc-xl-2 mb-2">
			<input v-model="data.spt.jumlahMinggu" class="form-control">
		</div>
		<div class="xc-md-4 xc-lg-3 xc-xl-2 mt-1 pe-2 text-lg-end">Jml Hari</div>
		<div class="xc-md-6 xc-lg-3 xc-xl-2 mb-2">
			<input v-model="data.spt.jumlahHari" class="form-control">
		</div>
	</div>
	<table class="table fit-form-control">
		<thead>
			<tr>
				<th>Jenis Reklame</th>
				<th>Lokasi</th>
				<th>No. Persil</th>
				<th style="width:60px">Jml.<br />Reklame</th>
				<th style="width:60px">Jml.<br />Sisi</th>
				<th style="width:60px">Pjg.</th>
				<th style="width:60px">Lbr.</th>
				<th style="width:60px">Diameter</th>
				<th style="width:60px">Luas</th>
				<th>Pengurang</th>
				<th>Tarif Pajak</th>
				<th>Jml. Pajak</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(item, idx) in data.dataDetails">
				<td><input v-model="data.dataDetails[idx].tarifReklame_id" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].lokasi" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].nomorPersil" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].jumlah" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].sisi" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].panjang" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].lebar" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].diameter" class="form-control"></td>
				<td><input v-model="data.dataDetails[idx].dikson" class="form-control"></td>
				<td>
					<vueselect v-model="data.dataDetails[idx].tarifReklame_id" :options="tarifReklameList" :reduce="item => item.id" label="jenisReklame" code="id" />
				</td>
				<td><input v-model="data.dataDetails[idx].jumlahRp" class="form-control"></td>
				<td class="nav">
					<button class="btn bg-danger">
						<i class="bi bi-x-lg" @click="delDetail(idx)"></i>
					</button>
				</td>
			</tr>
		</tbody>
	</table>
</template>
