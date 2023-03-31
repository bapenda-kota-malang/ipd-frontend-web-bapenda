methods = {
  onClickAttach,
  onHandleAttach,
  onHandleModal,
  onHandleModalClose,
  onAfterSearchText,
  onSearchText,
  onBack: () => window.location.href = '/pengurangan/pajak-daerah',
  onSave
}

async function onSave () {
  const data = this.data
  const dateString = data?.tanggal instanceof Date ? new Date(data.tanggal).toISOString() : new Date().toISOString()
  data.errors = {}
  const payloads = {
    spt_id: data.skpd,
    namaPemohon: data.namaPemohon,
    alamatPemohon: data.alamatPemohon,
    telpPemohon: data.telpPemohon,
    jenisPengurangan: 0,
    alasanPengurangan: data.alasanPengurangan,
    keteranganPetugas: data.keterangan,
    tanggalPengajuan: dateString,
    pctPermohonan: 20,
    fotoKtp: data.fotoKtpRaw || null,
    suratPermohonan: data.suratPermohonanRaw || null,
    laporanKeuangan: data.laporanKeuanganRaw || null,
    dokumenLainnya: data.dokumenLainnyaRaw || null
  }
  let res = await apiFetch('/pengurangan', 'POST', payloads)
  if (!res.success) {
    if (typeof res?.message === 'object' && res.message) {
      for (const key in res.message) {
        const element = res.message[key]
        data.errors[key] = element?.errMessage || ''
      }
    }
    this.$forceUpdate()
  }
}

async function mounted() {
  await new Promise((resolve) => setTimeout(resolve, 250))
  this.data.tanggal = new Date()
}
