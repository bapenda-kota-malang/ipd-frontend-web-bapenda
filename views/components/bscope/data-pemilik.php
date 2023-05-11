<div class="form-check">
	<label class="form-check-label">
		<input v-model="autoPemilik" @change="cekAutoPemilik" class="form-check-input" type="checkbox">
		Data pemilik sama dengan data object pajak
	</label>
</div>
<div v-if="data.golongan==2" class="h6">Perusahaan</div>
<table class="table table-bordered mb-2">
	<thead>
		<tr>
			<th>Nama *</th>
			<th v-if="data.golongan!=2">NIK</th><th v-else>NIB</th>
			<th>Alamat *</th>
			<th style="width:250px">Kota / Kabupaten *</th>
			<th style="min-width:175px">Kelurahan *</th>
			<th>No Telp *</th>
			<th style="width:30px"></th>
		</tr>
	</thead>
	<tbody>
		<tr v-if="data.<?= $pemilikVarName ?>.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
		<tr v-else v-for="(item, idx) in data.<?= $pemilikVarName ?>" class="fit-form-control">
			<td>
				<input class="form-control" v-model="item.nama" />
				<span class="text-danger" v-if="dataErr['<?= $pemilikVarName ?>['+idx+'].nama']">{{dataErr['<?= $pemilikVarName ?>['+idx+'].nama']}}</span>
			</td>
			<td>
				<input class="form-control" v-model="item.nik" />
				<span class="text-danger" v-if="dataErr['<?= $pemilikVarName ?>['+idx+'].nik']">{{dataErr['<?= $pemilikVarName ?>['+idx+'].nik']}}</span>
			</td>
			<td>
				<input class="form-control" v-model="item.alamat" :disabled="autoPemilik && idx===0" />
				<span class="text-danger" v-if="dataErr['<?= $pemilikVarName ?>['+idx+'].alamat']">{{dataErr['<?= $pemilikVarName ?>['+idx+'].alamat']}}</span>
			</td>
			<td>
				<div>
					<vueselect v-model="item.daerah_id"
						:options="daerahs"
						:reduce="thisTtem => thisTtem.id"
						label="nama"
						code="id"
						:clearable="false"
						:disabled="autoPemilik && idx===0"
						@option:selected="refreshSelect(item.daerah_id, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', pemilikLists[idx].kelurahans, 'kode')"
					/>
				</div>
				<span class="text-danger" v-if="dataErr['<?= $pemilikVarName ?>['+idx+'].daerah_id']">{{dataErr['<?= $pemilikVarName ?>['+idx+'].daerah_id']}}</span>
			</td>
			<td>
				<div>
					<vueselect v-model="item.kelurahan_id"
						:options="pemilikLists[idx].kelurahans"
						:reduce="item => item.id"
						label="nama"
						code="id"
						:disabled="autoPemilik && idx===0"
					/>
				</div>
				<span class="text-danger" v-if="dataErr['<?= $pemilikVarName ?>['+idx+'].kelurahan_id']">{{dataErr['<?= $pemilikVarName ?>['+idx+'].kelurahan_id']}}</span>
			</td>
			<td>
				<input class="form-control" v-model="item.telp" :disabled="autoPemilik && idx===0" >
				<span class="text-danger" v-if="dataErr['<?= $pemilikVarName ?>['+idx+'].telp']">{{dataErr['<?= $pemilikVarName ?>['+idx+'].telp']}}</span>
			</td>
			<td class="text-center">
				<button v-if="idx>0" @click="delPemilik(idx)" class="btn btn-xs bg-danger p-1">
					<i class="bi bi-x-lg"></i>
				</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="text-danger" v-if="dataErr.pemilik">{{dataErr.pemilik}}</div>
<button @click="addPemilik()" class="btn bg-blue">Tambah</button>
<div v-if="data.golongan==2">
	<hr />
	<div class="h6">Direktur Perusahaan</div>
	<table class="table table-bordered mb-2">
		<thead>
			<tr>
				<th>Nama</th>
				<th v-if="data.golongan==2">NIK</th><th v-else>NIB</th>
				<th>Alamat</th>
				<th style="width:250px">Kota / Kabupaten</th>
				<th style="min-width:175px">Kelurahan</th>
				<th>No Telp</th>
				<th style="width:30px"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-if="data.<?= $pemilikVarName ?>.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
			<tr v-else v-for="(item, idx) in data.<?= $pemilikVarName ?>" class="fit-form-control">
				<td><input class="form-control" v-model="item.direktur_nama" ></td>
				<td><input class="form-control" v-model="item.direktur_nik" ></td>
				<td><input class="form-control" v-model="item.direktur_alamat" ></td>
				<td>
					<div>
						<vueselect v-model="item.direktur_daerah_id"
							:options="daerahs"
							:reduce="thisTtem => thisTtem.id"
							label="nama"
							code="id"
							:clearable="false"
							@option:selected="refreshSelect(item.direktur_daerah_id, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', pemilikLists[idx].direktur_kelurahans, 'kode')"
						/>
					</div>
				</td>
				<td>
					</div>
						<vueselect v-model="item.direktur_kelurahan_id"
							:options="pemilikLists[idx].direktur_kelurahans"
							:reduce="item => item.id"
							label="nama"
							code="id"
						/>
					</div>
				</td>
				<td><input class="form-control" v-model="item.direktur_telp" ></td>
				<td class="text-center">
					<button @click="delPemilik(idx)" class="btn btn-xs bg-danger p-1">
						<i class="bi bi-x-lg"></i>
					</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>
