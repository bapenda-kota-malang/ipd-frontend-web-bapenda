<div class="form-check">
	<label class="form-check-label">
		<input v-model="autoNarahubung" @change="cekAutoNarahubung" class="form-check-input" type="checkbox" value="">
		Data narahubung sama dengan data object pajak
	</label>
</div>
<table class="table table-bordered mb-2" disable>
	<thead>
		<tr>
			<th>Nama</th>
			<th>NIK</th>
			<th>Alamat</th>
			<th style="width:250px">Kota / Kabupaten</th>
			<th style="min-width:175px">Kelurahan</th>
			<th>No Telp</th>
			<th>Email</th>
			<th style="width:30px"></th>
		</tr>
	</thead>
	<tbody>
		<tr v-if="data.<?= $narahubungVarName ?>.length==0"><td class="text-center p-3" colspan="8">tidak ada data</td></tr>
		<tr v-else v-for="(item, idx) in data.<?= $narahubungVarName ?>" class="fit-form-control">
			<td>
				<input class="form-control" v-model="item.nama" />
				<span class="text-danger" v-if="dataErr['narahubung['+idx+'].nama']">{{dataErr['narahubung['+idx+'].nama']}}</span>
			</td>
			<td>
				<input class="form-control" v-model="item.nik" />
				<span class="text-danger" v-if="dataErr['narahubung['+idx+'].nik']">{{dataErr['narahubung['+idx+'].nik']}}</span>
			</td>
			<td>
				<input class="form-control" v-model="item.alamat" :disabled="autoNarahubung && idx===0" />
				<span class="text-danger" v-if="dataErr['narahubung['+idx+'].alamat']">{{dataErr['narahubung['+idx+'].alamat']}}</span>
			</td>
			<td>
				<div>
					<vueselect v-model="item.daerah_id"
						:options="daerahs"
						:reduce="thisTtem => thisTtem.id"
						label="nama"
						code="id"
						:clearable="false"
						:disabled="autoNarahubung && idx===0"
						@option:selected="refreshSelect(item.daerah_id, daerahs, '/kelurahan?kode={kode}&kode_opt=left&no_pagination=true', narahubungLists[idx].kelurahans, 'kode')"
					/>
				</div>
				<span class="text-danger" v-if="dataErr['narahubung['+idx+'].daerah_id']">{{dataErr['narahubung['+idx+'].daerah_id']}}</span>
			</td>
			<td>
				<div>
					<vueselect v-model="item.kelurahan_id"
						:options="narahubungLists[idx].kelurahans"
						:reduce="item => item.id"
						label="nama"
						code="id"
						:disabled="autoNarahubung && idx===0"
					/>
				</div>
				<span class="text-danger" v-if="dataErr['narahubung['+idx+'].kelurahan_id']">{{dataErr['narahubung['+idx+'].kelurahan_id']}}</span>
			</td>
			<td>
				<input class="form-control" v-model="item.telp" :disabled="autoNarahubung && idx===0" >
				<span class="text-danger" v-if="dataErr['narahubung['+idx+'].telp']">{{dataErr['narahubung['+idx+'].telp']}}</span>
			</td>
			<td>
				<input class="form-control" v-model="item.email" >
				<span class="text-danger" v-if="dataErr['narahubung['+idx+'].email']">{{dataErr['narahubung['+idx+'].email']}}</span>
			</td>
			<td class="text-center">
				<button @click="delNarahubung(idx)" class="btn btn-xs bg-danger p-1">
					<i class="bi bi-x-lg"></i>
				</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="text-danger" v-if="dataErr.narahubung">{{dataErr.narahubung}}</div>
<button @click="addNarahubung(this)" class="btn bg-blue">Tambah</button>
