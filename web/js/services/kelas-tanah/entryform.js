data = {...kelasTanah};
vars = {
	options:['test', 'ok'],
}

urls = {
	preSubmit: '/pendataan/kelas-tanah',
	postSubmit: '/pendataan/kelas-tanah',
	submit: '/kelastanah/{id}',
	dataSrc: '/kelastanah',
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
	// xthis.data.tahunAwalKelasTanah = year;
	// xthis.data.tahunAkhirKelasTanah = '9999';

    // xthis.data.nip = xthis.nip;
}


function preSubmit(xthis) {
	data = xthis.data

	console.log("preSubmit") 

	data.nilaiMinTanah = parseFloat(data.nilaiMinTanah);
	data.nilaiMaxTanah = parseFloat(data.nilaiMaxTanah);
	data.nilaiPerM2Tanah = parseFloat(data.nilaiPerM2Tanah);
	
}

function postDataFetch(data, xthis) {
	console.log("origin")
	console.log(data)

	if(xthis.id) {
	}
}

