forcePostDataFetch = true;

id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {...suratTagihan}
urls = {
	dataSrc: '/suratpemberitahuan/' + id
}
vars = {
	npwpd: null,
}
methods = {
	konfirmTerbit,
	submitTerbit,
}

terbitModal = null;

function postDataFetch(data, xthis) {
	data.tanggal = formatDate(new Date(data.tanggal), ['d','m','y'], '/');
	data.suratPemberitahuanDetail.forEach(function (item, idx) {
		data.suratPemberitahuanDetail[idx].spt.tanggal = formatDate(new Date(item.spt.tanggal), ['d','m','y'], '/');
		data.suratPemberitahuanDetail[idx].spt.periode = formatDate(new Date(item.spt.periodeAwal), ['d','m','y'], '/') + ' s/d ' + formatDate(new Date(item.spt.periodeAkhir), ['d','m','y', '/']);
		data.suratPemberitahuanDetail[idx].spt.jatuhTempo = formatDate(new Date(item.spt.jatuhTempo), ['d','m','y'], '/');
		data.suratPemberitahuanDetail[idx].spt.status = suratPenagihanStatuses[item.status];
	});
}

function konfirmTerbit() {
	if(!terbitModal) {
		terbitModal = new bootstrap.Modal(document.getElementById('terbitModal'))
	}
	terbitModal.show();
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