data = {...verifikasiPermohonan};
vars = {
}
urls = {
	preSubmit: '/pelayanan/verifikasi-data-permohonan',
	postSubmit: '/pelayanan/verifikasi-data-permohonan',
	submit: '/verifikasi-permohonan/{id}/status',
	dataSrc: '/regpermohonan',
}
refSources = {
	imageUrl: '/static/img/',
	submitVerifikasi:'/regpermohonan-approval/',
	submitTolakVerifikasi: '/regpermohonan-approval/{id}/tolakverifikasi',
	doneApproval: '/pelayanan/verifikasi-data-permohonan',
}
methods = {
	submitVerifikasi,
	submitPengembalian,
}
components = {
	datepicker: DatePicker,
}

async function submitVerifikasi(data) {
	originStatus = data.status
	if (data.status == '06') {
		data.status = '08';
	} else if (data.status == '04') {
		data.status = '06';
	} else if (data.status == '02') {
		data.status = '04';
	}	
	data.namaStaff = this.user_name
	res = await apiFetch(refSources.submitVerifikasi + data.id + "/" + originStatus, 'PATCH', data);
	console.log(res)
	if(typeof res.data == 'object') {
		window.location.href = refSources.doneApproval;
	}
}

async function submitPengembalian(data) {
	originStatus = data.status

	if (data.status == '06') {
		data.status = '07';
	} else if (data.status == '04') {
		data.status = '05';
	} else if (data.status == '02') {
		data.status = '03';
	}

	console.log(originStatus)
	console.log(data.status)
	res = await apiFetch(refSources.submitVerifikasi + data.id + "/" + originStatus, 'PATCH', data);
	console.log(res)
	if(typeof res.data == 'object') {
		window.location.href = refSources.doneApproval;
	}
}

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

