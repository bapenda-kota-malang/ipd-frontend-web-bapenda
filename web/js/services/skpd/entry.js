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
	npwpdSearching: false,
	peruntukanAirs,
	jenisAbts,
	jenisKendaraans,
	jenisPpjs: [],
	tarifReklameList: [],
	bukus,
	pagination: {
		noHistory: true,
		...defPagination
	},
	paginationDataTarget: 'npwpdList',
	pegawais: [],
	riwayat:[],
	searchKeywords: null,
	searchFieldTarget: 'objekPajak_nama',
}
refSources = {
	tarifReklameList: '/tarifreklame?no_pagination=true',
	jenisPpjs: '/jenisppj',
	pegawais: '/pegawai',
}
urls = {
	preSubmit: '/penetapan/skpd/' + objekPajak,
	postSubmit: '/penetapan/skpd/' + objekPajak,
	submit: '/skpd?',
	dataSrc: `/skpd`,
	dataPathAlt: `/npwpd`,
	dataSrcAlt: `/npwpd`,
	dataSrcParamsAlt: {
		rekening_objek: objekPajak_kode,
		objekPajak_nama_opt: 'left',
	},
}
methods = {
	showNpwpSearch,
	pilihNpwpd,
	applyNpwpd,
	addDetail,
	delDetail,
	addHiburanClass,
	delHiburanClass,
	calculateJumlahPajak,
	storeFileToField,
	preSearch,
	searchAlt,
	getList,
	setPage,
	setPagination,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}
useSearchAlt = true;
