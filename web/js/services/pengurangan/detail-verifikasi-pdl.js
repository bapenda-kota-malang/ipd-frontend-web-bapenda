methods = {
  onClickAttach,
  onClickView,
  onHandleAttach,
  onHandleModal,
  onHandleModalClose,
  onAfterSearchText,
  onSearchText,
  onBack: () => window.location.href = '/pengurangan/verifikasi-pdl',
	onReject
}

async function onReject() {
	let el = document.querySelector('#rejectModal')
	if (!el) return
	const data = this.data
  data.errors = {}
	data.errors.alasanPenolakan = null
	if (!data.alasanPenolakan) {
		data.errors.alasanPenolakan = 'Alasan harus diisi'
		this.$forceUpdate()
		return
	}
	let pathArrays = (location.pathname).split('/')
  let id = pathArrays.pop()
	const payloads = {
    lhp: data.lhpRaw || null,
    telaahStaff: data.telaahStaffRaw || null,
    statusVerifikasi: 0,
    persentase: 30,
    keterangan: data.keterangan,
    alasanDitolak: data.alasanDitolak
  }
	let res = await apiFetch('/pengurangan/verify/' + id, 'PATCH', payloads)
  if (!res.success) {
		if (typeof res?.message === 'object' && res.message) {
      for (const key in res.message) {
        const element = res.message[key]
        data.errors[key] = element?.errMessage || ''
      }
    } else {
			alert(res.message)
		}
    this.$forceUpdate()
  } else {
		$('#rejectModal').modal('hide')
    alert('Berhasil disimpan')
		window.location.href = '/pengurangan/verifikasi-pdl'
  }
}

async function mounted(xthis) {
  await new Promise((resolve) => setTimeout(resolve, 150))
  const data = xthis.data
  let pathArrays = (location.pathname).split('/')
  let id = pathArrays.pop()
  let res = await apiFetch('/pengurangan/' + id, 'GET')
  if (res.success) {
    const dataServer = res.data?.data
    data.skpd = dataServer.spt_id
    onSearchByCode(xthis, false)
    data.tanggal = dateFormat(new Date(dataServer.tanggalPengajuan), ['d', 'm', 'y', '/'])
    data.namaPemohon = dataServer.namaPemohon
    data.alamatPemohon = dataServer.alamatPemohon
    data.telpPemohon = dataServer.telpPemohon
    data.alasanPengurangan = dataServer.alasanPengurangan
    data.keterangan = dataServer.keteranganPetugas
    data.verifikatorPetugas = dataServer.petugas?.name
    data.tanggalVerifikasiPetugas = dateFormat(new Date(dataServer.tanggalVerifPetugas), ['d', 'm', 'y', '/'])
    data.fotoKtp = dataServer.fotoKtp
    data.suratPermohonan = dataServer.suratPermohonan
    data.laporanKeuangan = dataServer.laporanKeuangan
    data.dokumenLainnya = dataServer.dokumenLainnya
    xthis.$forceUpdate()
  }
}
