id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...regNpwpdDetail}
urls = {
	dataSrc: '/regnpwpd/' +id
}
vars = {
	golongans,
	jabatans,
}
methods = {
	approveRequest: function() { approveRequest(this) },
	rejectRequest: function() { rejectRequest(this) },
} 

function mounted(xthis) {
	if(xthis.data.verifyStatus != '0') {
		xthis.hideApproval = true;
	}
}

async function approveRequest() {
	res = await apiFetch('/regnpwpd/' + this.id + '/setverifystatus', 'PATCH',
		{ verifyStatus:1 });
	window.location.reload()
}
async function  rejectRequest() {
	res = await apiFetch('/regnpwpd/' + this.id + '/setverifystatus', 'PATCH',
		{ verifyStatus:2 });
	window.location.reload()
}
