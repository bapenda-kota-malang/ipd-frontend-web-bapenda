const { createApp } = Vue;
const messages = [];

createApp({
	data() {
		return {
			// main
			id:0,
			data: pendaftaran,
			dataErr: pendaftaran,
			detail_op: [],
			pemilik: [],
			narahubung: [],
			format: format,
			// refs
			assessments: assessments,
			golongans: golongans,
			rekenings: [],
			kota: [],
			kecamatan: [],
			kelurahan: [],
			// 
			kodeJenisUsaha: 0,
			messages: ''
		}
	},
	async mounted() {
		res = await apiFetchData('/rekening?kodeJenisUsaha=1&kodeJenisUsaha_opt=>&no_pagination=true', messages);
		this.rekenings = typeof res.data != 'undefined' ? res.data : [];
		res = await apiFetchData('/daerah', messages);
		this.kota = typeof res.data != 'undefined' ? res.data : [];
		res = await apiFetchData('/kecamatan?daerah_kode=3573', messages);
		this.kecamatan = typeof res.data != 'undefined' ? res.data : [];
		// res = await apiFetchData('/kelurahan', messages);
		// this.kelurahan = typeof res.data != 'undefined' ? res.data : [];

		// editing mode
		this.id = document.getElementById('id').value;
		if(this.id > 0) {
			res = await getDetail(this.id);
			if(typeof res.data == 'object') {
				this.data = res.data;
				if(typeof res.data.detail_op_hotel == 'object') {
					this.detail_op[0] = res.data.detail_op_hotel[0];
				}
				if(typeof res.data.detail_op_reklame == 'object') {
					this.detail_op[0] = res.data.detail_op_reklame[0];
				}
				if(typeof res.data.detail_op_resto == 'object') {
					this.detail_op[0] = res.data.detail_op_resto[0];
				}
				if(typeof res.data.detail_op_parkir == 'object') {
					this.detail_op[0] = res.data.detail_op_parkir[0];
				}
				if(typeof res.data.detail_op_hotel == 'object') {
					this.detail_op[0] = res.data.detail_op_hotel[0];
				}
				if(typeof res.data.pemilik == 'object') {
					this.pemilik[0] = res.data.pemilik[0];
				}
				if(typeof res.data.narahubung == 'object') {
					this.narahubung[0] = res.data.narahubung[0];
				}
			}
		}
	},
	methods: {
		async saveData() {
			// tl = xThis.data.wajibPajak.tanggalLahir;
			// xThis.data.wajibPajak.tanggalLahir = tl.getFullYear() + '-' + strCutRight('0' + (tl.getMonth() + 1), 2)  + '-' + strCutRight('0' + tl.getDate(), 2) + 'T00:00:00.653Z';
		
			if(typeof this.detail_op[0] != undefined) {
				this.data.detail_op[0] = { ...this.detail_op[0] };
			}
			if(typeof this.pemilik[0] != undefined) {
				this.data.pemilik[0] = { ...this.pemilik[0] };
				delete this.data.pemilik[0].kotaList;
				delete this.data.pemilik[0].kecamatanList;
				delete this.data.pemilik[0].kelurahanList;
				}
			if(typeof this.narahubung[0] != undefined) {
				this.data.narahubung[0] = { ...this.narahubung[0] };
				delete this.data.narahubung[0].kotaList;
				delete this.data.narahubung[0].kecamatanList;
				delete this.data.narahubung[0].kelurahanList;
			}
			
			if (!this.id) {
				res = await apiFetch('/npwpd', 'POST', this.data)
			} else {
				res = await apiFetch('/npwpd' + this.id, 'PATCH', this.data)
			}
			if(res.success) {
				window.location.href = '/pendaftaran/wajib-pajak';
			} else {
				applyErrMessage(this, res.message);
			}	
		},
		async refreshKecamatan(myList, event) {
			myList.splice(0, myList.length)
			values = event.target.selectedOptions[0].text.split('-');
			res = await apiFetch('/kecamatan?daerah_kode=' + values[1].trim())
			res.data.data.forEach(function(item)  {
				myList.push(item)				
			});
		},
		async refreshKelurahan(myList, event) {
			myList.splice(0, myList.length)
			values = event.target.selectedOptions[0].text.split('-');
			res = await apiFetch('/kelurahan?kecamatan_kode=' + values[1].trim())
			res.data.data.forEach(function(item)  {
				myList.push(item)				
			});
		},
		addDetailObjekPajak() {
			this.detail_op.push({
				klasifikasi: '',
				jumlahOp: '',
				unitOp: '',
				tarifOp: '',
				notes: '',
			});
		},
		delDetailObjekPajak(i){
			this.detail_op = this.detail_op.filter(function(value, index, arr){ 
				return index != i;
			});
		},
		addPemilik() {
			this.pemilik.push({
				nama: '',
				nik: '',
				alamat: '',
				rtRw: '',
				kota_id: '',
				kecamatanList: [],
				kecamatan_id: '',
				kelurahanList: [],
				kelurahan_id: '',
				telp: '',
				// status: '',
			});
		},
		delPemilik(i){
			this.pemilik = this.pemilik.filter(function(value, index, arr){ 
				return index != i;
			});
		},
		addNarahubung() {
			this.narahubung.push({
				nama: '',
				nik: '',
				alamat: '',
				rtRw: '',
				kota_id: '',
				kecamatanList: [],
				kecamatan_id: '',
				kelurahanList: [],
				kelurahan_id: '',
				telp: '',
				// status: '',
			});
		},
		delNarahubung(i){
			this.narahubung = this.narahubung.filter(function(value, index, arr){ 
				return index != i;
			});
		},
	},
	components: {
		Datepicker: VueDatePicker
	}
}).mount('#main')

async function getRekening() {
	res = await apiFetch('/rekening')
	if(res.success) {
		return res.data;
	} else {
		messages.push('gagal mengambil data rekening');
		return { data: [] };
	}
}

async function getDetail(id) {
	res = await apiFetch('/registration/' + id)
	if(res.success) {
		return res.data;
	} else {
		messages.push('gagal mengambil data');
		return { data: [] };
	}
}

