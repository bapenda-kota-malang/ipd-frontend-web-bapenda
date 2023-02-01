Vue.component('dbkb-fasum-item', {
	template: `
		<table class="w-100" :class="!noMb ? 'mb-2' : ''">
			<colgroup>
				<col style="width:5%" />
				<col style="" />
				<col style="width:5%" />
				<col style="width:10%" />
				<col style="width:10%" />
				<col style="width:120px" />
				<col style="width:120px" />
				<col style="width:50px" />
			</colgroup>
			<thead v-if="!hideHeader">
				<tr>
					<td style="width:50px">Kode</td>
					<td>Fasilitas</td>
					<td>Satuan</td>
					<td>Status</td>
					<td>Ketergantungan</td>
					<td class="text-end">Nilai Lama</td>
					<td class="text-end">Nilai Baru</td>
				</tr>
			</thead>
			<tbody>
				<tr v-if="value && !Array.isArray(value)">
					<td><input :value="data.kode" class="form-control" disabled /></td>
					<td><input :value="data.nama" class="form-control" disabled /></td>
					<td><input :value="data.satuan" class="form-control" disabled /></td>
					<td><input :value="data.status" class="form-control" disabled /></td>
					<td><input class="form-control" disabled /></td>
					<td><input :value="value.nilaiLama" class="form-control text-end" disabled /></td>
					<td><input v-model="nilaiBaru" class="form-control text-end" /></td>
					<td class="nav">
						<button v-if="showSaveButton" @click="save()" class="btn bg-blue"><i class="bi bi-check-lg"></i></button>
					</td>
				</tr>
				<tr v-else-if="Array.isArray(value)" v-for="(item,idx) in value">
					<td><input :value="data.kode" class="form-control" disabled /></td>
					<td><input :value="data.nama + ' ' + item.nama" class="form-control" disabled /></td>
					<td><input :value="data.satuan" class="form-control" disabled /></td>
					<td><input :value="data.status" class="form-control" disabled /></td>
					<td><input class="form-control" disabled /></td>
					<td><input :value="item.nilaiLama" class="form-control text-end" disabled /></td>
					<td><input v-model="nilaiBarus[idx]" class="form-control text-end" /></td>
					<td class="nav">
						<button v-if="showSaveButtons[idx]" @click="save(idx)" class="btn bg-blue"><i class="bi bi-check-lg"></i></button>
					</td>
				</tr>
				<tr v-else>
					<td>{{value}}</td>
				</tr>
				</tbody>
		</table>`,
	props: {
		hideHeader: Boolean,
		noMb: Boolean,
		data: Object,
		value: null,
		url: '',
	},
	data:function() {
		return {
			nilaiBaru: 0,
			nilaiBarus: [],
			showSaveButton: false,
			showSaveButtons: [],
		}
	},
	created: function(){
		// console.log(this.value);
		// this.nilaiBaruAwal = this.value.nilaiBaru;
	},
	watch: {
		value: function() {
			if(this.value && !Array.isArray(this.value)) {
				this.nilaiBaru = this.value.nilaiBaru;
			}
			if(this.value && Array.isArray(this.value)) {
				xthis = this;
				this.value.forEach(function(item, idx) {
					xthis.nilaiBarus[idx] = item.nilaiBaru;
					xthis.showSaveButtons[idx] = false;
				})
			}
		},
		nilaiBaru: function() {
			if(this.nilaiBaru != this.value.nilaiBaru) {
				this.showSaveButton = true;
			} else {
				this.showSaveButton = false;
			}
		},
		nilaiBarus: function() {
			xthis = this;
			this.nilaiBarus.forEach(function(item, idx){
				if(item != xthis.value[idx].nilaiBaru) {
					xthis.showSaveButtons[idx] = true
				} else {
					xthis.showSaveButtons[idx] = false;
				}
			});
		}
	},
	methods: {
		async save(idx) {
			value_id = null;
			data = {
				tahun: this.data.tahun,
				provinsi_kode: this.data.provinsi_kode,
				daerah_kode: this.data.daerah_kode,
			}

			if(!idx) {
				if(!this.value.id) {
					data.nilai = this.nilaiBaru;
					res = await apiFetch(this.url, 'POST', data);
				} else {
					res = await apiFetch(`${this.ur}/${this.value.id}`, 'PATCH', {
						nilai: this.nilaiBaru
					});
				}
			} else {
				value = values[idx];
				if(!value.id) {
					data = {
						tahun: this.data.tahun,
						nilai: this.nilaiBaru,
					}
					if(values[idx].klsBintang) {
						data.klsBintang = value.klsBintang;
					} else {
						data.klsDepMin = value.klsDepMin;
						data.klsDepMax = value.klsDepMax;
					}
					res = await apiFetch(this.url, 'POST', data);
				} else {
					res = await apiFetch(`${this.ur}/${value.id}`, 'PATCH', {
						nilai: this.nilaiBarus[idx],
					})
				}
			}
		}
	}
});
