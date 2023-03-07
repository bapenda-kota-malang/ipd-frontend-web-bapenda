<div class="card mb-4">
  <div class="card-header fw-600">
		Data Wilayah
	</div>
  <div class="card-body">
    <div class="row g-3">
      <div class="col-6 col-xs-12">
        <div class="row align-items-center g-2">
          <div class="col-2">Propinsi</div>
          <div class="col-2"><input tabindex="1" class="form-control" v-model="data.provinceId" @input="onChangedProvince($event)" /></div>
          <div class="col-8"><input v-model="data.provinceName" class="form-control" disabled /></div>
          <div class="col-12 d-flex justify-content-end"><span class="text-danger" v-if="data.provinceError">{{ data.provinceError }}</span></div>
        </div>
      </div>
      <div class="col-6 col-xs-12">
        <div class="row align-items-center g-2">
          <div class="col-2">Kecamatan</div>
          <div class="col-2"><input tabindex="3" v-model="data.subdistrictId" @input="onChangedSubdistrict($event)" class="form-control" /></div>
          <div class="col-8"><input v-model="data.subdistrictName" class="form-control" disabled /></div>
          <div class="col-12 d-flex justify-content-end"><span class="text-danger" v-if="data.subdistrictError">{{ data.subdistrictError }}</span></div>
        </div>
      </div>
      <div class="col-6 col-xs-12">
        <div class="row align-items-center g-2">
          <div class="col-2">Dati II</div>
          <div class="col-2"><input tabindex="2" v-model="data.cityId" @input="onChangedCity($event)" class="form-control" /></div>
          <div class="col-8"><input v-model="data.cityName" class="form-control" disabled /></div>
          <div class="col-12 d-flex justify-content-end"><span class="text-danger" v-if="data.cityError">{{ data.cityError }}</span></div>
        </div>
      </div>
      <div class="col-6 col-xs-12">
        <div class="row align-items-center g-2">
          <div class="col-2">Kelurahan</div>
          <div class="col-2"><input tabindex="4" v-model="data.villageId" @input="onChangedVillage($event)" class="form-control" /></div>
          <div class="col-8"><input v-model="data.villageName" class="form-control" disabled /></div>
          <div class="col-12 d-flex justify-content-end"><span class="text-danger" v-if="data.villageError">{{ data.villageError }}</span></div>
        </div>
      </div>
      <div class="col-6 col-xs-12">
        <div class="row align-items-center g-2">
          <div class="col-2">Tahun</div>
          <div class="col-2"><input tabindex="5" v-model="data.year" class="form-control" /></div>
        </div>
      </div>
    </div>
  </div>
</div>