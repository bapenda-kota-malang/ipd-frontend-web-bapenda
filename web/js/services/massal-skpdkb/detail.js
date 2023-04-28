id = document.getElementById("id").value;
if (!id) {
	id = 0;	
}

type = document.getElementById("type").value;
if (!type || type != 'sa') {
	type = 'oa';
	kb = '';
} else {
	kb = 'kb';
}

data = { ...skpd };
urls = {
	dataSrc: `/skpd${kb}/${id}`,
};
vars = {
	npwpd: null,
	objek: null,
	rincian: null,
	kodeRekening: null,
	jenisUsaha: null,
	namaUsaha: null,
	alamatUsaha: null,
	rtRwUsaha: null,
	kelurahanUsaha: null,
	npwpdFound: false,
	rekening_id: null,
	rekening_objek: null,
	rekening_rincian: null,
	arrayDetailStatus: false,
	npwpdList: [],
};
methods = {
	approveRequest: function () {
		approveRequest(this);
	},
	rejectRequest: function () {
		rejectRequest(this);
	},
	formatDate,
};

function postDataFetch(data, xthis) {
	// console.log(data)
	if (data.verifyStatus != "baru") {
		xthis.hideApproval = true;
	}
	xthis.rekening_objek = data.rekening.objek;
	// tglNpwpd = data.npwpd.tanggalNpwpd;
	prdAwal = data.periodeAwal;
	prdAkhir = data.periodeAkhir;
	jtTempo = data.jatuhTempo;
	// data.npwpd.tanggalNpwpd = `${tglNpwpd.substring(8,10)}/${tglNpwpd.substring(5,7)}/${tglNpwpd.substring(0,4)}`;
	data.periodeAwal = `${prdAwal.substring(8, 10)}/${prdAwal.substring(
		5,
		7
	)}/${prdAwal.substring(0, 4)}`;
	data.periodeAkhir = `${prdAkhir.substring(8, 10)}/${prdAkhir.substring(
		5,
		7
	)}/${prdAkhir.substring(0, 4)}`;
	data.jatuhTempo = `${jtTempo.substring(8, 10)}/${jtTempo.substring(
		5,
		7
	)}/${jtTempo.substring(0, 4)}`;
	if (data.rekening.objek == "01") {
		data.dataDetails = data.detailEsptHotel;
	} else if (data.rekening.objek == "02") {
		data.dataDetails = data.detailEsptResto;
	} else if (data.rekening.objek == "03") {
		data.dataDetails = data.detailEsptHiburan;
	} else if (data.rekening.objek == "05") {
		data.dataDetails = data.detailEsptPpj;
	} else if (data.rekening.objek == "07") {
		data.dataDetails = data.detailEsptParkir;
	} else if (data.rekening.objek == "08") {
		data.dataDetails = data.detailEsptAirtanah;
	}
}
