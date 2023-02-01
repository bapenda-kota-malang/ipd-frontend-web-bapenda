var useFetchData = typeof useFetchData != 'undefined' ? useFetchData : true;

async function getDetail() {
	if(typeof forcePostDataFetch != 'undefined') {					
		if(typeof postFetchData == 'function') {
			this.postFetchData(this.data);
		}
	}

	res = await apiFetchData(urls.dataSrc, messages);
	if(res && typeof res == 'object' && typeof res.data != 'undefined') {
		if(typeof postFetchData == 'function') {
			this.postFetchData(res.data)
		}
		if(this.useFetchData) {
			this.data = res.data;
		} else {
			this.fetchData = res.data;
		}
	}

}
