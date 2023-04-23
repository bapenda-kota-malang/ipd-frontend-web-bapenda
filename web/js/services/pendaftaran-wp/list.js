urls = {
	pathname: '/pendaftaran/wajib-pajak',
	dataPath: '/npwpd',
	dataSrc: '/npwpd',
	dataSrcParams: {
		jenisPajak:null,
		golongan:null,
		tanggalNpwpd:null,
		objekPajak_nama_opt: 'left',
	}
}
vars = {
	searchKeywords:null,
	golongans,
	jabatans,
	npwpdStatuses,
	rekenings: [],
	daerahs: [],
	kecamatans: [],
	kelurahans: [],
	// extra
	tanggalNpwpdOutput: null
}
refSources = {
	rekenings: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
	daerahs: '/daerah?no_pagination=true',
	kecamatans: '/kecamatan?daerah_kode=3573',
}
methods = {
	strRight,
	filterTanggalNpwpd,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

searchFieldTarget = 'objekPajak_nama';
searchPlaceHolder = 'Cari nama OP...';

function postFetchData(data) {
	data.forEach(function (item, idx) {
		item.tanggalNpwpd = formatDate(new Date(item.tanggalNpwpd));
	});
}

function filterTanggalNpwpd() {
	this.urls.dataSrcParams.tanggalNpwpd = formatDate(this.tanggalNpwpdOutput, ['y','m','d'], '-')+'T07:00:00+07:00';
}
