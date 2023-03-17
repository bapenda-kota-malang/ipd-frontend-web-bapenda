<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/spop/list-info.js?v=20221108a');
?>

<div class="card mb-4">
  <div class="card-body">
      <div class="row">
        <div v-if="data.errorMessage" class="col-12">
          <div class="alert alert-danger text-center text-capitalize" role="alert">{{ data.errorMessage }}</div>
        </div>
        <div class="col-6">
          <div class="row align-items-center">
            <div class="col-2">NOP :</div>
            <div class="col-10"><?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?></div>
          </div>
        </div>
        <div class="col-6">
          <div class="row justify-content-end align-items-center">
            <div class="col-2">Tahun Pajak :</div>
            <div class="col-3"><datepicker v-model="data.year" type="year" format="YYYY" /></div>
          </div>
        </div>
        <div class="col-12">
          <div class="row justify-content-start align-items-center g-2 mt-2">
            <div class="col-2">
              <button type="button" class="btn btn-outline-secondary w-100" @click="onSearching('info', $event)">Cari</button>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="card mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-6">
        <div class="row align-items-start g-1">
          <div class="col-3">Letak Objek Pajak :</div>
          <div class="col-9" style="margin-left: -4px">
            <textarea v-model="data.objekPajak" rows="3" class="form-control" disabled></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="row justify-content-end align-items-center mt-2 g-1">
              <div class="col-3" style="margin-right: 9px">RT/RW :</div>
              <div class="col-3"><input v-model="data.rt" maxlength="5" class="form-control" disabled /></div>
              <div class="col-3"><input v-model="data.rw" maxlength="5" class="form-control" disabled /></div>
            </div>
          </div>
          <div class="col-6">
            <div class="row justify-content-end align-items-center mt-2" style="margin-left: -9px">
              <div class="col-4">Persil :</div>
              <div class="col-5"><input v-model="data.persil" class="form-control" disabled /></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="row align-items-start g-1 mb-2">
          <div class="col-3">Nama WP :</div>
          <div class="col-9">
            <input v-model="data.nama" class="form-control" disabled />
          </div>
        </div>
        <div class="row align-items-start g-1">
          <div class="col-3">Alamat WP :</div>
          <div class="col-9">
            <textarea v-model="data.alamat" rows="3" class="form-control" disabled></textarea>
          </div>
        </div>
      </div>
      <div class="col-12"><hr></div>
      <div class="col-12">
        <div class="row mb-3">
          <div class="col-2"></div>
          <div class="col-3 text-center">Luas (m2)</div>
          <div class="col-1 text-center">Kelas</div>
          <div class="col-3 text-center">NOJP Per M2</div>
          <div class="col-3 text-center">Total NOJP</div>
        </div>
        <div class="row mb-2">
          <div class="col-2">Bumi</div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-1"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-2">Bangunan</div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-1"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-2">Bumi *</div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-1"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-2">Bangunan *</div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-1"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
      </div>
      <div class="col-12"><hr></div>
      <div class="col-12">
        <div class="row mb-2">
          <div class="col-9">Jumlah NJOP Bumi</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Jumlah NJOP Bangunan</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">NJOP Sebagai Dasar Pengenaan PBB</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">BTKP / NJOPTKP</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Nilai Jual Kena Pajak</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Pajak Bumi Bangunan Terutang</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Faktor Pengurang</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Pajak Bumi Bangunan Yang Harus Dibayar</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Denda Yang Telah Dibayar</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Pajak Bumi Bangunan Yang Telah Dibayar</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
        <div class="row mb-2">
          <div class="col-9">Selisih</div>
          <div class="col-3"><input class="form-control" disabled /></div>
        </div>
      </div>
      <div class="col-12"><hr></div>
      <div class="col-12">
        <div class="row mb-2">
          <div class="col-3 mt-1">Tanggal Jatuh Tempo / Tempat Pembayaran</div>
          <div class="col-3"><input class="form-control" disabled /></div>
          <div class="col-6"><input class="form-control" disabled /></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-4">
    <div class="row justify-content-center align-items-center">
      <div class="col-5">Tanggal Terbit</div>
      <div class="col-6"><input class="form-control" disabled /></div>
    </div>
  </div>
  <div class="col-4">
    <div class="row justify-content-center align-items-center">
      <div class="col-5">Tanggal Cetak</div>
      <div class="col-6"><input class="form-control" disabled /></div>
    </div>
  </div>
  <div class="col-4">
    <div class="row justify-content-center align-items-center">
      <div class="col-5">NIP Cetak</div>
      <div class="col-6"><input class="form-control" disabled /></div>
    </div>
  </div>
</div>

<div class="mb-5"></div>