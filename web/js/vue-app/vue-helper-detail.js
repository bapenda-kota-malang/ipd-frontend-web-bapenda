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
		this.data = res.data;
	}

}
