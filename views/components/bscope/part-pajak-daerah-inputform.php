<?php
$groupName = isset($paramJobName) ? strtolower($paramJobName) : 'input';
$taxType = isset($taxType) ? strtolower($taxType) : 'keberatan';
?>

<div class="p-2 mb-4">
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">SPTPD/SKPD</div>
    <div class="col-3">
      <?php if ($groupName === 'input'): ?>
        <input v-model="data.skpd" type="text" class="form-control" @keyup="onSearchText">
      <?php else: ?>
        <input v-model="data.skpd" type="text" class="form-control" disabled>
      <?php endif; ?> 
    </div>
    <?php if (in_array($groupName, ['sekban', 'kaban'])): ?>
      <div class="col-3"></div>
      <div class="col-4 d-flex justify-content-end">
      <?php include 'part-pajak-daerah-button-01.php'; ?>
      </div>
    <?php endif; ?> 
  </div>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">NPWPD</div>
    <div class="col-3">
      <input v-model="data.npwpd" type="text" class="form-control" disabled>
    </div>
    <div class="col-3">&nbsp;</div>
    <div class="col-2">Tanggal Pengajuan</div>
    <div class="col-2">
      <?php if ($groupName === 'input'): ?>
        <datepicker v-model="data.tanggal" format="DD-MM-YYYY" />
      <?php else: ?>
        <input v-model="data.tanggal" type="text" class="form-control" disabled>
      <?php endif; ?>
    </div>
  </div>

  <?php if ($taxType === 'keberatan'): ?>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Jenis Usaha</div>
    <div class="col-5">
      <input v-model="data.jenisUsaha" type="text" class="form-control" disabled>
    </div>
    <div class="col-1"></div>
    <div class="col-2">Jenis Keberatan</div>
    <div class="col-2">
      <?php if ($groupName === 'input'): ?>
        <select v-model="data.jenisKeberatan" class="form-select"></select>
      <?php else: ?>
        <select v-model="data.jenisKeberatan" class="form-select" disabled></select>
      <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?>

  <?php if ($taxType === 'pengurangan'): ?>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Jenis Usaha</div>
    <div class="col-5">
      <input v-model="data.jenisUsaha" type="text" class="form-control" disabled>
    </div>
    <div class="col-1"></div>
    <div class="col-2">Jenis Pengurangan</div>
    <div class="col-2">
      <?php if ($groupName === 'input'): ?>
        <select v-model="data.jenisPengurangan" class="form-select"></select>
      <?php else: ?>
        <select v-model="data.jenisPengurangan" class="form-select" disabled></select>
      <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Nama Usaha</div>
    <div class="col-5">
      <input v-model="data.namaUsaha" type="text" class="form-control" disabled>
    </div>
  </div>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Alamat</div>
    <div class="col-7">
      <input v-model="data.alamatUsaha" type="text" class="form-control" disabled>
    </div>
  </div>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Kelurahan</div>
    <div class="col-2">
      <input v-model="data.kelurahan" type="text" class="form-control" disabled>
    </div>
    <div class="col-4"></div>
    <div class="col-2">Kecamatan</div>
    <div class="col-2">
      <input v-model="data.kecamatan" type="text" class="form-control" disabled>
    </div>
  </div>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Nama Pemohon</div>
    <div class="col-5">
      <?php if ($groupName === 'input'): ?>
        <input v-model="data.namaPemohon" type="text" class="form-control">
      <?php else: ?>
        <input v-model="data.namaPemohon" type="text" class="form-control" disabled>
      <?php endif; ?> 
      <span v-if="data.errors.namaPemohon" class="text-danger">{{ data.errors.namaPemohon }}</span>
    </div>
  </div>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Alamat Pemohon</div>
    <div class="col-7">
      <?php if ($groupName === 'input'): ?>
        <input v-model="data.alamatPemohon" type="text" class="form-control">
      <?php else: ?>
        <input v-model="data.alamatPemohon" type="text" class="form-control" disabled>
      <?php endif; ?> 
      <span v-if="data.errors.alamatPemohon" class="text-danger">{{ data.errors.alamatPemohon }}</span>
    </div>
  </div>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">No Telp Pemohon</div>
    <div class="col-3">
      <?php if ($groupName === 'input'): ?>
        <input v-model="data.telpPemohon" type="text" class="form-control">
      <?php else: ?>
        <input v-model="data.telpPemohon" type="text" class="form-control" disabled>
      <?php endif; ?> 
      <span v-if="data.errors.telpPemohon" class="text-danger">{{ data.errors.telpPemohon }}</span>
    </div>
  </div>

  <?php if ($taxType === 'pengurangan'): ?>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Alasan Pengurangan</div>
    <div class="col-7">
      <?php if ($groupName === 'input'): ?>
        <textarea v-model="data.alasanPengurangan" rows="5" class="form-control"></textarea>
      <?php else: ?>
        <textarea v-model="data.alasanPengurangan" rows="5" class="form-control" disabled></textarea>
      <?php endif; ?>
      <span v-if="data.errors.alasanPengurangan" class="text-danger">{{ data.errors.alasanPengurangan }}</span>
    </div>
  </div>
  <?php endif; ?>

  <?php if ($taxType === 'keberatan'): ?>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Alasan Keberatan</div>
    <div class="col-7">
      <?php if ($groupName === 'input'): ?>
        <textarea v-model="data.alasanKeberatan" rows="5" class="form-control"></textarea>
      <?php else: ?>
        <textarea v-model="data.alasanKeberatan" rows="5" class="form-control" disabled></textarea>
      <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?>

  <?php if ($taxType === 'keberatan'): ?>
  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Nominal Keberatan</div>
    <div class="col-3">
      <?php if (in_array($groupName, ['input', 'new'])): ?>
        <input v-model="data.nominalKeberatan" type="text" class="form-control">
      <?php else: ?>
        <input v-model="data.nominalKeberatan" type="text" class="form-control" disabled>
      <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?>

  <div class="row align-items-center g-0 mb-3">
    <div class="col-2">Keterangan</div>
    <div class="col-7">
      <?php if ($groupName === 'input'): ?>
        <textarea v-model="data.keterangan" rows="3" class="form-control"></textarea>
      <?php else: ?>
        <textarea v-model="data.keterangan" rows="3" class="form-control"></textarea>
      <?php endif; ?> 
    </div>
  </div>
</div>
