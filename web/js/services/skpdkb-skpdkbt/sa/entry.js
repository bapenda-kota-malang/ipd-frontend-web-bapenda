data = { ...entryData }
vars = {
	saSearchModal: null,
	jenisPajak: null,
	billingNumber: null,
	nomorSpt: null,
	namaObjekPajak: null,
	tanggalSpt: null,
	jatuhTempo: null,
	jenisPajak: null,
	optionPenetapans: {
		sptpd: 'SPTPD',
		skpdkb: 'SKPDKB'
	},
	listObjectPajakHotels: {},
	searchSaList: [],
	filterData: [],
	viewData: [],
}

urls = {
	preSubmit: '/penetapan/skpdkb-skpdkbt/sa',
	postSubmit: '/penetapan/skpdkb-skpdkbt/sa',
	dataSrc: '/skpdkb',
	submit: '/skpdkb/new/sa',
}

methods = {
	showSaSearch,
    selectSearch,
	setSelectData,
	addRowObjekPajakHotel,
}

components = {
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
		xthis.billingNumber = "Auto";
	}
}

async function showSaSearch() {
	if (!this.saSearchModal) {
		saSearchModal = new bootstrap.Modal(document.getElementById('saSearch'))
	}
	res = await apiFetchData('/skpdkb?type=oa&rekening_id=10191', messages);
	if (!res) {
		console.error('failed to fetch "OA"');
	} else {
		app.searchSaList = typeof res.data != 'undefined' ? res.data : [];
	}
	saSearchModal.show();
}

async function selectSearch(nomorSpt) {
	this.filterData = this.searchSaList.filter(item => {
		return nomorSpt.includes(item.NomorSpt)
	});

	if (typeof this.filterData == 'object') {
		this.data.dataDetails = [];
		this.setSelectData(this.filterData[0]);
	} else {
		console.error('Data selected not found');
	}

	saSearchModal.hide();
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

function addRowObjekPajakHotel() {

}