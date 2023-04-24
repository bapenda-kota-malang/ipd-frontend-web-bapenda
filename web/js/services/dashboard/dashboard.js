date = new Date();

urls = {
	pathname: '/',
	dataPath: '/target-realisasi?tahun=' + date.getFullYear(),
	dataSrc: '/target-realisasi?tahun=' + date.getFullYear(),
}
vars = {
	date:date,
	jenisPajakList,
	searchKeywords:null,
	dataProcessed: {
		A: { target: 0, realisasi: 0, percentage: 0 },
		B: { target: 0, realisasi: 0, percentage: 0 },
		C: { target: 0, realisasi: 0, percentage: 0 },
		D: { target: 0, realisasi: 0, percentage: 0 },
		E: { target: 0, realisasi: 0, percentage: 0 },
		F: { target: 0, realisasi: 0, percentage: 0 },
		G: { target: 0, realisasi: 0, percentage: 0 },
		PBB: { target: 0, realisasi: 0, percentage: 0 },
		BPHTB: { target: 0, realisasi: 0, percentage: 0 },
	}
}

appEl = '#vueBox';

function mounted() {
}

function postFetchData(data) {
	dp = this.dataProcessed;
	data.forEach(function(item){
		dp[item.jenisPajak_kode] = { 
			target: item.target,
			realisasi: item.realisasi,
			percentage: Math.round(item.realisasi / item.target * 100).toFixed(2) 
		}
	});
}