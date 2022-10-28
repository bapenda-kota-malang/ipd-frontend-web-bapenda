const { createApp } = Vue;
const messages = [];

createApp({
	data() {
		return {
			// main
			id:0,
			data: {...pendaftaran},
			dataErr: {...pendaftaran},
			detailObjekPajak: [],
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
			tanggalPengukuhanTemp: null,
			tanggalNpwpdTemp: null,
			tanggalMulaiUsahaTemp: null,
			kodeJenisUsaha: 0,
			messages: ''
		}
	},
	async mounted() {
		console.log(this.data);
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
				this.data.tanggalPengukuhan = new Date(this.data.tanggalPengukuhan);
				this.data.tanggalNpwpd = new Date(this.data.tanggalNpwpd);
				this.data.tanggalMulaiUsaha = new Date(this.data.tanggalMulaiUsaha);
				if(typeof postFetch == 'function') {
					postFetch(this);
				}			
				if(typeof res.data.pemilik == 'object') {
					this.pemilik = res.data.pemilik;
				}
				if(typeof res.data.narahubung == 'object') {
					this.narahubung = res.data.narahubung;
				}
			}
		}
	},
	methods: {
		async submitData() {
			t1 = this.data.tanggalPengukuhan;
			t2 = this.data.tanggalNpwpd;
			t3 = this.data.tanggalMulaiUsaha;
			// xThis.data.wajibPajak.tanggalLahir = tl.getFullYear() + '-' + strCutRight('0' + (tl.getMonth() + 1), 2)  + '-' + strCutRight('0' + tl.getDate(), 2) + 'T00:00:00.653Z';
			this.tanggalPengukuhanTemp = t1;
			this.tanggalNpwpdTemp = t2;
			this.tanggalMulaiUsahaTemp = t3;

			this.data.tanggalPengukuhan = t1.getFullYear() + '-' + strCutRight('0' + (t1.getMonth() + 1), 2)  + '-' + strCutRight('0' + t1.getDate(), 2);
			this.data.tanggalNpwpd = t2.getFullYear() + '-' + strCutRight('0' + (t2.getMonth() + 1), 2)  + '-' + strCutRight('0' + t2.getDate(), 2);
			this.data.tanggalMulaiUsaha = t3.getFullYear() + '-' + strCutRight('0' + (t3.getMonth() + 1), 2)  + '-' + strCutRight('0' + t3.getDate(), 2);

			if(typeof this.detailObjekPajak[0] != undefined) {
				this.data.detailObjekPajak = { ...this.detailObjekPajak };
			}
			if(typeof this.pemilik[0] != undefined) {
				this.data.pemilik = { ...this.pemilik };
				delete this.data.pemilik[0].kotaList;
				delete this.data.pemilik[0].kecamatanList;
				delete this.data.pemilik[0].kelurahanList;
				}
			if(typeof this.narahubung[0] != undefined) {
				this.data.narahubung = { ...this.narahubung };
				delete this.data.narahubung[0].kotaList;
				delete this.data.narahubung[0].kecamatanList;
				delete this.data.narahubung[0].kelurahanList;
			}
			
			if (!this.id) {
				res = await apiFetch('/npwpd', 'POST', this.data)
			} else {
				res = await apiFetch('/npwpd/' + this.id, 'PATCH', this.data)
			}
			if(res.success) {
				window.location.href = '/pendaftaran/wajib-pajak';
			} else {
				applyErrMessage(this, res.message);
				this.data.tanggalPengukuhan = this.tanggalPengukuhanTemp;
				this.data.tanggalNpwpd = this.tanggalNpwpdTemp;
				this.data.tanggalMulaiUsaha = this.tanggalMulaiUsahaTemp;
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
			this.detailObjekPajak.push({
				klasifikasi: '',
				jumlahOp: '',
				unitOp: '',
				tarifOp: '',
				notes: '',
			});
		},
		delDetailObjekPajak(i){
			this.detailObjekPajak = this.detailObjekPajak.filter(function(value, index, arr){ 
				return index != i;
			});
		},
		addPemilik() {
			this.pemilik.push({
				nama: '',
				nik: '',
				alamat: '',
				rtRw: '',
				daerah_id: '',
				kecamatanList: [],
				kecamatan_id: 0,
				kelurahanList: [],
				kelurahan_id: 0,
				telp: '',
				// status: '',
				direktur_nama: '',
				direktur_nik: '',
				direktur_alamat: '',
				direktur_rtRw: '',
				direktur_daerah_id: null,
				direktur_kecamatanList: [],
				direktur_kecamatan_id: null,
				direktur_kelurahanList: [],
				direktur_kelurahan_id: null,
				direktur_telp: '',
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
				daerah_id: '',
				kecamatanList: [],
				kecamatan_id: 0,
				kelurahanList: [],
				kelurahan_id: 0,
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
		Datepicker: VueDatePicker,
		VueSelect: VueSelect.VueSelect,
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
	res = await apiFetch('/npwpd/' + id)
	if(res.success) {
		return res.data;
	} else {
		messages.push('gagal mengambil data');
		return { data: [] };
	}
}

function postFetch(xthis) {
	if(xthis.data.rekening.objek == '01') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakHotel;
	} else if(xthis.data.rekening.objek == '02') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakResto;
	} else if(xthis.data.rekening.objek == '03') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakHiburan;
	} else if(xthis.data.rekening.objek == '04') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakReklame;
	} else if(xthis.data.rekening.objek == '05') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakPeneranganJalan;
	} else if(xthis.data.rekening.objek == '06') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakHotel;
	} else if(xthis.data.rekening.objek == '07') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakParkir;
	} else if(xthis.data.rekening.objek == '08') {
		xthis.detailObjekPajak = xthis.data.detailObjekPajakAirTanah;
	}
}