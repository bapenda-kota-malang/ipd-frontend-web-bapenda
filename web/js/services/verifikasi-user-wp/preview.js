const { createApp } = Vue

createApp({
	data() {
		return {
			id: null,
			data:{},
			dataUser:{},
			hideApproval: false,
			userStatuses: [
				'Baru',
				'Aktif',
				'Diblokir',
				'Ditolak',
			],
		}
	},
	async mounted() {
		this.id = document.getElementById('id').value;
		if(this.id > 0) {
			res = await apiFetch('/user/' + this.id)
			this.dataUser = res.data.data
			res = await apiFetch('/wajibpajak/' + this.dataUser.ref_id);
			this.data = res.data.data;
			if(this.dataUser.status != '0') {
				this.hideApproval = true;
			}
		}
	},
	methods: {
		async approveRequest() {
			res = await apiFetch('/user/' + this.id + '/verifikasi', 'PATCH',
				{ status:1 });
			window.location.reload()
		},
		async rejectRequest() {
			res = await apiFetch('/user/' + this.id + '/verifikasi', 'PATCH',
				{ status:3 });
			window.location.reload()
		}
	}
}).mount('#main')

// $(function() {
// 	$('#tglNpwpd').datepicker();
// });