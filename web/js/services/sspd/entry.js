data = {...sspdCreate};
vars = {
	npwpd: null,
	objek: null,
	// rincian: null,
	// kodeRekening: null,
	// jenisUsaha: null,
	namaUsaha: null,
	alamatUsaha: null,
	rtRwUsaha: null,
	kelurahanUsaha: null,
	// npwpdFound: false,
	// rekening_id: null,
	// rekening_objek: null,
	// rekening_rincian: null,
	// arrayDetailStatus: false,
	npwpdList: [],
	sptpdDetail: null,
}
urls = {
	preSubmit: '/bendahara/surat-setoran-pajak-daerah',
	postSubmit: '/bendahara/surat-setoran-pajak-daerah',
	submit: '/sspd/{id}',
	dataSrc: '/sspd',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

methods = {
	showNpwpSearch,
	setNpwpd,
	calculateKurangBayar,
	pilihNpwpd ,
	// addDetail,
}

var npwpdSearchModal = null;

function mounted(xthis) {
	// today = new Date();
	// xthis.data.tanggalBayar = new Date(today.getFullYear(), today.getMonth() + 1, 0);
}

function preSubmit(xthis) {
	tglBayar = xthis.data.tanggalBayar;
	xthis.data.tanggalBayar = `${tglBayar.getFullYear()}-${strRight('0'+(tglBayar.getMonth()+1),2)}-${tglBayar.getDate()}`;
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
	if(window.location.pathname + window.location.search != "/sptpd?npwpd=" + xthis.npwpd) {
		window.history.pushState({html:document.html}, "", "/sptpd?npwpd=" + xthis.npwpd); // "html":response.html,
	}
	await checkNpwpd(xthis.npwpd, xthis);
}

async function checkNpwpd(npwpd, xthis) {
	if(npwpd) {
		res = await apiFetch(`/npwpd?npwpd=${npwpd}`, 'GET');
		if(typeof res.data == 'object') {
			xd = res.data.data[0];
			// vars for view
			xthis.jenisUsaha = xd.rekening.jenisUsaha;
			xthis.kodeRekening = xd.rekening.kode;
			xthis.namaUsaha = xd.objekPajak.nama;
			xthis.alamatUsaha = xd.objekPajak.alamat;
			xthis.rtRwUsaha = xd.objekPajak.rtRw;
			// xthis.kelurahanUsaha = xd.objekPajak.kelurahan.nama;
			// xthis.rekening_id = xd.rekening.id;
			// xthis.rekening_objek = xd.rekening.objek;
			// xthis.rekening_rincian = xd.rekening.rincian;
			// xthis.npwpdFound = true;
			// addDetail(xthis.data, xd.rekening.objek, xd.rekening.rincian)
			// data
			xthis.data.npwpd_npwpd = xd.npwpd;
			xthis.data.rekeningBendahara_rekening_id = xd.rekening.id;
			today = new Date();
			todayJT = new Date(today.getFullYear(), today.getMonth() + 1, 0);
			todayJTF = todayJT.getFullYear() + '-' + strRight('0' + (todayJT.getMonth() + 1), 2) + '-' + todayJT.getDate();
			res = await apiFetch(`/sptpd?jatuhTempo=${todayJTF}T15:04:05.000Z&npwpd_id=${xd.id}`, 'GET');
			if(typeof res.data == 'object' && typeof res.data.data == 'object' && res.data.data.length > 0) {
				jt = new Date(res.data.data[0].jatuhTempo);
				xthis.sptpdDetail = res.data.data[0];
				xthis.sptpdDetail.jatuhTempo = jt.getFullYear() + '-' + strRight('0' + (jt.getMonth() + 1), 2) + '-' + jt.getDate();
				xthis.data.sspdDetail = {
					spt_id: res.data.data[0].id,
					nominalBayar: xthis.sptpdDetail.jumlahPajak,
					kurangBayar: xthis.sptpdDetail.jumlahPajak - 0, 
					denda: 0,
				} 
			} else {
				xthis.sptpdDetail = null;
				xthis.data.sspdDetail = null;
			}
			// xthis.$forceUpdate();
			// 
		} else {
			// xthis.npwpdFound = false;
			xthis.messageProp.show = true;
			content = 'NPWPD tidak dapat ditemukan!!';
		}
	} else {
		// xthis.npwpdFound = false;
	}
}

async function pilihNpwpd(npwpd) {
	app.npwpd = npwpd;
	await checkNpwpd(npwpd, app);
	npwpdSearchModal.hide();
}

function calculateKurangBayar() {
	this.data.sspDetail.kurangBayar = this.sptpdDetail.jumlahPajak - this.data.sspDetail.nominalBayar
	this.$forceUpdate();
	console.log(this.data.sspDetail.kurangBayar);
}
