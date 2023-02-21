preSubmit = typeof preSubmit == 'function' ? preSubmit : function(){};

async function submitData() {
	this.mainMessage.show = false;
	cleanArrayString(this.dataErr)
    if(this.preSubmit(this) === false) {
        return;
    }
	if(!this.id) {
		res = await apiFetch(urls.submit.replace('/{id}', ''), 'POST', this.data);
	} else {
		res = await apiFetch(urls.submit.replace('{id}', this.id), 'PATCH', this.data);
	}
	if(res.success) {
		if(typeof postSubmit == 'function') {
			this.postSubmit(this);
		} else {
			if(typeof urls.postSubmit != 'undefined') {
				window.location.href = urls.postSubmit;
			} else if(typeof urls.pathname != 'undefined') {
				window.location.href = urls.pathname;
			} else {
				window.location.reload();
			}
		}
	} else {
		if(typeof submitFailed == 'function') {
			submitFailed(this, res);
		}
		if(typeof res.message !== 'undefined') {
			applyErrMessage(res.message, this.mainMessage, this.dataErr);
		}
	}
	this.$forceUpdate();
}
