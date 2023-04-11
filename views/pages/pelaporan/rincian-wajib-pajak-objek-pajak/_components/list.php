<?php
use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/pelaporan/rincian-wajib-pajak-objek-pajak.js?v=20230201a');
?>

<div class="row align-items-center g-2">
  <div class="col-12">
    <div>Tanggal Awal</div>
    <div style="width: 20%">
      <datepicker v-model="data.tanggalAwal" type="date" format="DD/MM/YYYY" />
    </div>
  </div>
  <div class="col-12">
    <div>Tanggal Akhir</div>
    <div style="width: 20%">
      <datepicker v-model="data.tanggalAkhir" type="date" format="DD/MM/YYYY" />
    </div>
  </div>
  <div class="col-12">
    <div>NPWPD</div>
    <div style="width: 20%">
      <input v-model="data.npwpd" class="form-control" type="text" />
    </div>
  </div>
  <div class="col-12">
    <div>Golongan</div>
    <div style="width: 50%">
      <vueselect v-model="data.golongan" :options="data.golonganList" label="text" :reduce="value => value.id" />
    </div>
  </div>
  <div class="col-12">
    <div>Pajak</div>
    <div style="width: 50%">
      <vueselect v-model="data.pajak" :options="data.pajakList" label="text" :reduce="value => value.id" />
    </div>
  </div>
  <hr class="my-3">
  <div class="col-12 d-flex flex-row justify-content-end">
    <div>
      <button type="button" class="btn btn-primary me-2" style="width: 150px" @click="onPrint">Cetak</div>
      <button type="button" class="btn btn-secondary" style="width: 150px" @click="onBack">Kembali</div>
    </div>
  </div>
</div>