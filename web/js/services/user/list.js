const { createApp } = Vue
const messages = [];

createApp({
	data() {
		return {
			data:[],
			noData: false,
		}
	},
	async mounted() {
		res = await apiFetchData('/user', messages);
		this.data = typeof res.data != 'undefined' ? res.data : [];
	},
	methods: {
		goTo(path){
			window.location.pathname = '/konfigurasi/manajemen-user/user/' + path;
		},
	}
}).mount('#vueBox')
