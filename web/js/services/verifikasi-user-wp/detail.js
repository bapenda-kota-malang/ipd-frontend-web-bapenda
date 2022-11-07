id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...userDetail}
urls = {
	dataSrc: '/user/' +id
}
vars = {
	dataWp: {...userDetail},
	hideApproval: false,
	userStatuses: [
		'Baru',
		'Aktif',
		'Diblokir',
		'Ditolak',
	],
}
methods = {
	approveRequest: function() { approveRequest(this) },
	rejectRequest: function() { rejectRequest(this) },
} 

async function mounted(xthis) {
	res = await apiFetch('/wajibpajak/' + xthis.data.ref_id);
	xthis.dataWp = res.data.data;
	if(xthis.data.status != '0') {
		xthis.hideApproval = true;
	}

}

async function approveRequest() {
	res = await apiFetch('/user/' + this.id + '/verifikasi', 'PATCH',
		{ status:1 });
	window.location.reload()
}

async function rejectRequest() {
	res = await apiFetch('/user/' + this.id + '/verifikasi', 'PATCH',
		{ status:3 });
	window.location.reload()
}
