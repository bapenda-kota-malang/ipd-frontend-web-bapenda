<div class="card mb-3">
	<div class="card-header">Wajib Pajak / Objek Pajak</div>
	<div class="p-3">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				NPWPD
			</div>
			<div class="col-md-5 col-lg-4 col-xl-2 mb-2">
				<input v-model="data.npwpd.npwpd" class="form-control" disabled />
			</div>
			<div class="d-none d-md-inline-block xc-md-1"></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2 text-md-end pe-lg-2">
				Tanggal
			</div>
			<div class="col-md-5 col-lg-4 col-xl-2 mb-2">
				<input :value="formatDate(data.createdAt, ['d','m','y'], '/')" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				Jenis Usaha
			</div>
			<div class="col-md-3 col-lg-2 xc-xl-2 mb-2">
				<input v-model="data.rekening.kode" class="form-control" disabled />
			</div>
			<div class="col-md col-lg-8 col-xl-7 mb-2">
				<input v-model="data.rekening.jenisUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				Nama Usaha
			</div>
			<div class="col-md mb-2">
				<input v-model="data.objekPajak.nama" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				Alamat
			</div>
			<div class="col-md mb-2">
				<input v-model="data.objekPajak.alamat" class="form-control" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2 text-md-end">
				RT/RW
			</div>
			<div class="col-md-2 xc-lg-2 xc-xl-2 mb-2">
				<input v-model="data.objekPajak.rtRw" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				Kelurahan
			</div>
			<div class="col-md col-lg-7 col-xl-6">
				<input  class="form-control" disabled />
				<!-- v-model="data.objekPajak.kelurahan.nama" -->
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Detail Objek Pajak</div>
	<div class="p-3">
		<div v-if="!rekening_objek" class="p-3 text-center" :class="{ 'd-none': !mountedStatus }">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<template v-else>
			<!-- Header -->
			<div v-if="rekening_objek == '01'" class="row g-1">
				<div class="col-md-3 border-bottom">Golongan Kamar</div>
				<div class="col-md-3 border-bottom">Tarif</div>
				<div class="col-md-3 border-bottom">Jumlah Kamar</div>
				<div class="col-md-3 border-bottom">Kamar yang Laku</div>
			</div>
			<div v-if="rekening_objek == '02'" class="row g-1">
				<div class="col-md-2 border-bottom">Jml Meja</div>
				<div class="col-md-2 border-bottom">Jml Kursi</div>
				<div class="col-md-3 border-bottom">Tarif Minuman</div>
				<div class="col-md-3 border-bottom">Tarif Makakan</div>
				<div class="col-md-2 border-bottom">Jml Pengunjung</div>
			</div>
			<div v-if="rekening_objek == '03'">
				<div class="row g-1">
					<div class="col-md-2 offset-4 text-center border-bottom">Pengunjung</div>
					<div class="col-md-2 text-center border-bottom">Pertunjukan</div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 border-bottom">Kelas</div>
					<div class="col-md-2 border-bottom">Tarif Minuman</div>
					<div class="col-md-1 border-bottom"><small>Weekday</small></div>
					<div class="col-md-1 border-bottom"><small>Weekend</small></div>
					<div class="col-md-1 border-bottom"><small>Weekday</small></div>
					<div class="col-md-1 border-bottom"><small>Weekend</small></div>
					<div class="col-md-2 border-bottom">Jumlah Meja</div>
					<div class="col-md-2 border-bottom">Jumlah Ruangan</div>
				</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '01'" class="row g-1">
				<div class="row g-0">
					<div class="col-md-3">
						<div class="col-md border-bottom">Jenis Mesin Penggerak</div>
					</div>
					<div class="col-md-5">
						<div class="row g-1">
							<div class="col-md-4 border-bottom">Tahun Mesin</div>
							<div class="col-md-4 border-bottom">Daya Mesin</div>
							<div class="col-md-4 border-bottom">Beban Mesin</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row g-1">
							<div class="col-md-4 border-bottom">Jumlah Jam</div>
							<div class="col-md-4 border-bottom">Jumlah Hari</div>
							<div class="col-md-4 border-bottom">Listrik PLN</div>
						</div>
					</div>
				</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '02'" class="row g-1">
				<div class="col-md-3 border-bottom">Jenis PPJ</div>
				<div class="col-md-3 border-bottom">Jumlah Pelanggan</div>
				<div class="col-md-3 border-bottom">Jumlah Rekening</div>
				<div class="col-md-3 border-bottom">Rarif</div>
			</div>
			<div v-if="rekening_objek == '07'" class="row g-1">
				<div class="col-md-4 border-bottom">Jenis Kendaraan</div>
				<div class="col-md-4 border-bottom">Kapasitas</div>
				<div class="col-md-4 border-bottom">Tarif</div>
			</div>
			<div v-if="rekening_objek == '08'" class="row g-1">
				<div class="col-md-4 border-bottom">Peruntukan</div>
				<div class="col-md-4 border-bottom">Jenis</div>
				<div class="col-md-4 border-bottom">Pengenaan</div>
			</div>
			<!-- Content -->
			<div v-if="rekening_objek == '01'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].golonganKamar" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].tarif" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahKamar" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahKamarYangLaku" type="number" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '02'" class="row g-1">
				<div class="col-md-2">
					<input v-model="data.dataDetails.jumlahMeja" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-2">
					<input v-model="data.dataDetails.jumlahKursi" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails.tarifMinuman" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails.tarifMakanan" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-2">
					<input v-model="data.dataDetails.jumlahPengunjung" type="number" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '03'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-2">
					<input v-model="data.dataDetails[idx].kelas" class="form-control" disabled>
				</div>
				<div class="col-md-2">
					<input v-model="data.dataDetails[idx].tarif" class="form-control" disabled>
				</div>
				<div class="col-md-1">
					<input v-model="data.dataDetails[idx].pengunjungWeekday" class="form-control" disabled>
				</div>
				<div class="col-md-1">
					<input v-model="data.dataDetails[idx].pengunjungWeekend" class="form-control" disabled>
				</div>
				<div class="col-md-1">
					<input v-model="data.dataDetails[idx].pertunjukanWeekday" class="form-control" disabled>
				</div>
				<div class="col-md-1">
					<input v-model="data.dataDetails[idx].pertunjukanWeekend" class="form-control" disabled>
				</div>
				<div class="col-md-2">
					<input v-model="data.dataDetails[idx].jumlahMeja" class="form-control" disabled>
				</div>
				<div class="col-md-2">
					<input v-model="data.dataDetails[idx].jumlahRuangan" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '01'" class="row g-1">
				<div class="col-md-3">
					<div class="col-md">
						<input v-model="data.dataDetails.jenisMesinPenggerak" class="form-control" disabled>
					</div>
				</div>
				<div class="col-md-5">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.dataDetails.tahunMesin" class="form-control" disabled>
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails.dayaMesin" class="form-control" disabled>
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails.bebanMesin" class="form-control" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].jumlahJam" class="form-control" disabled>						
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].jumlahHari" class="form-control" disabled>
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].listrikPLN" class="form-control" disabled>
						</div>
					</div>
				</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '02'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jenisPPJ_id" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahPelanggan" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahRekening" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].tarif" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '07'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].jenisKendaraan" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].kapasitas" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].tarif" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '08'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.dataDetails.peruntukan" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails.jenisAbt" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails.pengenaan" class="form-control" disabled>
				</div>
			</div>
		</template>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Estimasi Perhitungan</div>
	<div class="p-3">
		<div v-if="!rekening_objek" class="p-3 text-center">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<div v-else>
			<div class="row g-1">
				<div class="xc-lg-2 pt-1">Nomor SPT</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">Billing</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">Virtual Account</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-lg-2 pt-1">Periode Awal</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">Periode Awal</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">Jatuh Tempo</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-lg-2 pt-1">Subtotal E-Tax</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">E-Tax</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">Total E-Tax</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-lg-2 pt-1">Potensi</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">Tarif Pajak (%)</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
				<div class="xc-lg-3 pt-1 text-lg-end pe-lg-2">Jumlah</div>
				<div class="xc-lg-3 mb-2"><input type="text" class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-lg-2 pt-1">Keterangan</div>
				<div class="col-lg mb-2">
					<textarea v-model="payload.description" class="form-control"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-3">
	<div class="card-header">Lampiran</div>
	<div class="p-3">
		<div class="d-flex">
			<div>
				<div class="card p-2">
					<a :href="'/resources/pdf/'+data.attachment">File Lampiran</a>
				</div>
			</div>
		</div>
	</div>
</div>

