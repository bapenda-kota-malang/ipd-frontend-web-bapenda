const { createApp } = Vue

messages = [];

createApp({
	data() {
		return {
			data:[],
			noData: false,
			assessments: assessments,
			golongans: golongans,
		}
	},
	async mounted() {
		xThis = this;
		res = await apiFetchData('/npwpd', messages);
		this.data = typeof res.data != 'undefined' ? res.data : [];
	},
	methods: {
		goTo(path){
			window.location.pathname = '/pendaftaran/wajib-pajak/' + path;
		},
	},
}).mount('#main')
