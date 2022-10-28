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
			data:data,
			noData: false,
			pathname: location.pathname,
			...vars,
			urls,
		}
	}, 
	async mounted() {
		if(typeof useDummySoure != 'undefined') {
			return;
		}
		res = await apiFetchData(urls.dataSrc, messages);
		this.data = typeof res.data != 'undefined' ? res.data : [];

		// some additional function for mounted
		if(typeof mounted == 'function') {
			mounted(this);
		}
	},
	methods: {
		goTo(path){
			window.location.pathname = path;
		},
	}
}).mount('#main')
