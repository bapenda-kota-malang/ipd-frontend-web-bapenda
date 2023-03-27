<div class="row align-items-center g-1 my-2">
  <div class="col-2">
    <div>Bulan</div>
    <div>
      <vueselect v-model="data.bulan" :options="data.months" label="text" code="id" />
    </div>
  </div>
  <div class="col-2">
    <div>Tahun</div>
    <div>
      <datepicker v-model="data.tahun" type="year" format="YYYY" />
    </div>
  </div>
  <div class="col-2">
    <div>Pilih PPAT</div>
    <div>
      <vueselect />
    </div>
  </div>
  <div class="col-6 d-flex justify-content-end align-items-center">
    <button type="button" class="btn btn-success text-white" style="width: 86px; height: 46px">
      <i class="bi bi-printer-fill" style="font-size: 28px"></i>
    </button>
  </div>
</div>
