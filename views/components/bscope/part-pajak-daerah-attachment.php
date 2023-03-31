<?php
$groupName = isset($paramJobName) ? strtolower($paramJobName) : 'input';
$attachType = isset($attachType) ? strtolower($attachType) : 'full';
?>

<input id="myFile" name="myFile" type="file" accept="application/pdf" class="d-none" @change="onHandleAttach" />

<div class="p-3">
  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Scan KTP</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px" @click="onClickAttach('fotoKtp')">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
    <div class="col-12">
      <span v-if="data.errors.fotoKtp" class="text-danger">{{ data.errors.fotoKtp }}</span>
      <span v-if="data.fotoKtpName" class="text-info">{{ data.fotoKtpName }}</span>
    </div>
  </div>

  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Surat Permohonan</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px" @click="onClickAttach('suratPermohonan')">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
    <div class="col-12">
      <span v-if="data.errors.suratPermohonan" class="text-danger">{{ data.errors.suratPermohonan }}</span>
      <span v-if="data.suratPermohonanName" class="text-info">{{ data.suratPermohonanName }}</span>
    </div>
  </div>

  <?php if ($attachType === 'full'): ?>
  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Laporan Keuangan</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px" @click="onClickAttach('laporanKeuangan')">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
    <div class="col-12">
      <span v-if="data.errors.laporanKeuangan" class="text-danger">{{ data.errors.laporanKeuangan }}</span>
      <span v-if="data.laporanKeuanganName" class="text-info">{{ data.laporanKeuanganName }}</span>
    </div>
  </div>
  <?php endif; ?>

  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Dokumen Lainnya</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px" @click="onClickAttach('dokumenLainnya')">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
    <div class="col-12">
      <span v-if="data.errors.dokumenLainnya" class="text-danger">{{ data.errors.dokumenLainnya }}</span>
      <span v-if="data.dokumenLainnyaName" class="text-info">{{ data.dokumenLainnyaName }}</span>
    </div>
  </div>

  <?php if (!in_array($groupName, ['input', 'new', 'staff'])): ?>
  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10 d-flex">
      LHP
      <?php if ($groupName === 'analis'): ?>
        <label class="text-danger ms-1" style="font-weight: 600">*</label>
      <?php endif; ?> 
    </div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'analis'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?>

  <?php if (!in_array($groupName, ['input', 'new', 'staff'])): ?>
  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Telaah Staff</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if (in_array($groupName, ['analis', 'kasubid'])): ?>
        <button type="button" class="btn btn-primary" style="width: 120px">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?> 
</div>