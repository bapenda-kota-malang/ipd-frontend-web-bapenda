<div class="mb-4 p-2">
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">SPTPD/SKPD</div>
    <div class="col-3">
      <input v-model="data.skpd" type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">NPWPD</div>
    <div class="col-3">
      <input v-model="data.npwpd" type="text" class="form-control" disabled>
    </div>
    <div class="col-3">&nbsp;</div>
    <div class="col-2">Tanggal Pengajuan</div>
    <div class="col-2">
      <input v-model="data.npwpd" type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Jenis Usaha</div>
    <div class="col-5">
      <input type="text" class="form-control" disabled>
    </div>
    <div class="col-1"></div>
    <div class="col-2">Jenis Pengurangan</div>
    <div class="col-2">
      <input type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Nama Usaha</div>
    <div class="col-5">
      <input type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Alamat</div>
    <div class="col-7">
      <input type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Kelurahan</div>
    <div class="col-2">
      <input type="text" class="form-control" disabled>
    </div>
    <div class="col-4"></div>
    <div class="col-2">Kecamatan</div>
    <div class="col-2">
      <input type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Nama Pemohon</div>
    <div class="col-5">
      <input type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Alamat Pemohon</div>
    <div class="col-7">
      <input type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">No Telp Pemohon</div>
    <div class="col-3">
      <input type="text" class="form-control" disabled>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Alasan Pengurangan</div>
    <div class="col-7">
      <textarea v-model="data.alasanPengurangan" rows="5" class="form-control" disabled></textarea>
    </div>
  </div>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Keterangan</div>
    <div class="col-7">
      <textarea v-model="data.keterangan" rows="3" class="form-control"></textarea>
    </div>
  </div>
</div>
