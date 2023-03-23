<div class="row align-items-center g-1 p-2 mb-1">
  <div class="col-12" style="font-weight: 600">Detail Objek Pajak Penerangan Jalan Non PLN</div>
  <div class="col-12">
    <div class="row align-items-center g-1 my-2">
      <div class="col-3">
        <span>Jenis Mesin Penggerak</span>
        <input v-model="data.jenisMesin" type="text" class="form-control" style="width: 75%">
      </div>
      <div class="col-3">
        <span>Tahun Mesin Penggerak</span>
        <input v-model="data.tahunMesin" type="text" class="form-control" style="width: 75%">
      </div>
      <div class="col-3">
        <span>Beban Puncak Mesin yang Digunakan</span>
        <input v-model="data.bebanMesin" type="text" class="form-control" style="width: 75%">
      </div>
    </div>
    <div class="row align-items-center g-1 my-2">
      <div class="col-3">
        <span>Jumlah Jam Sehari</span>
        <input v-model="data.jumlahJam" type="text" class="form-control" style="width: 75%">
      </div>
      <div class="col-3">
        <span>Jumlah Hari Kerja Sebulan</span>
        <input v-model="data.jumlahHariKerja" type="text" class="form-control" style="width: 75%">
      </div>
      <div class="col-3">
        <span>Menggunakan Tenaga Listrik PLN</span>
        <div class="d-flex align-items-center mt-2">
          <div class="form-check me-2">
            <input v-model="data.isTenagaListrik" class="form-check-input" type="radio" name="choose1">
            <label class="form-check-label" for="choose1">
              Ya
            </label>
          </div>
          <div class="form-check">
            <input v-model="data.isTenagaListrik" class="form-check-input" type="radio" name="choose2">
            <label class="form-check-label" for="choose2">
              Tidak
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
