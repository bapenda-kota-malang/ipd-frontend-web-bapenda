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
	npwpdSearching: false,
	peruntukanAirs,
	jenisAbts,
	jenisKendaraans,
	jenisPpjs: [],
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
	jenisPpjs: '/jenisppj',
	pegawais: '/pegawai',
}
urls = {
	preSubmit: '/penetapan/sptpd/' + objekPajak,
	postSubmit: '/penetapan/sptpd/' + objekPajak,
	submit: '/sptpd?',
	dataSrc: '/sptpd',
	dataPathAlt: `/npwpd`,
	dataSrcAlt: '/npwpd',
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
