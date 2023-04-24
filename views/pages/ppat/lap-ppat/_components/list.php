<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/_common/filter-ppat.js?v=20221108a');
$this->registerJsFile('@web/js/services/ppat/list-laporan.js?v=20221108a');

$withPPAT = true;
?>


<div class="row align-items-center g-1 my-2">
  <div class="col-2">
    <div>Bulan</div>
    <div>
      <vueselect v-model="data.bulan" :options="data.months" label="text" code="id" @input="getListLapPPAT"/>
    </div>
  </div>
  <div class="col-2">
    <div>Tahun</div>
    <div>
      <datepicker v-model="data.tahun" type="year" format="YYYY"  @change="getListLapPPAT()"/>
    </div>
  </div>
  <?php if (isset($withPPAT) && $withPPAT): ?>
  <div class="col-2">
    <div>Pilih PPAT</div>
    <div>
        <div class="col-md-6 col-lg-6 col-xl-6">
          <select class="form-select" v-model="data.ppat"  @change="getListLapPPAT()">
            <option v-for="item in data.ppats" :value="item.id">{{item.nama}}</option>
          </select>
        </div>
    </div>
  </div>
  <?php else: ?>
  <div class="col-2"></div>
  <?php endif; ?>
  <div class="col-6 d-flex justify-content-end align-items-center">
    <button type="button" class="btn btn-success text-white" style="width: 86px; height: 46px">
      <i class="bi bi-printer-fill" style="font-size: 28px"></i>
    </button>
  </div>
</div>
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
        <th scope="col" class="text-center">Status</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    <tbody>
      <tr v-for="(item, i) in data.lists" :key="i">
        <td class="text-center">{{ i+1 }}</td>
        <td class="text-left">{{ item.nama }}</td>
        <td class="text-center">{{ item.tanggalText }}</td>
        <td class="text-center">{{ item.jumlahTransaksiText }}</td>
        <td class="float-right">{{ item.nominalTransaksiText }}</td>
        <td class="float-right">{{ item.nominalBphtbText }}</td>
        <td class="text-center">{{ item.statusText }}</td>
        <td class="text-center">
          <a :href="`/ppat/lap-ppat/${item.id}`">
           <i class="bi bi-eye-fill" style="font-size: 24px"></i>
          </a>
        </td>
      </tr>
      <tr>
        <td class="text-center"></td>
        <td class="text-center">Jumlah</td>
        <td class="text-center"> - </td>
        <td class="text-center">{{ this.total.jumlahTransaksiText }}</td>
        <td class="float-right">{{ this.total.nominalTransaksiText }}</td>
        <td class="float-right">{{ this.total.nominalBphtbText }}</td>
        <td class="text-center"> - </td>
        <td class="text-center"> - </td>
      </tr>
    </tbody>
    </thead>
  </table>
</div>