data = {...stsCreate};
vars = {
	userList:[],
	sspdList:[],
	stsList:[],
	tanggalSts: new Date(),
}
refSources = {
	userList: '/pegawai',
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
	xthis.checkSspd();
}

function preSubmit(xthis) {
	xthis.data.tanggalSts = formatDate(xthis.tanggalSts, ['y', 'm', 'd']);
	// console.log(xthis.data);
	// return false;
}

async function checkSspd() {
	tgl = this.tanggalSts;
	tglF = formatDate(tgl, ['y','m','d']);
	res = await apiFetchData(`/sspd?tanggalBayar=${tglF}T00:00:00.000Z,${tglF}T23:59:59.000Z&tanggalBayar_opt=between`, messages);
	if(!res) {
		console.error('failed to fetch "npwpd"');
	} else {
		xthis = this;
		this.sspdList = [];
		this.stsList = [];
		sl = typeof res.data != 'undefined' ? res.data : [];
		if(sl.length > 0) {
			sl.forEach(function(item, idx) {
				// skip already registered sts
				if(!item.sspdDetail || item.sspdDetail[0].sts_id) {
					return;
				}
				idx = null;
				nominal = item.sspdDetail[0].nominalBayar ? parseInt(item.sspdDetail[0].nominalBayar) : 0;
				// sts
				xthis.stsList.find(function(o, i) {
					if (item.npwpd.rekening.kode === o.kode) {
						idx = i;
						return true;
					}
				});
				if(!idx) {
					xthis.stsList.push({
						kode: item.npwpd.rekening.kode,
						nama: item.npwpd.rekening.nama,
						nominal: nominal,
						sspd: [{
							nomor: item.nomorOutput,
							nominal: nominal
						}]
					});
					xthis.data.stsDetail.push({
						rekening_id: item.npwpd.rekening.id,
						nominal: nominal,
						sspdDetail_id: [item.id]
					});
				} else {
					xthis.stsList[idx].nominal += nominal;
					xthis.stsList[idx].sspd.push({
						nomor: item.nomorOutput,
						nominal: nominal
					});
					xthis.data.stsDetail[idx].nominal += nominal;
					xthis.data.stsDetail[idx].sspdDetail_id.push(item.id);
				}
				// sumber dana
				xthis.data.sumberDanaSts[0].nominal += nominal;
			})
		}
	}
}