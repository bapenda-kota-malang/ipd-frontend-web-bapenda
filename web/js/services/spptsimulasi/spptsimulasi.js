data = {...spptsimulasi};
vars = {
    data2 : nopspptsimulasi,
    totalTanahM2: null,
    totalBangunanM2: null,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/sppt-simulasi',
	postSubmit: '/sppt-simulasi',
	submit: '/sppt-simulasi/{id}/{kd}',
	dataSrc: '/sppt-simulasi',
}
refSources = {
	submitProcess:'/spptsimulasi-process',
	doneProcess: '/penetapan/simulasi-penetapan-massal-pbb',
}
methods = {
	submitGetData,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
	}
    // xthis.data.namaPropinsi = 'ngawur';
	xthis.jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	xthis.user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	xthis.user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
	console.log(xthis.user_id)
}

async function submitGetData() {
    console.log("process")
    if (this.data2.tahunPajak.length == 4) {
        console.log(this.data)
        res = await apiFetch(refSources.submitProcess + '/spptsimulasi', 'POST', this.data2);
        this.data = res.data.data;
        this.totalTanahM2 = this.data.njopBumi_sppt / this.data.luasBumi_sppt;
        this.totalBangunanM2 = this.data.njopBangunan_sppt / this.data.luasBangunan_sppt;
        this.data.njKPskp_sppt = toRupiah(this.data.njKPskp_sppt, {formal: false, dot: '.'});
        this.data.njopTKP_sppt = toRupiah(this.data.njopTKP_sppt, {formal: false, dot: '.'});
        this.data.njopBangunan_sppt = toRupiah(this.data.njopBangunan_sppt, {formal: false, dot: '.'});
        this.data.njopBumi_sppt = toRupiah(this.data.njopBumi_sppt, {formal: false, dot: '.'});
        this.data.njop_sppt = toRupiah(this.data.njop_sppt, {formal: false, dot: '.'});
        this.data.pbbTerhutang_sppt = toRupiah(this.data.pbbTerhutang_sppt, {formal: false, dot: '.'});
        this.data.pbbYgHarusDibayar_sppt = toRupiah(this.data.pbbYgHarusDibayar_sppt, {formal: false, dot: '.'});
        this.data.tanggalJatuhTempo_sppt = formatDate(new Date(this.data.tanggalJatuhTempo_sppt), ['d','m','y'], '/');
        this.data.tanggalTerbit_sppt = formatDate(new Date(this.data.tanggalTerbit_sppt), ['d','m','y'], '/');
        this.data.tanggalCetak_sppt = formatDate(new Date(this.data.tanggalCetak_sppt), ['d','m','y'], '/');
        this.$forceUpdate();
        console.log("after")
        console.log(this.data)
    }
}

function preSubmit(xthis) {
	data = xthis.data;
	
	console.log("preSubmit") ;
}

function postDataFetch(data, xthis) {
	console.log("origin");
	console.log(data);

	if(xthis.id) {
		console.log("jabatan id :" + xthis.jabatan_id);
		console.log("jabatanstaff :" + xthis.jbtStaff);
		console.log("status :" + data.status);

	}	
}

