urls = {
	pathname: '/konfigurasi/data-ref/master/bidang-kerja',
	dataPath: '/bidangkerja',
	dataSrc: '/bidangkerja',
	submit: '/bidangkerja/{id}',
}
vars = {
	selectedIdx: null,
	entryData: entryDto,
	entryFormTitle: 'Entry Form',
	levelBidangs,
	parents: [],
}
components = {
	vueselect: VueSelect.VueSelect,
}

function cleanData(data) {
	delete data.id;
	data.level = null;
	data.parent_id = null;
	data.kode = null;
	data.nama = null;
}

function preSubmitEntry() {
	this.entryData.parent_id = parseInt(this.entryData.parent_id)
	this.entryData.level = parseInt(this.entryData.level)
	if(this.entryData.parent_id == 0) {
		this.entryData.parent_id = null;
	}
}