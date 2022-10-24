const { createApp } = Vue
const messages = [];

createApp({
	data() {
		return {
			data:[],
			status:['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
			noData: false,
		}
	},
	async mounted() {
		res = await apiFetchData('/user?position=3', messages);
		this.data = typeof res.data != 'undefined' ? res.data : [];
	},
	methods: {
		goTo(path){
			window.location.pathname = '/pendaftaran/verifikasi-user-wp/' + path;
		},
	}
}).mount('#main')
