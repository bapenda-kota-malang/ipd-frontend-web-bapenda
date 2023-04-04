<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerCssFile('@web/css/table.css');
$this->registerJsFile('@web/js/services/_common/filter-ppat.js?v=20221108a');
$this->registerJsFile('@web/js/services/ppat/detail-laporan.js?v=20221108a');
?>

<div class="row align-items-center g-1 my-2">
  <div class="col-2">
    <div>Bulan</div>
    <div>
      <vueselect v-model="data.bulan" :options="data.months" label="text" code="id" @input="getDetailPPAT"/>
    </div>
  </div>
  <div class="col-2">
    <div>Tahun</div>
    <div>
      <datepicker v-model="data.tahun" type="year" format="YYYY"  @change="getDetailPPAT()"/>
    </div>
  </div>
  <div class="col-2"></div>
  <div class="col-6 d-flex justify-content-end align-items-center">
    <button type="button" class="btn btn-success text-white" style="width: 86px; height: 46px">
      <i class="bi bi-printer-fill" style="font-size: 28px"></i>
    </button>
  </div>
</div>

<hr>
<div class="table-responsive-xl p-2">
  <table class="table table-bordered table-horizontal-dynamic" cellspacing="0">
    <thead class="thead">
      <tr style="background-color: #B9B9B9">
        <th scope="col" colspan="2" class="text-center">Akta</th>
        <th scope="col" colspan="6" class="text-center">Luas</th>
        <th scope="col" colspan="2" class="text-center">Nama, Alamat dan NPWP</th>
        <th scope="col" colspan="2" class="text-center">SSP</th>
        <th scope="col" colspan="2" class="text-center"></th>
        <th scope="col" colspan="3" class="text-center">SSPD</th>
      </tr>
      <tr style="background-color: #B9B9B9">
        <th scope="col" class="text-center" style="width: 5%">No</th>
        <th scope="col" class="text-center">Tanggal Akta</th>
        <th scope="col" class="text-center">Letak Tanah</th>
        <th scope="col" class="text-center">Tanah</th>
        <th scope="col" class="text-center">Bangunan</th>
        <th scope="col" class="text-center">NOP</th>
        <th scope="col" class="text-center">NJOP (Rp.)</th>
        <th scope="col" class="text-center">Harga Transaksi</th>
        <th scope="col" class="text-center">Pihak Yang Mengalihkan</th>
        <th scope="col" class="text-center">Pihak Yang Menerima</th>
        <th scope="col" class="text-center">Tgl</th>
        <th scope="col" class="text-center">Nominal (Rp.)</th>
        <th scope="col" class="text-center">Bentuk Pembuatan atau Hukum</th>
        <th scope="col" class="text-center">Jenis dan Hak</th>
        <th scope="col" class="text-center">No</th>
        <th scope="col" class="text-center">Tgl</th>
        <th scope="col" class="text-center">Nominal (Rp.)</th>
      </tr>
    <tbody>
      <tr v-for="(item, i) in data.lists" :key="i">
        <td>{{ i+1 }}</td>
        <td>{{ item.tanggalAkta }}</td>
        <td>{{ item.letakTanah }}</td>
        <td>{{ item.tanah }}</td>
        <td>{{ item.bangunan }}</td>
        <td>{{ item.nop }}</td>
        <td>{{ item.nominalNjop }}</td>
        <td>{{ item.harga }}</td>
        <td>{{ item.pihak1 }}</td>
        <td>{{ item.pihak2 }}</td>
        <td>{{ item.tanggalSsp }}</td>
        <td>{{ item.nominalSsp }}</td>
        <td>{{ item.bentukHukum }}</td>
        <td>{{ item.jenisHak }}</td>
        <td>{{ item.noSSPD }}</td>
        <td>{{ item.tanggalSspd }}</td>
        <td>{{ item.nominalSspd }}</td>
      </tr>
    </tbody>
    </thead>
  </table>
</div>