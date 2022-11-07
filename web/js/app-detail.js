const { createApp } = Vue

messages = [];

if(typeof urls == 'undefined') {
	urls =  {
		dataSrc: location.pathname + location.search,
	}
}

methods = typeof methods == 'object' ? methods : {};

createApp({
	data() {
		return {
			data:data,
			noData: false,
			// pathname: location.pathname,
			...vars,
			urls,
		}
	}, 
	async mounted() {
		if(typeof useDummySoure != 'undefined') {
			return;
		}
		res = await apiFetchData(urls.dataSrc, messages);
		if(typeof res.data != 'undefined') {
			if(typeof postDataFetch == 'function') {
				postDataFetch(res.data, this)
			}
			this.data = res.data;
		}

		// some additional function for mounted
		if(typeof mounted == 'function') {
			mounted(this);
		}
	},
	methods: {
		goTo(path){
			window.location.pathname = path;
		},
		...methods
	}
}).mount('#main')
