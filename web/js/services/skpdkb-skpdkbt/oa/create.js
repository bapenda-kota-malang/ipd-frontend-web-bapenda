data = { ...entryData }
vars = {
	oaSearchModal: null,
	jenisPajak: null,
	billingNumber: null,
	nomorSpt: null,
	namaObjekPajak: null,
	tanggalSpt: null,
	jatuhTempo: null,
	jenisPajak: null,
	penetapanList: [
		{jenisKetetapan: 'SKPD'},
		{jenisKetetapan: 'SKPDKB'}
	],
	searchOaList: [],
	filterData: [],
	viewData: [],
}

urls = {
	preSubmit: '/penetapan/skpdkb-skpdkbt/oa',
	postSubmit: '/penetapan/skpdkb-skpdkbt/oa',
	dataSrc: '/skpdkb',
	submit: '/skpdkb/new/oa',
}

methods = {
	showOaSearch,
    selectSearch,
	setSelectData,
}

components = {
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
		xthis.billingNumber = "Auto";
	}
}

async function showOaSearch() {
	if (!this.oaSearchModal) {
		oaSearchModal = new bootstrap.Modal(document.getElementById('oaSearch'))
	}
	res = await apiFetchData('/skpdkb?type=oa&rekening_id=10191', messages);
	if (!res) {
		console.error('failed to fetch "OA"');
	} else {
		app.searchOaList = typeof res.data != 'undefined' ? res.data : [];
	}
	oaSearchModal.show();
}

async function selectSearch(nomorSpt) {
	this.filterData = this.searchOaList.filter(item => {
		return nomorSpt.includes(item.NomorSpt)
	});

	if (typeof this.filterData == 'object') {
		this.data.dataDetails = [];
		this.setSelectData(this.filterData[0]);
	} else {
		console.error('Data selected not found');
	}

	oaSearchModal.hide();
}

function setSelectData(item) {
	data = this.data.skpdkb;
	this.nomorSpt = item.NomorSpt;
	this.jenisPajak = item.npwpd.jenisPajak;
	this.namaObjekPajak = item.objekPajak.nama;
	this.tanggalSpt = new Date(item.tanggalSpt).toLocaleDateString('es-CL');
	this.jatuhTempo = new Date(item.jatuhTempo).toLocaleDateString('es-CL');
	
	data.npwpd_Id = item.npwpd_Id,
	data.objekPajak_Id = item.objekPajak_Id,
	data.rekening_Id =  item.rekening_Id,
	data.omset = item.omset,
	data.jenisKetetapan = item.jenisKetetapan,
	data.dasarPengenaan = item.dasarPengenaan,
	data.periodeAwal = item.periodeAwal,
	data.lampiran = item.lampiran,

	this.viewData.push({
		nomorSpt: item.NomorSpt,
		npwpd: item.npwpd.npwpd,
		namaWajibPajak: item.npwpd.pemilik.nama,
		jumlahSKPD: new Intl.NumberFormat("id-ID").format(item.jumlahPajak),
		kenaikan: 0,
		bunga: 0,
		denda: 0,
		pengurang: 0,
		jumlahTotal: new Intl.NumberFormat("id-ID").format(item.jumlahPajak),
		masaAwal: new Date(item.periodeAwal).toLocaleDateString('es-CL'),
		masaAkhir: new Date(item.periodeAkhir).toLocaleDateString('es-CL'),
	});

	this.data.dataDetails.push({
		peruntukan: "PDAM",
		jenisAbt: "aa",
		rekening_Id: "aa",
	});
}