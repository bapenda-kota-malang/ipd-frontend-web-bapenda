async function getDetail() {
    if(typeof forcePostDataFetch != 'undefined') {					
        if(typeof postDataFetch == 'function') {
            this.postDataFetch(this.data);
        }
    }

    res = await apiFetchData(urls.dataSrc, messages);
    if(res && typeof res == 'object' && typeof res.data != 'undefined') {
        if(typeof postDataFetch == 'function') {
            this.postDataFetch(res.data)
        }
        this.data = res.data;
    }

    // some additional function for mounted
    if(typeof mounted == 'function') {
        mounted(this);
    }
}
