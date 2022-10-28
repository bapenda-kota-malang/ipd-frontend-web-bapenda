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
	},
	methods: {
		goTo(path, event){
			className = event.target.className;
			if(!event.target.dataset.bsToggle)
				window.location.pathname = path;
		},
	}
}).mount('#main')
