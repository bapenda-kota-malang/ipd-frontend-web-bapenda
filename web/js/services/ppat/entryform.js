urls = {
	pathname: '/ppat/manajemen-user-ppat',
	dataPath: '/ppat',
	dataSrc: '/ppat',
	submit: '/ppat/{id}',
	// postSubmit: '/konfigurasi/manajemen-user/user-pegawai',
}
data = {...entryDto}
vars = {
	// jabatans,
	// bidangKerjas: [],
	// parents: [],
	// groups: [],

}
refSources = {
	// bidangKerjas: '/bidangkerja',
	// groups: '/group?no_pagination=true',
}
components = {
	// datepicker: DatePicker,
	// vueselect: VueSelect.VueSelect,
}

function postCreated() {
	// this.data.startDate = formatDate(this.data.startDate);
	// if(!this.id) {
	// 	this.data.startDate = new Date();
	// 	this.data.endDate = new Date();
	// 	this.data.endDate.setFullYear(this.data.endDate.getFullYear() + 10);
	// } else {
	// 	if(this.data.startDate) {
	// 		this.data.startDate = new Date(this.data.startDate.substring(0, 10));
	// 	} else {
	// 		this.data.startDate = new Date();
	// 	}
	// 	if(this.data.endDate) {
	// 		this.data.endDate = new Date(this.data.endDate.substring(0, 10));
	// 	} else {
	// 		this.data.endDate = new Date();
	// 	}
	// 	this.data.user_sysAdmin = this.data.user_sysAdmin == 1 ? true : false;
	// }
}

function postFetchData(data)  {
	if(data.jabatan_id > 0) {
		data.jabatan_id = parseInt(data.jabatan_id);
	}
}

function unsetBidang() {
	this.data.bidangKerja_kode = null;
}