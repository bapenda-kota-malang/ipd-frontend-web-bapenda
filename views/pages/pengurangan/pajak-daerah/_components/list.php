<?php
use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/refs/penguranganStatusCode.js?v=20221108a');
$this->registerJsFile('@web/js/services/pengurangan/list-pajak-daerah.js?v=20221108a');
?>

<div v-if="data && data.length === 0" class="alert alert-danger">Data belum tersedia</div>
<table v-else class="table custom">
	<thead>
    <tr>
      <th style="width: 5%">No</th>
      <th>Nama Pemohon</th>
      <th>Tanggal Pengajuan</th>
      <th>Nomor Spt</th>
      <th>Omset</th>
      <th>Jumlah Pajak</th>
      <th>Status</th>
      <th>Petugas</th>
      <th style="width:120px"></th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(item, i) in data" :key="item.id">
      <td>{{ i + 1 }}.</td>
      <td class="text-capitalize">{{ item?.namaPemohon }}</td>
      <td>{{ item?.display?.tanggal }}</td>
      <td>{{ item?.spt?.NomorSpt }}</td>
      <td>{{ item?.display?.omset || 0 }}</td>
      <td>{{ item?.display?.jumlahPajak }}</td>
      <td>{{ item?.display?.status }}</td>
      <td class="text-capitalize">{{ item?.petugas?.name }}</td>
      <td>
        <a :href="`/pengurangan/pajak-daerah/${item.id}`" class="btn btn-outline-primary">
          Detail
        </a>
      </td>
    </tr>
  </tbody>
</table>
