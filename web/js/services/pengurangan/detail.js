forcePostDataFetch = true;

id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...penguranganDetail}
urls = {
	dataSrc: '/pengurangan/' + id
}
vars = {
	npwpd: null,
}
methods = {
	konfirmApprove,
	submitTerbit,
	approveRequest,
	rejectRequest,
}

approveModal = null;
rejectModal = null;

function postDataFetch(data, xthis) {
	data.tanggalPengajuan = formatDate(new Date(data.tanggalPengajuan), ['d','m','y'], '/');
}

function konfirmApprove() {
	if(!approveModal) {
		approveModal = new bootstrap.Modal(document.getElementById('approveModal'))
	}
	approveModal.show();
}

async function submitTerbit() {
	res = await apiFetch(`/suratpemberitahuan/${id}`, 'PATCH', {
		status:1,
		tanggal: formatDate(new Date(), ['y','m','d']) + 'T00:00:00Z'
	});
	if(res.success) {
		window.location.reload();
	}
}

async function approveRequest() {
	res = await apiFetch('/pengurangan/verify/' + id, 'PATCH',
		{ status:1 });
	window.location.reload()
}

async function  rejectRequest() {
	res = await apiFetch('/pengurangan/verify/' + id, 'PATCH',
		{ status:2 });
	window.location.reload()
}

