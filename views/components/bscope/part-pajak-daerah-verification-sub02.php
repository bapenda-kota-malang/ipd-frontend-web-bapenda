<?php
$groupName = isset($paramJobName) ? strtolower($paramJobName) : 'input';
$taxType = isset($taxType) ? strtolower($taxType) : 'keberatan';
?>

<div class="p-3">
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Petugas Verifikasi</div>
    </div>
    <div class="col-2 d-flex align-items-center">
      <input v-model="data.verifikatorPetugas" type="text" class="form-control" disabled>
      <!--
      <i class="bi bi-check-lg text-success ms-2"></i>
      <i class="bi bi-x-lg text-danger ms-2"></i>
      -->
    </div>
    <div class="col-2">
      <div class="text-end">Tanggal Verifikasi</div>
    </div>
    <div class="col-2">
      <input v-model="data.tanggalVerifikasiPetugas" type="text" class="form-control" disabled>
    </div>
  </div>
  <?php if ($groupName !== 'input'): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Keterangan</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.keteranganPetugas" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <?php endif; ?>

  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Analis Pemeriksa Pajak</div>
    </div>
    <div class="col-2">
      <input v-model="data.verifikatorAnalis" type="text" class="form-control" disabled>
    </div>
    <div class="col-2">
      <div class="text-end">Persentase Pengurangan</div>
    </div>
    <div class="col-2">
      <?php if ($groupName !== 'analis'): ?>
        <select v-model="data.percentPenguranganAnalis" class="form-select" disabled></select>
      <?php else: ?>
        <select v-model="data.percentPenguranganAnalis" class="form-select"></select>
      <?php endif; ?>
    </div>
    <div class="col-2">
      <div class="text-end">Tanggal Verifikasi</div>
    </div>
    <div class="col-2">
      <input v-model="data.tanggalVerifikasiAnalis" type="text" class="form-control" disabled>
    </div>
  </div>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Keterangan</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.keteranganAnalis" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Alasan Ditolak</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.alasanTolakAnalis" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Kasubid</div>
    </div>
    <div class="col-2">
      <input v-model="data.verifikatorKasubid" type="text" class="form-control" disabled>
    </div>
    <div class="col-2">
      <div class="text-end">Persentase Pengurangan</div>
    </div>
    <div class="col-2">
      <?php if ($groupName !== 'kasubid'): ?>
        <select v-model="data.percentPenguranganKasubid" class="form-select" disabled></select>
      <?php else: ?>
        <select v-model="data.percentPenguranganKasubid" class="form-select"></select>
      <?php endif; ?>
    </div>
    <div class="col-2">
      <div class="text-end">Tanggal Verifikasi</div>
    </div>
    <div class="col-2">
      <input v-model="data.tanggalVerifikasiKasubid" type="text" class="form-control" disabled>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis', 'kasubid'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Keterangan</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.keteranganKasubid" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Alasan Ditolak</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.alasanTolakKasubid" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis', 'kasubid'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Kabid</div>
    </div>
    <div class="col-2">
      <input v-model="data.verifikatorKabid" type="text" class="form-control" disabled>
    </div>
    <div class="col-2">
      <div class="text-end">Persentase Pengurangan</div>
    </div>
    <div class="col-2">
      <?php if ($groupName !== 'kabid'): ?>
        <select v-model="data.percentPenguranganKabid" class="form-select" disabled></select>
      <?php else: ?>
        <select v-model="data.percentPenguranganKabid" class="form-select"></select>
      <?php endif; ?>
    </div>
    <div class="col-2">
      <div class="text-end">Tanggal Verifikasi</div>
    </div>
    <div class="col-2">
      <input v-model="data.tanggalVerifikasiKabid" type="text" class="form-control" disabled>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis', 'kasubid', 'kabid'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Keterangan</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.keteranganKabid" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Alasan Ditolak</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.alasanTolakKabid" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis', 'kasubid', 'kabid'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Sekban</div>
    </div>
    <div class="col-2">
      <input v-model="data.verifikatorSekban" type="text" class="form-control" disabled>
    </div>
    <div class="col-2">
      <div class="text-end">Persentase Pengurangan</div>
    </div>
    <div class="col-2">
      <?php if ($groupName !== 'sekban'): ?>
        <select v-model="data.percentPenguranganSekban" class="form-select" disabled></select>
      <?php else: ?>
        <select v-model="data.percentPenguranganSekban" class="form-select"></select>
      <?php endif; ?>
    </div>
    <div class="col-2">
      <div class="text-end">Tanggal Verifikasi</div>
    </div>
    <div class="col-2">
      <input v-model="data.tanggalVerifikasiSekban" type="text" class="form-control" disabled>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis', 'kasubid', 'kabid', 'sekban'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Keterangan</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.keteranganSekban" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Alasan Ditolak</div>
    </div>
    <div class="col-10">
      <textarea v-model="data.alasanTolakSekban" rows="2" class="form-control" disabled></textarea>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'petugas', 'analis', 'kasubid', 'kabid', 'sekban'])): ?>
  <div class="row align-items-center g-3 mb-3">
    <div class="col-2">
      <div class="text-start">Kaban</div>
    </div>
    <div class="col-2">
      <input v-model="data.verifikatorKaban" type="text" class="form-control" disabled>
    </div>
    <div class="col-2">
      <div class="text-end">Persentase Pengurangan</div>
    </div>
    <div class="col-2">
      <?php if ($groupName === 'kaban'): ?>
        <select v-model="data.percentPenguranganKaban" class="form-select"></select>
      <?php endif; ?>
    </div>
    <div class="col-2">
      <div class="text-end">Tanggal Verifikasi</div>
    </div>
    <div class="col-2">
      <input v-model="data.tanggalVerifikasiKaban" type="text" class="form-control" disabled>
    </div>
  </div>
  <?php endif; ?>
</div>
