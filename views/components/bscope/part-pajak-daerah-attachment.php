<?php
$groupName = isset($paramJobName) ? strtolower($paramJobName) : 'input';
$attachType = isset($attachType) ? strtolower($attachType) : 'full';
?>

<div class="p-3">
  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Scan KTP</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
  </div>

  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Surat Permohonan</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
  </div>

  <?php if ($attachType === 'full'): ?>
  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Laporan Keuangan</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?>

  <div class="row justify-content-between align-items-center mb-4">
    <div class="col-10">Dokumen Lainnya</div>
    <div class="col-2 d-flex justify-content-end">
      <?php if ($groupName === 'input'): ?>
        <button type="button" class="btn btn-primary" style="width: 120px">Unggah</button>
      <?php else: ?>
        <button type="button" class="btn btn-secondary" style="width: 120px">Lihat</button>
      <?php endif; ?> 
    </div>
  </div>

  <?php if (!in_array($groupName, ['input', 'staff'])): ?>
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

  <?php if (!in_array($groupName, ['input', 'staff'])): ?>
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