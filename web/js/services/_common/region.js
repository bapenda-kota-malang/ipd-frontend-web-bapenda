regionData = {
  provinceId: null,
  provinceName: null,
  cityId: null,
  cityName: null,
  subdistrictId: null,
  subdistrictName: null,
  villageId: null,
  villageName: null,
  year: null,
  yearStart: null,
  yearEnd: null
}

regionErrors = {
  provinceError: null,
  cityError: null,
  subdistrictError: null,
  villageError: null,
  yearError: null
}

regionSources = {
  urlProvince: '/provinsi',
  urlCity: '/daerah',
  urlSubdistrict: '/kecamatan',
  urlVillage: '/kelurahan'
}

regionMethods = {
  onChangedProvinceParent: async (self, event) => {
    let codeText = event?.target?.value || ''
    self.data.provinceError = null
    self.data.provinceName = null
    codeText = codeText.trim()
    if (codeText.length === 2) {
      self.data.provinceId = codeText
      let res = await apiFetch(regionSources.urlProvince + '/' + codeText + '/kode', 'GET')
      if (typeof res.data == 'object') {
        self.data.provinceName = res.data.data.nama
      } else {
        self.data.provinceError = 'data propinsi tidak ditemukan'
      }
    }
  },
  onChangedCityParent: async (self, event) => {
    let codeText = event?.target?.value || ''
    self.data.cityError = null
    self.data.cityName = null
    codeText = codeText.trim()
    codeParentText = self.data.provinceId || ''
    if (codeText.length === 2) {
      self.data.cityId = codeText
      let res = await apiFetch(regionSources.urlCity + '/' +  codeParentText + codeText + '/kode', 'GET')
      if (typeof res.data == 'object') {
        self.data.cityName = res.data.data.nama
      } else {
        self.data.cityError = 'data Dati II tidak ditemukan'
      }
    }
  },
  onChangedSubdistrictParent: async (self, event) => {
    let codeText = event?.target?.value || ''
    self.data.subdistrictError = null
    self.data.subdistrictName = null
    codeText = codeText.trim()
    codeParentText = (self.data.provinceId || '') + (self.data.cityId || '')
    if (codeText.length === 3) {
      self.data.subdistrictId = codeText
      let res = await apiFetch(regionSources.urlSubdistrict + '/' +  codeParentText + codeText + '/kode', 'GET')
      if (typeof res.data == 'object') {
        self.data.subdistrictName = res.data.data.nama
      } else {
        self.data.subdistrictError = 'data kecamatan tidak ditemukan'
      }
    }
  },
  onChangedVillageParent: async (self, event) => {
    let codeText = event?.target?.value || ''
    self.data.villageError = null
    self.data.villageName = null
    codeText = codeText.trim()
    codeParentText = (self.data.provinceId || '') + (self.data.cityId || '') + (self.data.subdistrictId || '')
    if (codeText.length === 3) {
      self.data.villageId = codeText
      let res = await apiFetch(regionSources.urlVillage + '/' +  codeParentText + codeText + '/kode', 'GET')
      if (typeof res.data == 'object') {
        self.data.villageName = res.data.data.nama
      } else {
        self.data.villageError = 'data kelurahan tidak ditemukan'
      }
    }
  }
}
