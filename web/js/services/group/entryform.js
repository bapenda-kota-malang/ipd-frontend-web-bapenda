const { createApp } = Vue
const messages = [];

createApp({
	data() {
		return {
			id: null,
			noData: false,
			data: {
				name: '',
				description: '',
			},
			dataErr: {
				name: '',
				description: ''
			},
			menu: []
		}
	},
	async mounted() {
		this.id = document.getElementById('id').value;
		if(this.id > 0) {
			res = await getDetail(this.id);
			if(typeof res.data == 'object') {
				this.data = res.data;
			}
		}
		res = await apiFetchData('/menu', messages);
		this.menu = typeof res.data != 'undefined' ? res.data : [];
	},
	methods: {
		async saveData() {
			cleanArrayString(this.dataErr)
			if (!this.id) {
				res = await apiFetch('/group', 'POST', this.data)
			} else {
				res = await apiFetch('/group/' + this.id, 'PATCH', this.data)
			}
			if(res.success) {
				window.location.href = '/konfigurasi/manajemen-user/group';
			} else {
				if(res.message != undefined) {
					applyErrMessage(res.message, this, this.dataErr);
				} else {
					applyErrMessage("terjadi kesalahan pada proses", this);
				}

			}
		}
	}
}).mount('#main')

async function getDetail(id) {
	res = await apiFetch('/group/' + id)
	if(res.success) {
		return res.data;
	} else {
		messages.push('gagal mengambil data');
		return { data: [] };
	}
}
