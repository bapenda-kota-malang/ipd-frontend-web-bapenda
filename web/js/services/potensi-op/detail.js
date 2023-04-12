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
	jenisOp: null,
	jenisRincian: null,
	jenisOpCode: null,
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
	});
	if(data.potensiNarahubung) {
		data.potensiNarahubung.forEach(function(item, idx) {
			// addNarahubungLists(xthis);
			// xthis.refreshSelect(item.daerah_id, xthis.daerahs, `/kelurahan?kode=${data.potensiNarahubungs[idx].daerah.kode}&kode_opt=left&no_pagination=true`, xthis.narahubungLists[idx].kelurahans, 'kode');
		})
	}

	this.jenisOp = data.rekening.objek;
	this.jenisRincian = data.rekening.rincian;
	if(data.rekening.objek == '01') {
		this.jenisOpCode = 'hotel';
		data.detailPajaks = data['potensiHotels'];
	} else if(data.rekening.objek == '02') {
		this.jenisOpCode = 'resto';
		data.detailPajaks = data['potensiRestos'];
	} else if(data.rekening.objek == '03') {
		this.jenisOpCode = 'hiburan';
		data.detailPajaks = data['potensiHiburans'];
	} else if(data.rekening.objek == '04') {
		this.jenisOpCode = 'reklame';
		data.detailPajaks = data['potensiReklames'];
	} else if(this.jenisOp == '05' && this.jenisRincian == '01') {
		this.jenisOpCode = 'ppj';
		data.detailPajaks = data['potensiPpjs'];
	} else if(this.jenisOp == '05' && this.jenisRincian == '02') {
		this.jenisOpCode = 'ppjnonpln';
		data.detailPajaks = data['potensiPpjs'];
	} else if(data.rekening.objek == '07') {
		this.jenisOpCode = 'parkir';
		data.detailPajaks = data['potensiParkirs'];
	} else if(data.rekening.objek == '08') {
		this.jenisOpCode = 'airtanah';
		data.detailPajaks = data['potensiAirTanahs'];
	}

	if(data.bapl[0]) {
		this.bapl = data.bapl[0];
	}
	this.$forceUpdate();
}
