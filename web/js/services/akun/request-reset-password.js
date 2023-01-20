data = { ...resetPasswordDto }
vars = {
	success: false
 }
refs = { }
refSources = { }
urls = {
	preSubmit: '/',
	postSubmit: '/',
	submit: '/account/reset-password'
}
methods = {
}
appEl = '#vueBox';

function submitFailed(xthis, res) {
	xthis.dataErr.email = res.message
}

function postSubmit(xthis) {
	xthis.success = true;
}