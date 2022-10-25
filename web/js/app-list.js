const { createApp } = Vue

messages = [];

if(typeof urls == 'undefined') {
	urls =  {
		dataSrc: location.pathname + location.search,
	}
}

createApp({
	data() {
		return {
			data:[],
			noData: false,
			...refs,
			pathname: location.pathname,
			urls,
		}
	},
	async mounted() {
		if(typeof useDummySoure != 'undefined') {
			return;
		}
		res = await apiFetchData(urls.dataSrc, messages);
		this.data = typeof res.data != 'undefined' ? res.data : [];
	},
	methods: {
		goTo(path){
			window.location.pathname = path;
		},
	}
}).mount('#main')
