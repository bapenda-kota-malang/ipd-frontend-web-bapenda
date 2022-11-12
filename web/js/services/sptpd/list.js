objekPajak = document.getElementById('objekPajak').value;

urls = {
	pathname: '/penetapan/sptpd/' + objekPajak,
	dataPath: '/sptpd',
	dataSrc: '/sptpd'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}

async function showNpwpSearch() {
	if(!npwpdSearchModal) {
		npwpdSearchModal = new bootstrap.Modal(document.getElementById('npwpdSearch'))
	}
	res = await apiFetchData('/api/npwpd', messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		app.npwpdList = typeof res.data != 'undefined' ? res.data : [];
	}
	npwpdSearchModal.show();
}

async function setNpwpd(xthis) {
	// url = ;
	if(window.location.pathname + window.location.search != "/esptpd?npwpd=" + xthis.npwpd) {
		window.history.pushState({html:document.html}, "", "/esptpd?npwpd=" + xthis.npwpd); // "html":response.html,
	}
	await checkNpwpd(xthis.npwpd, xthis);
}

function enableSetNpwpd(xthis) {
	document.getElementById('npwpd').focus({focusVisible: true});
	xthis.jenisUsaha = null;
	xthis.namaUsaha = null;
	xthis.alamtUsaha = null;
	xthis.npwpdFound = false;
	xthis.datanpwpd_id = null;
	xthis.objekPajak_id = null;
	xthis.rekening_id = null;
	xthis.location = null;
	xthis.description = null;
	xthis.tarifPajak_id = null;
	xthis.omset = 0;
	xthis.jumlahPajak = null;
	xthis.attachment = '',
	xthis.data.dataDetails = null;
}

async function checkNpwpd(npwpd, xthis) {
	if(npwpd) {
		res = await apiFetch('/npwpd?npwpd=' + npwpd, 'GET');
		if(typeof res.data == 'object') {
			xd = res.data.data[0];
			// vars for view
			xthis.jenisUsaha = xd.rekening.jenisUsaha;
			xthis.namaUsaha = xd.objekPajak.nama;
			xthis.alamatUsaha = xd.objekPajak.alamat + ', ' + xd.objekPajak.rtRw;
			xthis.rekening_objek = xd.rekening.objek;
			xthis.rekening_rincian = xd.rekening.rincian;
			xthis.npwpdFound = true;
			if(xd.rekening.objek == '02' || xd.rekening.objek == '08' || (xd.rekening.objek == '05' && xd.rekening.rincian == '01')) {
				xthis.arrayDetailStatus = false;
				xthis.data.dataDetails = {};
			} else {
				xthis.arrayDetailStatus = true;
				xthis.data.dataDetails = [];
			}
			addDetail(xthis.data, xd.rekening.objek, xd.rekening.rincian)
			// data
			xthis.data.espt.npwpd_id = xd.id;
			xthis.data.espt.objekPajak_id = xd.objekPajak_id;
			xthis.data.espt.rekening_id = xd.rekening_id;
			if(xd.rekening.objek == '01')
				urls.submit = '/api/espt?category=hotel';
			else if(xd.rekening.objek == '02')
				urls.submit = '/api/espt?category=resto';
			else if(xd.rekening.objek == '03')
				urls.submit = '/api/espt?category=hiburan';
			else if(xd.rekening.objek == '05' && xd.rincian == '01')
				urls.submit = '/api/espt?category=ppjpln';
			else if(xd.rekening.objek == '05' && xd.rincian == '02')
				urls.submit = '/api/espt?category=ppjnonpln';
			else if(xd.rekening.objek == '07')
				urls.submit = '/api/espt?category=parkir';
			else if(xd.rekening.objek == '08')
				urls.submit = '/api/espt?category=air';
		} else {
			xthis.npwpdFound = false;
			xthis.messageProp.show = true;
			content = 'NPWPD tidak dapat ditemukan!!';
		}
	} else {
		xthis.npwpdFound = false;
	}
}

async function pilihNpwpd(npwpd) {
	app.npwpd = npwpd;
	await checkNpwpd(npwpd, app);
	npwpdSearchModal.hide();
}

