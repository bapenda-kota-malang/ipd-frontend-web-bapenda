<div class="row align-items-center g-1 p-2 mb-1">
  <div class="col-12" style="font-weight: 600">Detail Objek Pajak Hiburan</div>
  <div class="col-12 p-2">
    <div class="row align-items-center g-3 my-2">
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span>Pengunjung Weekday</span>
        <input v-model="data.jumlahPengunjungWeekday" type="text" class="form-control" style="width: 50%">
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="text-end" style="width: 45%">Pengunjung Weekend</span>
        <input v-model="data.jumlahPengunjungWeekend" type="text" class="form-control" style="width: 50%">
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="text-end" style="width: 45%">Pertunjukan Weekday</span>
        <input v-model="data.jumlahPertunjukanWeekday" type="text" class="form-control" style="width: 50%">
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="text-end" style="width: 45%">Pertunjukan Weekend</span>
        <input v-model="data.jumlahPertunjukanWeekend" type="text" class="form-control" style="width: 50%">
      </div>
    </div>
    <div class="row align-items-center g-3 my-2">
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span>Jumlah Meja</span>
        <input v-model="data.jumlahMeja" type="text" class="form-control" style="width: 50%">
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="text-end" style="width: 45%">Jumlah Ruangan</span>
        <input v-model="data.jumlahRuangan" type="text" class="form-control" style="width: 50%">
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="text-end me-2" style="width: 45%">Karcis Bebas</span>
        <div class="d-flex align-items-center mt-2 w-50">
          <div class="form-check me-2">
            <input v-model="data.isKarcisBebas" class="form-check-input" type="radio" name="choose_bebas_1">
            <label class="form-check-label" for="choose_bebas_1">
              Ya
            </label>
          </div>
          <div class="form-check">
            <input v-model="data.isKarcisBebas" class="form-check-input" type="radio" name="choose_bebas_2">
            <label class="form-check-label" for="choose_bebas_2">
              Tidak
            </label>
          </div>
        </div>
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="text-end" style="width: 45%">Jumlah Karcis Bebas</span>
        <input v-model="data.jumlahKarcisBebas" type="text" class="form-control" style="width: 50%">
      </div>
    </div>
    <div class="row align-items-center g-3 my-2">
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span>Mesin Tiket</span>
        <div class="d-flex justify-content-start align-items-center mt-2 w-50">
          <div class="form-check me-2">
            <input v-model="data.isMesinTiket" class="form-check-input" type="radio" name="choose_tiket_1">
            <label class="form-check-label" for="choose_tiket_1">
              Ya
            </label>
          </div>
          <div class="form-check">
            <input v-model="data.isMesinTiket" class="form-check-input" type="radio" name="choose_tiket_2">
            <label class="form-check-label" for="choose_tiket_2">
              Tidak
            </label>
          </div>
        </div>
      </div>
      <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="text-end me-2" style="width: 45%">Pembukuan</span>
        <div class="d-flex align-items-center mt-2 w-50">
          <div class="form-check me-2">
            <input v-model="data.isPembukuan" class="form-check-input" type="radio" name="choose_buku_1">
            <label class="form-check-label" for="choose_buku_2">
              Ya
            </label>
          </div>
          <div class="form-check">
            <input v-model="data.isPembukuan" class="form-check-input" type="radio" name="choose_buku_2">
            <label class="form-check-label" for="choose_buku_2">
              Tidak
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
