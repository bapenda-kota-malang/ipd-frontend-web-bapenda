data = {...stsCreate};
vars = {
	userList:[],
	sspdList:[],
}
refSources = {
	userList: '/user?position=1',
}
urls = {
	preSubmit: '/bendahara/surat-tanda-setoran',
	postSubmit: '/bendahara/surat-tanda-setoran',
	submit: '/sts/{id}',
	dataSrc: '/sts',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

methods = {
	checkSspd,
}

var npwpdSearchModal = null;

function mounted(xthis) {
	checkSspd();
}

async function checkSspd() {
	tgl = this.data.tanggalSts;
	tglF = formatDate(tgl, ['y','m','d']);
	res = await apiFetchData(`/sspd?tanggalBayar=${tglF}T00:00:00.000Z,${tglF}T23:59:59.000Z&tanggalBayar_opt=between`, messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		this.sspdList = [];
		sl = typeof res.data != 'undefined' ? res.data : [];
		if(sspdList.length > 0) {
			sspdList.forEach(function(item) {
				if(typeof this.sspdList[item.])
				//  = [];
			})
		}
	}
}