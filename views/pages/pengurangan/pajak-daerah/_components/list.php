<?php
use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/refs/penguranganStatusCode.js?v=20221108a');
$this->registerJsFile('@web/js/services/pengurangan/list-pajak-daerah.js?v=20221108a');
?>

<div v-if="data && data.length > 0" class="row mb-2">
  <div class="col-12 d-flex justify-content-end align-items-center">
    <button type="button" class="btn btn-success text-white" style="width: 86px; height: 46px">
      <i class="bi bi-printer-fill" style="font-size: 28px"></i>
    </button>
  </div>
</div>

<div v-if="data && data.length === 0" class="alert alert-danger">Data belum tersedia</div>
<table v-else class="table table-bordered custom">
  <thead class="thead" style="background: #B9B9B9">  
    <tr>
      <th style="width: 5%">No</th>
      <th>Tanggal Permohonan</th>
      <th>Nama Pemohon</th>
      <th>SPTPD/SKPD</th>
      <th>NPWPD</th>
      <th>Nama Usaha</th>
      <th>Status</th>
      <th>Petugas</th>
      <th class="text-center" style="width:120px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(item, i) in data" :key="item.id">
      <td>{{ i + 1 }}.</td>
      <td>{{ item?.display?.tanggal }}</td>
      <td class="text-capitalize">{{ item?.namaPemohon }}</td>
      <td>{{ item?.spt?.NomorSpt }}</td>
      <td>{{ item?.spt?.npwpd?.npwpd }}</td>
      <td>{{ item?.spt?.npwpd?.objekPajak?.nama }}</td>
      <td>{{ item?.display?.status }}</td>
      <td class="text-capitalize">{{ item?.petugas?.name }}</td>
      <td class="text-center">
        <a :href="`/pengurangan/pajak-daerah/${item.id}`" class="btn btn-outline-primary">
          Detail
        </a>
      </td>
    </tr>
  </tbody>
</table>
