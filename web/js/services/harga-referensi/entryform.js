data = {...kelasBangunan};
vars = {
	options:['test', 'ok'],
}

urls = {
	preSubmit: '/pendataan/kelas-bangunan',
	postSubmit: '/pendataan/kelas-bangunan',
	submit: '/kelasbangunan/{id}',
	dataSrc: '/kelasbangunan',
}

refSources = {
}

methods = {
}

components = {
}

function mounted(xthis) {
	if(!xthis.id) {
	}
	xthis.jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	xthis.user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	xthis.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
    xthis.nip = document.getElementById('nip') ? document.getElementById('nip').value : null;
	console.log(xthis.user_id);

	const d = new Date();
	let year = d.getFullYear();
	// xthis.data.tahunAwalKelasBangunan = year;
	// xthis.data.tahunAkhirKelasBangunan = '9999';

    // xthis.data.nip = xthis.nip;
}

function preSubmit(xthis) {
	data = xthis.data

	console.log("preSubmit") 

	data.nilaiMinBangunan = parseFloat(data.nilaiMinBangunan);
	data.nilaiMaxBangunan = parseFloat(data.nilaiMaxBangunan);
	data.nilaiPerM2Bangunan = parseFloat(data.nilaiPerM2Bangunan);
		
}

function postDataFetch(data, xthis) {
	console.log("origin")
	console.log(data)

	if(xthis.id) {
	}
}

