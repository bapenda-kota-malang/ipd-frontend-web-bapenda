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
 
async function approveRequest() {
	res = await apiFetch('/registration/' + this.id + '/verifikasi', 'PATCH',
		{ status:1 });
	window.location.reload()
}
async function  rejectRequest() {
	res = await apiFetch('/registration/' + this.id + '/verifikasi', 'PATCH',
		{ status:3 });
	window.location.reload()
}
