data = {...responseVerifikasi};
vars = {
	statusKolektifs,
	jenisPelayanans,
	jenisPengurangans,
	alasanPengurangans,
	pekerjaans,
	statusKepemilikans,
	jenisBumis,
	kondisiBangunans,
	jenisKonstruksis,
	jenisAtaps,
	kodeDindings,
	kodeLantais,
	kodeLangitLangits,
	fbTipeLapisanKolams,
	fbPagarBahans,
	kelasBangunans,
	jpbHotelJeniss,
	jpbHotelBintangs,
	jpbTankiLetaks,
	jumlahBangunan: 0,
	hideApproval: false,
	approveRequest: null,
	rejectRequest: null,
	regObjekPajakBng: regObjekPajakBngs,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/pelayanan/verifikasi-data-permohonan',
	postSubmit: '/pelayanan/verifikasi-data-permohonan',
	submit: '/permohonan-approval/{id}',
	dataSrc: '/regpermohonan-approval',
}
refSources = {
	imageUrl: '/static/img/',
	submitVerifikasi:'/permohonan-approval/{id}',
	submitRegVerifikasi: '/permohonan-approval/{id}/reg',
	doneApproval: '/pelayanan/verifikasi-data-permohonan',
}
methods = {
	// click,
}
components = {
	datepicker: DatePicker,
}

function mounted(xthis) {
	if(!id) {
		data.noPelayanan = "AUTO";
	}
	jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	this.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
    this.nip = document.getElementById('nip') ? document.getElementById('nip').value : null;

	console.log(this.user_id);
	console.log("DATA : ");
	console.log(xthis.data);

    this.data.nip = this.nip;
	// xthis.data.penerimaanBerkas = xthis.user_name;
	this.data.tahunPajak = new Date().getFullYear().toString();

	this.jumlahBangunan = xthis.data.oppbb.regObjekPajakBumi.regObjekPajakBng.length; 
	this.regObjekPajakBng = xthis.data.oppbb.regObjekPajakBumi.regObjekPajakBng;

	console.log(data.noPelayanan);
}

async function approveRequest(data) {
	originStatus = data.status
	if (data.status == '01') {
		data.status = '02';
	} else if (data.status == '02') {
		data.status = '01';
	} else {
		data.status = '00';
	}	
	data.namaStaff = this.user_name
	res = await apiFetch(refSources.submitVerifikasi + data.id, 'PATCH', data);
	console.log(res)
	if(typeof res.data == 'object') {
		window.location.href = refSources.doneApproval;
	}
}

async function rejectRequest(data) {
	originStatus = data.status

	data.status = '03';

	console.log(originStatus)
	console.log(data.status)
	res = await apiFetch(refSources.submitVerifikasi + data.id, 'PATCH', data);
	console.log(res)
	if(typeof res.data == 'object') {
		window.location.href = refSources.doneApproval;
	}
}

// async function click() {
// 	console("masuk click");
// }

function preSubmit(xthis) {
	data = xthis.data
	
    console.log("preSubmit") 
}

function postDataFetch(data, xthis) {
	console.log(data)
	if(xthis.id) {
		if (data.status == "02") {
			xthis.jbtStaff = "PPAT"
		} else if (data.status == "04") {
			xthis.jbtStaff = "Staff"
		} else if (data.status == "06") {
			xthis.jbtStaff = "KASUBID"
		} else if (data.status == "08") {
			xthis.jbtStaff = "KABID"
		}

	}
}

