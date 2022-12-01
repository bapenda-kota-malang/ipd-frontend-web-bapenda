forcePostDataFetch = true;

id = document.getElementById('id').value;
if(!id)
	id = 0;

today = new Date();

data = {...undPemeriksaanCreate}
urls = {
	preSubmit: '/penagihan-pemeriksaan/und-pemeriksaan',
	postSubmit: '/penagihan-pemeriksaan/und-pemeriksaan',
	dataSrc: '/undanganpemeriksaan',
	submit: '/undanganpemeriksaan/{id}',
}
vars = {
	nomorPrefix: '973/',
	nomorMidfix: '',
	nomorPostfix: '/35.73.504/' + today.getFullYear(),
	tanggalView: null,
	refNo: null,
	refList: [],
}
methods = {
	searchRef,
	pilihRef,
} 
components = {
	datepicker: DatePicker,
}
refSearchModal = null;

function postDataFetch(data, xthis) {
	if(xthis.id) {
		nomorArr = data.noSuratUndangan.split('/');
		if(nomorArr.length > 1) {
			app.nomorMidfix = nomorArr[1];
		} else {
			app.nomorMidfix = ''; 
		}
		app.tanggalView = data.tanggal ? new Date(data.tanggal.substring(0, 10)) : '';
		app.refNo = data.npwpd ? data.npwpd.npwpd : '';
	}
}

function preSubmit() {
	if(app.nomorMidfix) {
		app.data.noSuratUndangan = app.nomorPrefix + app.nomorMidfix + app.nomorPostfix;
	} else {
		app.data.noSuratUndangan = null;
	}
	app.data.jenisPajak = parseInt(app.data.jenisPajak);
	app.data.tanggal = formatDate(app.tanggalView, ['y', 'm', 'd']);
}

async function searchRef() {
	// console.log(this)
	if(!refSearchModal) {
		refSearchModal = new bootstrap.Modal(document.getElementById('searchRefBox'))
	}
	res = await apiFetchData('/npwpd ', messages);
	if(!res) {
		console.error('failed to fetch "suratpemberitahuan"');
	} else {
		this.refList = typeof res.data != 'undefined' ? res.data : [];
	}
	refSearchModal.show();
}

function pilihRef(idx) {
	this.refNo = this.refList[idx].npwpd;
	this.data.npwpd_id = this.refList[idx].id;
	refSearchModal.hide();
}