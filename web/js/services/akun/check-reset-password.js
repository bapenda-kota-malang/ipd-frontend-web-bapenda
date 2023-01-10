data = { ...checkResetPasswordDto }
vars = {
	resetPasswordData: {...resetPasswordDto },
	resetPasswordDataErr: flattenClass(resetPasswordDto),
	email: getQueryParam('email'),
	token: getQueryParam('token'),
	valid: null,
	status: 'loading', // loading, valid, invalid, done
	messages: [],
 }
refs = { }
refSources = { }
urls = {
	dataSrc: `/account/reset-password?email=${vars.email}&token=${vars.token}`
}
methods = {
	submitData
}
appEl = '#vueBox';

function postDataFetch(res,  xthis) {
	console.log(xthis);
	xthis.status = 'valid';
}

function postDataFetchErr(messages) {
	this.status = 'invalid';
}

async function submitData() {
	res = await apiFetch(`/account/reset-password?email=${this.email}&token=${this.token}`, 'PATCH', this.resetPasswordData);
	if(res.success) {
		this.status = 'done';
	} else {
		if(typeof res.message !== 'undefined') {
			applyErrMessage(res.message, this.mainMessage, this.resetPasswordDataErr);
			this.$forceUpdate();
		}
	}
}

