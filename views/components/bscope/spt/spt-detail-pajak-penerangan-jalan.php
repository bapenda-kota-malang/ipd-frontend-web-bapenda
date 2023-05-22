<div v-if="rekening_objek == '05' && rekening_rincian == '01'">
	<div class="row g-1">
		<div class="col-md-3 border-bottom">Jenis PPJ</div>
		<div class="col-md-3 border-bottom">Jumlah Pelanggan</div>
		<div class="col-md-3 border-bottom">Jumlah Rekening</div>
	</div>
	<div v-for="(item, idx) in data.dataDetails" class="row g-1">
		<div class="col-md-3">
			<select v-model="data.dataDetails[idx].jenisPpj_id" class="form-select">
				<option v-for="(item) in jenisPpjs" :value="item.id">{{item.jenisPpj}}</option>
			</select>
		</div>
		<div class="col-md-3">
			<input v-model="data.dataDetails[idx].jumlahPelanggan" class="form-control">
		</div>
		<div class="col-md-3">
			<input v-model="data.dataDetails[idx].jumlahRekening" class="form-control">
		</div>
	</div>
</div>
<div v-else-if="rekening_objek == '05' && rekening_rincian == '02'" class="row g-1">
	<div class="xc-lg-4 xc-xl-3 pt-1">Jenis Mesin Penggerak</div>
	<div class="xc-lg-6 xc-xl-2"><input v-model="data.dataDetails.jenisMesinPenggerak" class="form-control"></div>
	<div class="xc-lg-4 xc-xl-3 pt-1 text-lg-end pe-2">Tahun Mesin</div>
	<div class="xc-lg-6 xc-xl-2"><input v-model="data.dataDetails.tahunMesin" class="form-control"></div>
	<div class="xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Daya Mesin</div>
	<div class="xc-lg-6 xc-xl-2"><input v-model="data.dataDetails.dayaMesin" class="form-control"></div>
	<div class="xc-lg-4 xc-xl-3 pt-1 text-lg-end pe-2">Beban Mesin</div>
	<div class="xc-lg-6 xc-xl-2"><input v-model="data.dataDetails.bebanMesin" class="form-control"></div>
	<div class="xc-lg-4 xc-xl-3 pt-1">Jumlah Jam</div>
	<div class="xc-lg-6 xc-xl-2"><input v-model="data.dataDetails.jumlahJam" class="form-control"></div>
	<div class="xc-lg-4 xc-xl-3 pt-1 text-lg-end pe-2">Jumlah Hari</div>
	<div class="xc-lg-6 xc-xl-2"><input v-model="data.dataDetails.jumlahHari" class="form-control"></div>
	<div class="xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Listrik PLN</div>
	<div class="xc-lg-6 xc-xl-2 pt-1">
		<div class="form-check form-check-inline me-1">
			<input type="radio" name="listrikPlnRadio" v-model="data.dataDetails.listrikPLN" v-bind:value="true" class="form-check-input" id="listrikPlnYa">
			<label class="form-check-label" for="listrikPlnYa">Ya</label>
		</div>
		<div class="form-check form-check-inline me-0">
			<input type="radio" name="listrikPlnRadio" v-model="data.dataDetails.listrikPLN" v-bind:value="false" class="form-check-input" id="listrikPlnTidak">
			<label class="form-check-label" for="listrikPlnTidak">Tidak</label>
		</div>
	</div>
</div>
