data = { datePublish: null, ...regionData, ...regionErrors, ...nopData, errorMessage: null };

vars = {
  bukuOpts,
  jumlahOP: null,
  opKe: null,
  blokKe: null,
  urutKe: null,
  jnsKe: null
}

refSources = {
  imageUrl: '/static/img/',
  submitCetak: '/{id}/cetak',
  submitProcess: '/sppt/salinan',
}

methods = {
  getList: () => {},
  onChangedRegion,
  onSearching
}

components = {
  datepicker: DatePicker,
  vueselect: VueSelect.VueSelect,
}

function mounted() {
  this.data.rows = []
  Array.from({ length: this.data.rowCounter || 5 }).forEach((item) => {
    this.data.rows.push({ 
      start: { block_id: '', number_id: '', type_id: '' },
      end: { block_id: '', number_id: '', type_id: '' },
    })
  })
}

async function onChangedRegion(menu, event) {
  if (menu === 'province') {
    await regionMethods.onChangedProvinceParent(this, event)
  }
  if (menu === 'city') {
    await regionMethods.onChangedCityParent(this, event)
  }
  if (menu === 'district') {
    await regionMethods.onChangedSubdistrictParent(this, event)
  }
  if (menu === 'village') {
    await regionMethods.onChangedVillageParent(this, event)
  }
  this.$forceUpdate()
}

async function onSearching(menu, event) {
  this.data.errorMessage = null
  if (menu === 'salinan') {
    const payload = {
      propinsi_Id: this.data.provinceId,
      dati2_Id: this.data.cityId,
      kecamatan_Id: this.data.subdistrictId,
      keluarahan_Id: this.data.villageId,
      tahunPajakskp_sppt: String(this.data.year ? new Date(this.data.year).getFullYear() : new Date().getFullYear()),
      nop_range: this.data?.rows?.filter(
        (item) => item.start && item.start.block_id !== '')
        ?.map((item) => ({ 
          start: { blok_Id: item.start.block_id, noUrut: item.start.number_id, jenisOP_Id: item.start.type_id }, 
          end: { blok_Id: item.end.block_id, noUrut: item.end.number_id, jenisOP_Id: item.end.type_id }
        })
      )
    }
    let res = await apiFetch(refSources.submitProcess, 'POST', payload)
    if (!res.success) {
      if (typeof res.message !== 'string' && res.message?.struct) {
        this.data.errorMessage = res.message?.struct?.errMessage
      } else {
        this.data.errorMessage = res.message
      }
    } else {
      const dataResult = res?.data || {}
      const detailNop = dataResult?.nop_range || {}
      if (Object.keys(detailNop).length === 0) {
        this.data.errorMessage = 'Data belum tersedia'
      }
    }
    this.$forceUpdate()
  }
} 
