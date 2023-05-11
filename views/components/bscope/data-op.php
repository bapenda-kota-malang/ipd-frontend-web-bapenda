<div class="row g-1">
	<div class="col-md-2 col-xl-1 pt-1">Nama *</div>
	<div class="col-md col-lg-4 mb-2">
		<input v-model="data.<?= $opVarName ?>.nama" class="form-control">
		<span class="text-danger" v-if="dataErr['<?= $opVarName ?>.nama']">{{dataErr['<?= $opVarName ?>.nama']}}</span>
	</div>
	<div class="col-md-2 pt-1 text-md-end pe-lg-2">NOP</div>
	<div class="col-md col-xl-3 mb-2">
		<input v-model="data.<?= $opVarName ?>.nop" class="form-control">
	</div>
</div>
<div class="row g-1">
	<div class="col-md-2 col-xl-1 pt-1">Alamat *</div>
	<div class="col-md-7 col-lg-5  mb-2">
		<input v-model="data.<?= $opVarName ?>.alamat" @keyup="cekAlamat" class="form-control">
		<span class="text-danger" v-if="dataErr['<?= $opVarName ?>.alamat']">{{dataErr['<?= $opVarName ?>.alamat']}}</span>
	</div>
	<div class="col-md-2 col-xl-1 col-lg-1 pt-1 text-md-end pe-lg-2">RT/RW *</div>
	<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">
		<input v-model="data.<?= $opVarName ?>.rtRw" maxlength="5" class="form-control">
		<span class="text-danger" v-if="dataErr['<?= $opVarName ?>.rtRw']">{{dataErr['<?= $opVarName ?>.rtRw']}}</span>
	</div>
</div>
<div class="row g-1">
	<div class="col-md-2 col-xl-1 pt-1">Kecamatan *</div>
	<div class="col-md mb-2">
		<div>
			<vueselect v-model="data.<?= $opVarName ?>.kecamatan_id"
				:options="kecamatans"
				:reduce="item => item.id"
				label="nama"
				code="id"
				@option:selected="refreshSelect(data.<?= $opVarName ?>.kecamatan_id, kecamatans, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahans, 'kode')"
			/>
		</div>
		<span class="text-danger" v-if="dataErr['<?= $opVarName ?>.kecamatan_id']">{{dataErr['<?= $opVarName ?>.kecamatan_id']}}</span>
	</div>
	<div class="col-md-2 col-xl-1 pt-1 text-md-end pe-lg-2">Kelurahan *</div>
	<div class="col-md mb-2">
		<div>
			<vueselect v-model="data.<?= $opVarName ?>.kelurahan_id"
				:options="kelurahans"
				:reduce="item => item.id"
				label="nama"
				code="id"
				@option:selected="cekKelurahan()"
			/>
		</div>
		<span class="text-danger" v-if="dataErr['<?= $opVarName ?>.kelurahan_id']">{{dataErr['<?= $opVarName ?>.kelurahan_id']}}</span>
	</div>
</div>
<div class="row g-1">
	<div class="col-md-2 col-xl-1 pt-1">Telpon</div>
	<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
		<input v-model="data.<?= $opVarName ?>.telp" @keyup="cekTelp" class="form-control">
		<span class="text-danger" v-if="dataErr['<?= $opVarName ?>.telp']">{{dataErr['<?= $opVarName ?>.telp']}}</span>
	</div>
</div>
