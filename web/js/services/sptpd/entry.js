jenisKetetapan = 'sptpd';
data = { ...sptpdEntry }
vars = {
	// flatten the data
	npwpd: null,
	objek: null,
	rincian: null,
	kodeRekening: null,
	jenisUsaha: null,
	namaUsaha: null,
	alamatUsaha: null,
	rtRwUsaha: null,
	kelurahanUsaha: null,
	kecamatanUsaha: null,
	npwpdFound: false,
	rekening_id: null,
	rekening_objek: null,
	rekening_rincian: null,
	arrayDetailStatus: false,
	npwpdList: [],
	peruntukanAirs,
	jenisKendaraans,
	jenisPpjs: [],
}
refSources = {
	jenisPpjs: '/jenisppj',
}
urls = {
	preSubmit: '/penetapan/sptpd/' + objekPajak,
	postSubmit: '/penetapan/sptpd/' + objekPajak,
	submit: '/sptpd?',
	dataSrc: '/sptpd'
}
methods = {
	showNpwpSearch,
	setNpwpd,
	pilihNpwpd,
	checkNpwpd,
	applyNpwpd,
	addDetail,
	delDetail,
	addHiburanClass,
	delHiburanClass,
	calculateJumlahPajak,
	storeFileToField,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}
