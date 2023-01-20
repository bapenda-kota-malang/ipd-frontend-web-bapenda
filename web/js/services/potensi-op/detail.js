id = document.getElementById('id').value;
if(!id)
	id = 0;

data = {
	...potensiOp,
}
urls = {
	dataSrc: '/potensiopwp/' +id
}
vars = {
	bapl: {
		petugas_pegawai: [],
	},
	golongans,
}

function postFetchData(data) {
	data.tanggalNpwpd = data.tanggalNpwpd ? new Date(data.tanggalNpwpd.substr(0,10)) : null;
	data.tanggalPengukuhan = data.tanggalPengukuhan ? new Date(data.tanggalPengukuhan.substr(0,10)) : null;
	data.tanggalMulaiUsaha = data.tanggalMulaiUsaha ? new Date(data.tanggalMulaiUsaha.substr(0,10)) : null;
	data.potensiPemilikWp.forEach(function(item, idx) {
		// addPemilikLists(xthis);
		// xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].kelurahans, 'kode');
		if(item.direktur_daerah_id)
			xthis.refreshSelect(item.direktur_daerah_id, xthis.daerahs, `/kelurahan?kode=${data.pemilik[idx].direktur_daerah.kode}&kode_opt=left&no_pagination=true`, xthis.pemilikLists[idx].direktur_kelurahans, 'kode');
	})
	data.potensiNarahubung.forEach(function(item, idx) {
		// addNarahubungLists(xthis);
		// xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.potensiNarahubungs[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.narahubungLists[idx].kelurahans, 'kode');
	})

	if(data.rekening.objek == '01') {
		data.detailPajaks = data['detailPotensiHotels'];
	} else if(data.rekening.objek == '02') {
		data.detailPajaks = data['detailPotensiRestos'];
	} else if(data.rekening.objek == '03') {
		data.detailPajaks = data['detailPotensiHiburans'];
	} else if(data.rekening.objek == '04') {
		data.detailPajaks = data['detailPotensiReklames'];
	} else if(data.rekening.objek == '05') {
		data.detailPajaks = data['detailPotensiPpjs'];
	} else if(data.rekening.objek == '07') {
		data.detailPajaks = data['detailPotensiParkirs'];
	} else if(data.rekening.objek == '08') {
		data.detailPajaks = data['detailPotensiAirTanahs'];
	}

	if(data.bapl[0]) {
		this.bapl = data.bapl[0];
	}
	this.$forceUpdate();
	console.log(data);
}
