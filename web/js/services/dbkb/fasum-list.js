var today = new Date();

urls = {
	pathname: '/pendataan/dbkb/standar/fasilitas-umum',
	dataPath: '/dbkbfasum',
	dataSrc: '/dbkbfasum?no_pagination=true',
	dataSrcParams: {
		searchKeywords: '',
	}
}

vars = {
	dataNonDepList: {},
	dataBintangList: {},
	dataMinMaxList:{},
	dataNonDepLamaList: {},
	dataBintangLamaList: {},
	dataMinMaxLamaList:{},
	dataSetList: {},
	dataSetNilai: {},
	searchKeywords:null,
	tahun: today.getFullYear(),
	provinsi_kode: '35',
	daerah_kode: '73',
	currentData: {},
	lastyearData: {},
	nonDepUrl: '/dbkbfasum/nondep',
	minMaxUrl: '/dbkbfasum/depminmax',
	bintangUrl: '/dbkbfasum/depjpbklsbintang',
}
refSources = {
}
watch = {
}
methods = {
	setRefSources,
	getData,
}
components = {
	// dbkbFasumItem
}

function created() {
	this.setRefSources();
}

function submitData() {

}

function setRefSources() {
	this.refSources = {
		dataNonDepList: `${this.nonDepUrl}?no_pagination=true&tahun=${this.tahun}`,
		dataMinMaxList: `${this.minMaxUrl}?no_pagination=true&tahun=${this.tahun}`,
		dataBintangList: `${this.bintangUrl}?no_pagination=true&tahun=${this.tahun}`,
		dataNonDepLamaList: `${this.nonDepUrl}?no_pagination=true&tahun=${this.tahun-1}`,
		dataMinMaxLamaList: `${this.minMaxUrl}?no_pagination=true&tahun=${this.tahun-1}`,
		dataBintangLamaList: `${this.bintangUrl}?no_pagination=true&tahun=${this.tahun-1}`,
	}
}

async function getData() {
	this.setRefSources();
	await this.checkRefSources();
}

function postFetchData(data) {
	xthis = this;
	dataSetList = this.dataSetList; // this is diffrent inside forEach
	dataSetNilai = this.dataSetNilai // this is diffrent inside forEach
	data.forEach(function(item, idx){
		dataSetList[item.kode] = {
			tahun: xthis.tahun,
			provinsi_kode: xthis.provinsi_kode,
			daerah_kode: xthis.daerah_kode,
			kode: item.kode,
			nama: item.nama,
			satuan: item.satuan,
			status: item.status,
			ketergantungan: item.ketergantungan,
		}
		// dataSetNilai[item.kode] = [];
	});
	this.$forceUpdate();
}

function postCheckRefSources() {
	dataSetNilai = this.dataSetNilai // this is diffrent inside forEach
	this.data.forEach(function(item, idx){
		dataSetNilai[item.kode] = null;
	});

	// semua nilai baru
	this.dataNonDepList.forEach(function(item) {
		this.dataSetNilai[item.fasilitas_kode] = {
			id: item.id,
			nilaiLama: 0,
			nilaiBaru: item.nilai,
		}
	});
	this.dataBintangList.forEach(function(item) {
		// worst case if inside loop
		if(!this.dataSetNilai[item.fasilitas_kode]) {
			this.dataSetNilai[item.fasilitas_kode] = [];	
		}
		this.dataSetNilai[item.fasilitas_kode].push({
			id: item.id,
			nama: ' KELAS BINTANG ' + item.klsBintang,
			klsBintang: item.klsBintang,
			nilaiLama: 0,
			nilaiBaru: item.nilai,
		});
	});
	this.dataMinMaxList.forEach(function(item) {
		// worst case if inside loop
		if(!this.dataSetNilai[item.fasilitas_kode]) {
			this.dataSetNilai[item.fasilitas_kode] = [];	
		}
		this.dataSetNilai[item.fasilitas_kode].push({
			id: item.id,
			nama: ' DEP. MIN. ' + item.klsDepMin,
			klsDepMin: item.klsDepMin,
			klsDepMax: item.klsDepMax,
			nilaiLama: 0,
			nilaiBaru: item.nilai,
		});
	});

	// nilai lama non dep
	this.dataNonDepLamaList.forEach(function(item) {
		if(this.dataSetNilai[item.fasilitas_kode]) {
			this.dataSetNilai[item.fasilitas_kode].nilaiLama = item.nilai;
		} else {
			this.dataSetNilai[item.fasilitas_kode] = {
				id: null,
				nilaiLama: item.nilai,
				nilaiBaru: 0,
			};
		}
	});

	// dep repopulation
	for(prop in dataSetNilai) {
		if(!dataSetNilai[prop]) {
			dataSetNilai[prop] = [];
		}
	}

	// nilai lama dep
	this.dataBintangLamaList.forEach(function(item) {
		filter = this.dataSetNilai[item.fasilitas_kode].filter(function(thisItem){
			return item.klsBintang == thisItem.klsBintang;
		});
		
		if(filter.length > 0) {
			idx = this.dataSetNilai[item.fasilitas_kode].indexOf(filter[0]);
			this.dataSetNilai[item.fasilitas_kode][idx].nilaiLama = item.nilai;
		} else {
			this.dataSetNilai[item.fasilitas_kode].push({
				id: null,
				nama: ' KELAS BINTANG ' + item.klsBintang,
				bintang: item.klsBintang,
				nilaiLama: item.nilai,
				nilaiBaru: 0,
			});
		}
	});
	this.dataMinMaxLamaList.forEach(function(item) {
		filter = this.dataSetNilai[item.fasilitas_kode].filter(function(thisItem){
			return (item.klsDepMin == thisItem.klsDepMin && item.klsDepMax == thisItem.klsDepMax);
		});
		
		if(filter.length > 0) {
			idx = this.dataSetNilai[item.fasilitas_kode].indexOf(filter[0]);
			this.dataSetNilai[item.fasilitas_kode][idx].nilaiLama = item.nilai;
		} else {
			this.dataSetNilai[item.fasilitas_kode].push({
				id: null,
				nama: ' DEP MIN ' + item.klsDepMin,
				klsDepMin: item.klsDepMin,
				klsDepMax: item.klsDepMax,
				nilaiLama: item.nilai,
				nilaiBaru: 0,
			});
		}
	});

	this.$forceUpdate();
}
