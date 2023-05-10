jenisKetetapan = 'skpd';
data = { ...skpdEntry }
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
	tarifReklameList: [],
	bukus,
}
refSources = {
	tarifReklameList: '/tarifreklame?no_pagination=true',
	jenisPpjs: '/jenisppj',
}
urls = {
	preSubmit: '/penetapan/skpd/' + objekPajak,
	postSubmit: '/penetapan/skpd/' + objekPajak,
	submit: '/skpd?',
	dataSrc: '/skpd'
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
