data = { year: null, errorMessage: null }

refSources = {
	imageUrl: '/static/img/',
	submitPrint: '/{id}/cetak',
	submitProcess: '/sppt/rincian'
}

methods = {
	getList: () => {},
	postDataFetch: () => {},
	nopNextAfter,
	onSearching
}

components = {
	datepicker: DatePicker
}

async function onSearching(menu, event) {
	this.data.errorMessage = null
	if (menu === 'info') {
		const payload = {
			propinsi_Id: this.data.provinsi_kode,
			dati2_Id: this.data.daerah_kode,
			kecamatan_Id: this.data.kecamatan_kode,
			keluarahan_Id: this.data.kelurahan_kode,
			blok_Id: this.data.kodeBlok, 
			noUrut: this.data.noUrut, 
			jenisOP_Id: this.data.kodeJenisOp,
			tahunPajakskp_sppt: String(this.data.year ? new Date(this.data.year).getFullYear() : new Date().getFullYear())
		}
		let res = await apiFetch(refSources.submitProcess, 'POST', payload)
		if (!res.success) {
			if (typeof res.message !== 'string' && res.message?.struct) {
				this.data.errorMessage = res.message?.struct?.errMessage
			} else {
				this.data.errorMessage = res.message
			}
		}
		this.$forceUpdate()
	}
}