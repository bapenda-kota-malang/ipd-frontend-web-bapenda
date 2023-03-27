<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/_common/filter-ppat.js?v=20221108a');
$this->registerJsFile('@web/js/services/ppat/list-laporan.js?v=20221108a');

$withPPAT = true;
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-filter-ppat.php'); ?>
<hr>
<div class="table-responsive-xl p-2">
  <table class="table table-bordered custom">
    <thead class="thead">
      <tr style="background-color: #B9B9B9">
        <th scope="col" class="text-center" style="width: 5%">No</th>
        <th scope="col" class="text-center">Nama PPAT</th>
        <th scope="col" class="text-center">Tanggal Laporan</th>
        <th scope="col" class="text-center">Jumlah Transaksi</th>
        <th scope="col" class="text-center">NOMINAL TRANSAKSI (Rp.)</th>
        <th scope="col" class="text-center">NOMINAL BPHTB (Rp.)</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    <tbody>
      <tr v-for="(item, i) in data.lists" :key="i">
        <td>{{ i+1 }}</td>
        <td>{{ item.nama }}</td>
        <td>{{ item.tanggalText }}</td>
        <td>{{ item.jumlahTransaksiText }}</td>
        <td>{{ item.nominalTransaksiText }}</td>
        <td>{{ item.nominalBphtbText }}</td>
        <td class="text-center">
          <a :href="`/ppat/transaksi-ppat/${item.id}`">
           <i class="bi bi-eye-fill" style="font-size: 24px"></i>
          </a>
        </td>
      </tr>
    </tbody>
    </thead>
  </table>
</div>