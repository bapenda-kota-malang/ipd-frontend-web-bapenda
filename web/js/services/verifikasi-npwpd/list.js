const { createApp } = Vue
const messages = [];

createApp({
	data() {
		return {
			data:[],
			npwpdStatuses:npwpdStatuses,
			noData: false,
			golongans: golongans
		}
	},
	async mounted() {
		res = await apiFetchData('/registrasinpwpd', messages);
		this.data = typeof res.data != 'undefined' ? res.data : [];
	},
	methods: {
		goTo(path){
			window.location.pathname = '/pendaftaran/verifikasi-npwpd/' + path;
		},
	}
}).mount('#main')
