data = { ...changePassword }
vars = { }
refs = { }
refSources = { }
urls = {
	preSubmit: '/',
	postSubmit: '/',
	submit: '/account'
}
methods = {
	showGantiPassword,
	submitGantiPassword,
}
appEl = '#vueBox';
changePasswordModal = null;

function showGantiPassword() {
	if(!changePasswordModal) {
		entryFormModal = new bootstrap.Modal('#gantiPasswordModal');
	}
	entryFormModal.show();
}

async function submitGantiPassword() {
	this.mainMessage.show = false;
	cleanArrayString(this.dataErr)
	res = await apiFetch('/account/change-password', 'PATCH', this.data);
	if(res.success) {
		this.data.oldPassword = '';
		this.data.newPassword = '';
		this.data.rePassword = '';
		entryFormModal.hide();
	} else {
		applyErrMessage(res.message, this.mainMessage, this.dataErr);
		this.$forceUpdate();
	}
}
