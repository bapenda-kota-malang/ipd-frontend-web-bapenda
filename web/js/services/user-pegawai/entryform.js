const { createApp } = Vue
const messages = [];

var app = new Vue({
	el: '#main',
	data: {
		id: 0,
		ref_id:0,
		noData: false,
		position: 1,
		dataPegawai: {
			// pegawai
			nama: '',
			nip: '',
			jabatan_id: 0,
			golongan_id: 0,
			pangkat_id: 0,
			skpd_id: 0,
			// user
			name: '',
			password: '',
			email: '',
			notes: '',
			validPeriod: null,
			// sysAdmin: 0,
			// description: '',
			group_id: 0,
		},
		dataPegawaiErr: {
			// pegawai
			nama: '',
			nip: '',
			jabatan_id: '',
			golongan_id: '',
			pangkat_id: '',
			skpd_id: '',
			// user
			name: '',
			password: '',
			email: '',
			notes: '',
			validPeriod: null,
			// sysAdmin: 0,
			// description: '',
			group_id: '',
		},
		dataPPAT: {
			// ppat
			namaLengkap: '',
			alamat: '',
			nik: '',
			name: '',
			// user
			name: '',
			password: '',
			email: '',
			notes: '',
			validPeriod: null,
			// sysAdmin: 0,
			// description: '',
			group_id: 0,
		},
		dataPPATErr: {
			position: '1',
			name: '',
			password: '',
			email: '',
			notes: '',
			validPeriod: '',
			sysAdmin: '',
			description: '',
			groupId: '',
			namaLengkap: '',
			alamat: '',
			nik: '',
		},
		group: [],
		jabatans: jabatans,
		golongans: golongans,
		pangkats: pangkats,
		skpds: skpds,
		showMessage: false,
		message: '',
	},
	created: async function() {
		// 	
		this.id = document.getElementById('id').value;
		if(this.id > 0) {
			res = await getDetail('/user/' + this.id);
			if(typeof res.data == 'object') {
				dataUser = res.data;
				this.ref_id = dataUser.ref_id;
				this.position = 1;
				if(dataUser.ref_id) {
					res = await getDetail('/pegawai/' + dataUser.ref_id);
					this.dataPegawai = res.data;
					this.dataPegawai.group_id = dataUser.group_id;
					this.dataPegawai.name = dataUser.name;
					this.dataPegawai.email = dataUser.email;
					this.dataPegawai.notes = dataUser.notes;	
				} else {
					this.dataPegawai = {};
					this.dataPegawai.group_id = dataUser.group_id;
					this.dataPegawai.name = dataUser.name;
					this.dataPegawai.email = dataUser.email;
					this.dataPegawai.notes = dataUser.notes	
				}
			}
		}
		//
		res = await apiFetchData('/group?no_pagination=true', messages);
		this.group = typeof res.data != 'undefined' ? res.data : [];
	},
	methods: {
		async submitData() {
			cleanArrayString(this.dataPegawaiErr)
			cleanArrayString(this.dataPPATErr)
			apiPath = '/pegawai';
			data = this.dataPegawai
			if(this.id == 0) {
				res = await apiFetch(apiPath, 'POST', data);
			} else {
				if(this.ref_id) {
					res = await apiFetch(apiPath + '/' + this.ref_id, 'PATCH', data);
				} else {
					res = await apiFetch(apiPath + '/' + this.id + '/updatenew', 'PATCH', data);
				}
			}
			if(res.success) {
				window.location.href = '/konfigurasi/manajemen-user/user';
			} else {
				if(res.message != undefined) {
					applyErrMessage(res.message, this, this.dataPegawaiErr);
				}

			}
		}
	}
})

async function getDetail(path) {
	res = await apiFetch(path)
	if(res.success) {
		return res.data;
	} else {
		messages.push('gagal mengambil data');
		return { data: [] };
	}
}
