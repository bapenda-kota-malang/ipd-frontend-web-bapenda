data = {...responseVerifikasi};
vars = {
	bidangKerja_kode: null,
	jabatan_id: null,
	user_name: null,
	user_id: null,
	nip: null,
	statusKolektifs,
	jenisPelayanans,
	jenisPengurangans,
	alasanPengurangans,
	pekerjaans,
	statusKepemilikans,
	jenisBumis,
	kondisiBangunans,
	jenisKonstruksis,
	jenisAtaps,
	kodeDindings,
	kodeLantais,
	kodeLangitLangits,
	fbTipeLapisanKolams,
	fbPagarBahans,
	kelasBangunans,
	jpbHotelJeniss,
	jpbHotelBintangs,
	jpbTankiLetaks,
	buktiKepemilikans,
	jumlahBangunan: 0,
	hideApproval: false,
	regObjekPajakBng: regObjekPajakBngs,
	options:['test', 'ok'],
}
urls = {
	preSubmit: '/pelayanan/verifikasi-data-permohonan',
	postSubmit: '/pelayanan/verifikasi-data-permohonan',
	submit: '/permohonan-approval/{id}',
	dataSrc: '/regpermohonan-approval',
}
refSources = {
	imageUrl: '/static/img/',
	submitVerifikasi:'/permohonan-approval/',
	submitRegVerifikasi: '/permohonan-approval/',
	doneApproval: '/pelayanan/verifikasi-data-permohonan',
}
methods = {
	// click,
	approveRequest,
	rejectRequest,
	storeFileToField,
}
components = {
	datepicker: DatePicker,
	vueselect: VueSelect.VueSelect,
}

function created() {
	if(!id) {
		data.noPelayanan = "AUTO";
	}
	bidangKerja_kode = document.getElementById('bidangKerja_kode') ? document.getElementById('bidangKerja_kode').value : null;
	jabatan_id = document.getElementById('jabatan_id') ? document.getElementById('jabatan_id').value : null;
	user_name = document.getElementById('user_name') ? document.getElementById('user_name').value : null;
	user_id = document.getElementById('user_id') ? document.getElementById('user_id').value : null;
    nip = document.getElementById('nip') ? document.getElementById('nip').value : null;

	console.log(user_id);
	console.log("DTO : ");
	console.log(data);

    data.nip =nip;
	data.tahunPajak = new Date().getFullYear().toString();
	console.log(data.noPelayanan);
}

async function approveRequest(data) {
	console.log("masuk approval");
	console.log(data)
	originStatus = data.status
	if (data.status == '00') {
		data.status = '01';
	} else if (data.status == '01') {
		data.status = '02';
	} else if (data.status == '02') {
		data.status = '04';
	} else if (data.status == '04') {
		data.status = '05';
	} else {
		data.status = '00';
	}
	
	// data.tahunPelayanan = data.tahunPajak;
	data.nop =  data.NopProvinsi + data.NopDaerah + data.NopKecamatan + data.NopKelurahan + data.NopBlok + data.NopNoUrut + data.NopJenisOP
	if (data.oppbb != null) {
		if (data.oppbb.regObjekPajakBumi != null) {
			if (data.oppbb.regObjekPajakBumi.regObjekPajakBng != null) {
				data.oppbb.regObjekPajakBumi.regObjekPajakBng.forEach(convertStoI);
			}		
		}
	}

	console.log(this.lhp);
	console.log(this.telaah);

	if (data.pstLogApproval != null) {
		// data.pstLogApproval.forEach(setApproval);
	} else {
		data.pstLogApproval = []
		if (this.jabatan == '4') {
			data.pstLogApproval.push({
				permohonan_id: data.id,
				user_id: this.user_id,
				catatan: data.catatanApproval,
				keterangan: null,
				status: data.status,
				jabatan: this.jabatan,
				divisi: null,
			});
		} else {
			data.pstLogApproval.push({
				permohonan_id: data.id,
				user_id: this.user_id,
				catatan: null,
				keterangan: null,
				status: data.status,
				jabatan: this.jabatan,
				divisi: null,
			});
		}
	}
	
	data.namaStaff = this.user_name
	res = await apiFetch(refSources.submitRegVerifikasi + data.id + '/reg', 'PATCH', data);
	if (res != null) {
		console.log(res)
		if(typeof res.data == 'object') {
			hideApproval = true;
			window.location.href = refSources.doneApproval;
		}
	}
}

function convertStoI(item) {
	if (item.noBangunan != null) {
		item.noBangunan = parseInt(item.noBangunan, 10);
	}
	if (item.luasBangunan != null) {
		item.luasBangunan = parseInt(item.luasBangunan, 10);
	}
	if (item.jmlLantaiBng != null) {
		item.jmlLantaiBng = parseInt(item.jmlLantaiBng, 10);
	}
	if (item.regFasBangunan.fbJumlahACSplit != null) {
		item.regFasBangunan.fbJumlahACSplit = parseInt(item.regFasBangunan.fbJumlahACSplit, 10);
	}
	if (item.regFasBangunan.fbJumlahACWindow != null) {
		item.regFasBangunan.fbJumlahACWindow = parseInt(item.regFasBangunan.fbJumlahACWindow, 10);
	}
	if (item.regFasBangunan.fbLuasKolamRenang != null) {
		item.regFasBangunan.fbLuasKolamRenang = parseInt(item.regFasBangunan.fbLuasKolamRenang, 10);
	}
	if (item.regFasBangunan.fbTipeLapisanKolam != null) {
		item.regFasBangunan.fbTipeLapisanKolam = parseInt(item.regFasBangunan.fbTipeLapisanKolam, 10);
	}
	if (item.regFasBangunan.fbHalamanRingan != null) {
		item.regFasBangunan.fbHalamanRingan = parseInt(item.regFasBangunan.fbHalamanRingan, 10);
	}
	if (item.regFasBangunan.fbHalamanSendang != null) {
		item.regFasBangunan.fbHalamanSendang = parseInt(item.regFasBangunan.fbHalamanSendang, 10);
	}
	if (item.regFasBangunan.fbHalamanBerat != null) {
		item.regFasBangunan.fbHalamanBerat = parseInt(item.regFasBangunan.fbHalamanBerat, 10);
	}
	if (item.regFasBangunan.fbPagarPanjang != null) {
		item.regFasBangunan.fbPagarPanjang = parseInt(item.regFasBangunan.fbPagarPanjang, 10);
	}
	if (item.regFasBangunan.fbPagarBahan != null) {
		item.regFasBangunan.fbPagarBahan = parseInt(item.regFasBangunan.fbPagarBahan, 10);
	}
	if (item.regFasBangunan.fbIsACCentral != null) {
		item.regFasBangunan.fbIsACCentral = parseInt(item.regFasBangunan.fbIsACCentral, 10);
	}
	if (item.regFasBangunan.fbHalamanLantai != null) {
		item.regFasBangunan.fbHalamanLantai = parseInt(item.regFasBangunan.fbHalamanLantai, 10);
	}
	if (item.regFasBangunan.fbTenisLampuBeton != null) {
		item.regFasBangunan.fbTenisLampuBeton = parseInt(item.regFasBangunan.fbTenisLampuBeton, 10);
	}
	if (item.regFasBangunan.fbTenisTanpaLampuBeton != null) {
		item.regFasBangunan.fbTenisTanpaLampuBeton = parseInt(item.regFasBangunan.fbTenisTanpaLampuBeton, 10);
	}
	if (item.regFasBangunan.fbTenisAspal1 != null) {
		item.regFasBangunan.fbTenisAspal1 = parseInt(item.regFasBangunan.fbTenisAspal1, 10);
	}
	if (item.regFasBangunan.fbTenisAspal2 != null) {
		item.regFasBangunan.fbTenisAspal2 = parseInt(item.regFasBangunan.fbTenisAspal2, 10);
	}
	if (item.regFasBangunan.fbTenisLiatRumput1 != null) {
		item.regFasBangunan.fbTenisLiatRumput1 = parseInt(item.regFasBangunan.fbTenisLiatRumput1, 10);
	}
	if (item.regFasBangunan.fbTenisLiatRumput2 != null) {
		item.regFasBangunan.fbTenisLiatRumput2 = parseInt(item.regFasBangunan.fbTenisLiatRumput2, 10);
	}
	if (item.regFasBangunan.fbLiftPenumpang != null) {
		item.regFasBangunan.fbLiftPenumpang = parseInt(item.regFasBangunan.fbLiftPenumpang, 10);
	}
	if (item.regFasBangunan.fbLiftKapsul != null) {
		item.regFasBangunan.fbLiftKapsul = parseInt(item.regFasBangunan.fbLiftKapsul, 10);
	}
	if (item.regFasBangunan.fbLiftBarang != null) {
		item.regFasBangunan.fbLiftBarang = parseInt(item.regFasBangunan.fbLiftBarang, 10);
	}
	if (item.regFasBangunan.fbTangga80 != null) {
		item.regFasBangunan.fbTangga80 = parseInt(item.regFasBangunan.fbTangga80, 10);
	}
	if (item.regFasBangunan.fbTangga81 != null) {
		item.regFasBangunan.fbTangga81 = parseInt(item.regFasBangunan.fbTangga81, 10);
	}
	if (item.regFasBangunan.fbPKHydrant != null) {
		item.regFasBangunan.fbPKHydrant = parseInt(item.regFasBangunan.fbPKHydrant, 10);
	}
	if (item.regFasBangunan.fbPKSplinkler != null) {
		item.regFasBangunan.fbPKSplinkler = parseInt(item.regFasBangunan.fbPKSplinkler, 10);
	}
	if (item.regFasBangunan.fbPKFireAI != null) {
		item.regFasBangunan.fbPKFireAI = parseInt(item.regFasBangunan.fbPKFireAI, 10);
	}
	if (item.regFasBangunan.fbPABX != null) {
		item.regFasBangunan.fbPABX = parseInt(item.regFasBangunan.fbPABX, 10);
	}
	if (item.regFasBangunan.fbSumur != null) {
		item.regFasBangunan.fbSumur = parseInt(item.regFasBangunan.fbSumur, 10);
	}
	if (item.regFasBangunan.jpbKlinikACCentralKamar != null) {
		item.regFasBangunan.jpbKlinikACCentralKamar = parseInt(item.regFasBangunan.jpbKlinikACCentralKamar, 10);
	}
	if (item.regFasBangunan.jpbKlinikACCentralRuang != null) {
		item.regFasBangunan.jpbKlinikACCentralRuang = parseInt(item.regFasBangunan.jpbKlinikACCentralRuang, 10);
	}
	if (item.regFasBangunan.jpbHotelACCentralKamar != null) {
		item.regFasBangunan.jpbHotelACCentralKamar = parseInt(item.regFasBangunan.jpbHotelACCentralKamar, 10);
	}
	if (item.regFasBangunan.jpbHotelACCentralRuang != null) {
		item.regFasBangunan.jpbHotelACCentralRuang = parseInt(item.regFasBangunan.jpbHotelACCentralRuang, 10);
	}	
	if (item.regFasBangunan.jpbHotelJenis != null) {
		item.regFasBangunan.jpbHotelJenis = parseInt(item.regFasBangunan.jpbHotelJenis, 10);
	}	
	if (item.regFasBangunan.jpbHotelBintang != null) {
		item.regFasBangunan.jpbHotelBintang = parseInt(item.regFasBangunan.jpbHotelBintang, 10);
	}	
	if (item.regFasBangunan.jpbHotelJmlKamar != null) {
		item.regFasBangunan.jpbHotelJmlKamar = parseInt(item.regFasBangunan.jpbHotelJmlKamar, 10);
	}	
	if (item.regFasBangunan.jpbApartemenJumlah != null) {
		item.regFasBangunan.jpbApartemenJumlah = parseInt(item.regFasBangunan.jpbApartemenJumlah, 10);
	}
	if (item.regFasBangunan.jpbApartemenACCentralKamar != null) {
		item.regFasBangunan.jpbApartemenACCentralKamar = parseInt(item.regFasBangunan.jpbApartemenACCentralKamar, 10);
	}	
	if (item.regFasBangunan.jpbApartemenACCentralLain != null) {
		item.regFasBangunan.jpbApartemenACCentralLain = parseInt(item.regFasBangunan.jpbApartemenACCentralLain, 10);
	}	
	if (item.regFasBangunan.jpbTankiKapasitas != null) {
		item.regFasBangunan.jpbTankiKapasitas = parseInt(item.regFasBangunan.jpbTankiKapasitas, 10);
	}	
	if (item.regFasBangunan.jpbProdTinggi != null) {
		item.regFasBangunan.jpbProdTinggi = parseInt(item.regFasBangunan.jpbProdTinggi, 10);
	}	
	if (item.regFasBangunan.jpbProdLebar != null) {
		item.regFasBangunan.jpbProdLebar = parseInt(item.regFasBangunan.jpbProdLebar, 10);
	}	
	if (item.regFasBangunan.jpbProdDaya != null) {
		item.regFasBangunan.jpbProdDaya = parseInt(item.regFasBangunan.jpbProdDaya, 10);
	}	
	if (item.regFasBangunan.jpbProdKeliling != null) {
		item.regFasBangunan.jpbProdKeliling = parseInt(item.regFasBangunan.jpbProdKeliling, 10);
	}	
	if (item.regFasBangunan.jpbProdLuas != null) {
		item.regFasBangunan.jpbProdLuas = parseInt(item.regFasBangunan.jpbProdLuas, 10);
	}	
	if (item.regFasBangunan.fbDayaListrik != null) {
		item.regFasBangunan.fbDayaListrik = parseInt(item.regFasBangunan.fbDayaListrik, 10);
	}	
} 

async function rejectRequest(data) {
	originStatus = data.status

	data.status = '03';

	console.log(originStatus)
	console.log(data.status)
	res = await apiFetch(refSources.submitRegVerifikasi + data.id + '/reg', 'PATCH', data);
	console.log(res)
	if(typeof res.data == 'object') {
		window.location.href = refSources.doneApproval;
	}
}


function preSubmitEntry() {
	data = this.data
	if(data.tanggalTerima && typeof data.tanggalTerima['getDate'] == 'function') {
		data.tanggalTerima = formatDate(data.tanggalTerima);
	} 
	if(data.tanggalSelesai && typeof data.tanggalSelesai['getDate'] == 'function') {
		data.tanggalSelesai = formatDate(data.tanggalSelesai);
	} 
	if(data.tanggalPermohonan && typeof data.tanggalPermohonan['getDate'] == 'function') {
		data.tanggalPermohonan = formatDate(data.tanggalPermohonan);
	}
	
    console.log("preSubmit") 
}

function postFetchData(data) {
	console.log("Data Fetch : ");
	console.log(data);
	if(this.id) {
		if (data.oppbb.regObjekPajakBumi.regObjekPajakBng != null) {
			this.regObjekPajakBng = data.oppbb.regObjekPajakBumi.regObjekPajakBng;
			this.jumlahBangunan = data.oppbb.regObjekPajakBumi.regObjekPajakBng.length; 
		}

		data.NopProvinsi = data.nop.substring(0, 2);
		data.NopDaerah = data.nop.substring(2, 4);
		data.NopKecamatan = data.nop.substring(4, 7);
		data.NopKelurahan = data.nop.substring(7, 10);
		data.NopBlok = data.nop.substring(10, 13);
		data.NopNoUrut = data.nop.substring(13, 17);
		data.NopJenisOP = data.nop.substring(17, 18);

		data.tahunPajak = data.tahunPelayanan;

		data.tanggalTerima = data.tanggalTerima ? new Date(data.tanggalTerima.substr(0,10)) : null;
		data.tanggalPermohonan = data.tanggalSuratPermohonan ? new Date(data.tanggalSuratPermohonan.substr(0,10)) : null;
		data.tanggalSelesai = data.pstDetil.tanggalSelesai ? new Date(data.pstDetil.tanggalSelesai.substr(0,10)) : null;

		this.lhp = data.pstLampiran.lampiranLhp;
		this.telaah = data.pstLampiran.lampiranTelaah;

		GetValue(verifikasiPermohonans, data.status).then( value => data.status = value);
	}
}

