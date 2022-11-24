data = {...potensiOp};
vars = {
	detailObjekPajak: [],
	pemilikLists: [],
	narahubungLists: [],
	// dateFormat,
	assessments,
	golongans,
	rekenings: [],
	daerahs: [],
	kecamatans: [],
	kelurahans: [],
	tinjauTanggal: new Date(),
	tinjauJam: null,
	tinjauMenit: null,
	tanggalPengukuhanTemp: null,
	tanggalNpwpdTemp: null,
	tanggalMulaiUsahaTemp: null,
	kodeJenisUsaha: 0,
	options:['test', 'ok'],
	users: [],
}
urls = {
	preSubmit: '/pendataan/potensi-owp-baru',
	postSubmit: '/pendataan/potensi-owp-baru',
	submit: '/potensiopwp/{id}',
	dataSrc: '/potensiopwp',
}
methods = {
	addDetailObjekPajak,
	delDetailObjekPajak,
	addPemilik,
	delPemilik,
	addNarahubung,
	delNarahubung,
}
refSources = {
	rekenings: '/rekening?kodeJenisUsaha=0&kodeJenisUsaha_opt=gt&no_pagination=true',
	daerahs: '/daerah?no_pagination=true',
	kecamatans: '/kecamatan?daerah_kode=3573',
	users: '/user?position=3',
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function mounted(xthis) {
	if(!xthis.id) {
		addPemilik(xthis)
		addNarahubung(xthis)
		// for test only
		// xthis.data.potensiPemilikWps[0].nama = "Jamal";
		// xthis.data.potensiPemilikWps[0].nik = "3522062604860003";
		// xthis.data.potensiPemilikWps[0].alamat = "Jl Localhost";
		// xthis.data.potensiPemilikWps[0].telp = "0812324232423";
		// xthis.data.potensiNarahubungs[0].nama = "Jamal";
		// xthis.data.potensiNarahubungs[0].nik = "3522062604860003";
		// xthis.data.potensiNarahubungs[0].alamat = "Jl Localhost";
		// xthis.data.potensiNarahubungs[0].telp = "0812324232423";
	}
	xthis.rekenings.forEach(function(item, idx){
		xthis.rekenings[idx].nama = item.kode + ' - ' + item.nama;
	})
}

function preSubmit(xthis) {
	data = xthis.data;
	tt = xthis.tinjauTanggal;
	tinjauTanggal = tt.getFullYear() + '-' + strRight('0' + (tt.getMonth() + 1), 2) + '-' + strRight('0' + tt.getDate(), 2);
	tinjauJam = `${strRight('0' + xthis.tinjauJam, 2)}:${strRight('0' + xthis.tinjauMenit, 2)}:01`;
	tinjauF = `${tinjauTanggal}T${tinjauJam}+07:00`;
	data.bapl.koordinator_user_id = parseInt(data.bapl.koordinator_user_id);
}

function postDataFetch(data, xthis) {
	if(xthis.id) {
		data.tanggalNpwpd = data.tanggalNpwpd ? new Date(data.tanggalNpwpd.substr(0,10)) : null;
		data.tanggalPengukuhan = data.tanggalPengukuhan ? new Date(data.tanggalPengukuhan.substr(0,10)) : null;
		data.tanggalMulaiUsaha = data.tanggalMulaiUsaha ? new Date(data.tanggalMulaiUsaha.substr(0,10)) : null;
		xthis.refreshSelect(data.objekPajak.kecamatan_id, xthis.kecamatans, `/kelurahan?kecamatan_kode=${data.objekPajak.kecamatan.kode}&no_pagination=true`, xthis.kelurahans, 'kode');
		data.potensiPemilikWps.forEach(function(item, idx) {
			addPemilikLists(xthis);
			xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].kelurahans, 'kode');
			if(item.direktur_daerah_id)
				xthis.refreshSelect(item.direktur_daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].direktur_daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].direktur_kelurahans, 'kode');
		})
		data.potensiNarahubungs.forEach(function(item, idx) {
			addNarahubungLists(xthis);
			xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.potensiNarahubungs[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.narahubungLists[idx].kelurahans, 'kode');
		})

		// if(data.detailObjekPajak) {
		// 	if(data.rekening.objek == '01') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakHotel;
		// 	} else if(data.rekening.objek == '02') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakResto;
		// 	} else if(data.rekening.objek == '03') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakHiburan;
		// 	} else if(data.rekening.objek == '04') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakReklame;
		// 	} else if(data.rekening.objek == '05') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakPeneranganJalan;
		// 	} else if(data.rekening.objek == '06') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakHotel;
		// 	} else if(data.rekening.objek == '07') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakParkir;
		// 	} else if(data.rekening.objek == '08') {
		// 		xthis.detailObjekPajak = data.detailObjekPajakAirTanah;
		// 	}	
		// }
	}
}

function addDetailObjekPajak(xthis) {
	xthis.data.detailPajaks.push({
		klasifikasi: null,
		jumlahOp: null,
		unitOp: null,
		tarifOp: null,
		notes: null,
	});
}

function delDetailObjekPajak(i){
	if(i > data.detailPajaks.length - 1)
		return;
	data.detailPajaks.splice(i, 1);
}

function addPemilik() {
	data.potensiPemilikWps.push({
		nama: null,
		nik: null,
		alamat: null,
		rtRw: null,
		daerah_id: null,
		kelurahan_id: null,
		telp: null,
		direktur_nama: null,
		direktur_nik: null,
		direktur_alamat: null,
		direktur_rtRw: null,
		direktur_daerah_id: null,
		direktur_kelurahan_id: null,
		direktur_telp: null,
	});
	addPemilikLists()
}

function addPemilikLists(xthis) {
	app.pemilikLists.push({
		kelurahans: [],
		direktur_kelurahans: [],
	})
}

function delPemilik(i){
	if(i > data.potensiPemilikWps.length - 1)
		return;
	data.potensiPemilikWps.splice(i, 1);
	app.pemilikLists.splice(i, 1);
}

function addNarahubung() {
	data.potensiNarahubungs.push({
		nama: null,
		nik: null,
		alamat: null,
		rtRw: null,
		daerah_id: null,
		kelurahan_id: null,
		telp: null,
	});
	addNarahubungLists();
}

function addNarahubungLists() {
	app.narahubungLists.push({
		kelurahans: [],
	})
}

function delNarahubung(i){
	if(i > data.potensiNarahubungs.length - 1)
		return;
	data.potensiNarahubungs.splice(i, 1);
	app.narahubungLists.splice(i, 1);
}

// async function getRekening() {
// 	res = await apiFetch('/rekening')
// 	if(res.success) {
// 		return res.data;
// 	} else {
// 		messages.push('gagal mengambil data rekening');
// 		return { data: [] };
// 	}
// }

// async function getDetail(id) {
// 	res = await apiFetch('/npwpd/' + id)
// 	if(res.success) {
// 		return res.data;
// 	} else {
// 		messages.push('gagal mengambil data');
// 		return { data: [] };
// 	}
// }

