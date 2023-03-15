<?php
$isYear = isset($withYear) && $withYear;
?>

<div class="row align-items-center mb-2">
    <div class="col-2 text-left text-uppercase">NOP</div>
		<div class="col-2">
		  <?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?>
		</div>
    <?php if ($isYear): ?>
      <div class="col-1 text-left text-uppercase">Tahun</div>
      <div class="col-1"><datepicker v-model="data.year" type="year" format="YYYY" /></div>
    <?php else: ?>
      <div class="col-2"></div>
    <?php endif; ?>
    <div class="col-2">
      <button type="button" class="btn btn-outline-secondary w-100">Cari</button>
    </div>
</div>

<div class="row align-items-center mb-2">
  <div class="col-2 text-left text-uppercase">Nama Wajib Pajak</div>
  <div class="col-6">
    <input v-model="data.nameWp" type="text" class="form-control" disabled />
  </div>
</div>

<div class="row align-items-center mb-2">
  <div class="col-2 text-left text-uppercase">Alamat Wajib Pajak</div>
  <div class="col-6">
    <textarea v-model="data.addressWp" rows="4" class="form-control" disabled></textarea>
  </div>
</div>

<div class="row align-items-center mb-4">
  <div class="col-2 text-left text-uppercase">Alamat Objek Pajak</div>
  <div class="col-6">
    <textarea v-model="data.addressOp" rows="4" class="form-control" disabled></textarea>
  </div>
</div>
