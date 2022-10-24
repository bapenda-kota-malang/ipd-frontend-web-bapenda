const { createApp } = Vue

createApp({
	data() {
		return {
			id: null,
			data:{},
			objekPajak: [],
			detail_op: [],
			pemilik: [],
			narahubung: [],
			userStatuses: [
				'Baru',
				'Aktif',
				'Diblokir',
				'Ditolak',
			],
			hideApproval: false,
		}
	},
	async mounted() {
		this.id = document.getElementById('id').value;
		if(this.id > 0) {
			res = await apiFetch('/registration/' + this.id)
			this.data = res.data.data
			if(typeof this.data.objekPajak != 'undefined') {
				this.objekPajak = this.data.objekPajak;
			}
			if(typeof this.data.detail_op != 'undefined') {
				this.detail_op = this.data.detail_op;
			}
			if(typeof this.data.pemilik != 'undefined') {
				this.pemilik = this.data.pemilik;
			}
			if(typeof this.data.narahubung != 'undefined') {
				this.narahubung = this.data.narahubung;
			}
			if(this.data.status != '0') {
				this.hideApproval = true;
			}
		}
	},
	methods: {
		async approveRequest() {
			res = await apiFetch('/registration/' + this.id + '/verifikasi', 'PATCH',
				{ status:1 });
			window.location.reload()
		},
		async rejectRequest() {
			res = await apiFetch('/registration/' + this.id + '/verifikasi', 'PATCH',
				{ status:3 });
			window.location.reload()
		}
	}
}).mount('#main')

// $(function() {
// 	$('#tglNpwpd').datepicker();
// });