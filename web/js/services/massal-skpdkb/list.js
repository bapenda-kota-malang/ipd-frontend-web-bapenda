jenis_pajak = document.getElementById("jenis_pajak").value;
kode_jenis_usaha = document.getElementById("kode_jenis_usaha").value;
type = document.getElementById("type").value;

if (!type || type != 'sa') {
	type = 'oa';
	kb = '';
} else {
	type = 'sa',
	kb = 'kb';
}

urls = {
	pathname: `/penetapan/massal-skpdkb/${jenis_pajak}`,
	dataPath: `/penetapan-massal`,
	dataSrc: `/penetapan-massal`,
	dataSrcParams: {
		type: type,
		kode_jenis_usaha: kode_jenis_usaha,
	},
	daataSrcParams: {
		type,
	},
	doSalin: "/penetapan-massal/copy",
};
vars = {
	checkedRows: [],
};

methods = {
	doCheckRow,
	doCheckAll,
	doSalin,
};

async function doSalin() {
	if (this.checkedRows.length == 0) {
		alert("Pilih data yang akan disalin");
		return;
	}

	let payload = {
		spt_id: this.checkedRows.map((item) => item.id),
		types: "sa",
	};

	let response = await apiFetch(urls.doSalin, "POST", payload);

	if (response.success) {
		alert("Berhasil menyalin data");
		this.checkedRows = [];
		this.data.forEach((item, index) => {
			item.checked = false;
		});

		// refresh data
		location.reload();
	} else {
		alert("Gagal menyalin data");
	}
}

function doCheckRow(index) {
	this.data[index].checked = !this.data[index].checked;
	this.data[index].checked
		? this.checkedRows.push(this.data[index])
		: this.checkedRows.splice(this.checkedRows.indexOf(this.data[index]), 1);
}

function doCheckAll() {
	this.checkedRows = [];
	this.data.forEach((item, index) => {
		item.checked = !this.checkAll;
		item.checked ? this.checkedRows.push(item) : null;
	});
}

function postFetchData(data) {
	if(!data) {
		this.data = [];
		data = this.data;
		console.log(data);
	}
	data.forEach(function (item, idx) {
		item.periode_awal = formatDate(
			new Date(item.periode_awal),
			["d", "m", "y"],
			"/"
		);
		item.periode_akhir = formatDate(
			new Date(item.periode_akhir),
			["d", "m", "y"],
			"/"
		);
		item.tanggal_spt = formatDate(
			new Date(item.tanggal_spt),
			["d", "m", "y"],
			"/"
		);
		item.jatuh_tempo = formatDate(
			new Date(item.jatuh_tempo),
			["d", "m", "y"],
			"/"
		);
	});
}
