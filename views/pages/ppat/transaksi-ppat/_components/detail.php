<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);
$this->registerCssFile('@web/css/table.css');

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/@develoka/angka-terbilang-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/ppat/detail-transaksi.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-trans-ppat.php'); ?>
<hr>
<div class="table-responsive-xl p-2">
  <table class="table table-bordered table-horizontal-dynamic" cellspacing="0">
    <thead class="thead">
      <tr style="background-color: #B9B9B9">
				<th scope="col" class="text-center" style="width: 5%">No</th>
        <th scope="col" class="text-center">No SSPD</th>
        <th scope="col" class="text-center">NOP</th>
        <th scope="col" class="text-center">Letak Tanah</th>
        <th scope="col" class="text-center">Nama WP</th>
        <th scope="col" class="text-center">Alamat WP</th>
        <th scope="col" class="text-center">Luas Tanah</th>
        <th scope="col" class="text-center">Luas Bangunan</th>
        <th scope="col" class="text-center">NOJP</th>
        <th scope="col" class="text-center">Harga Transaksi</th>
        <th scope="col" class="text-center">Nominal BHPTB</th>
        <th scope="col" class="text-center">Jenis Transaksi</th>
        <th scope="col" class="text-center">Jenis Hak</th>
        <th scope="col" class="text-center">Tanggal Pengajuan</th>
        <th scope="col" class="text-center">Status SSPD</th>
        <th scope="col" class="text-center">Tanggal Jatuh Tempo</th>
      </tr>
    <tbody>
      <tr v-for="(item, i) in data.lists" :key="i">
        <td>{{ i+1 }}</td>
        <td>{{ item.noDokumen }}</td>
        <td>{{ item.nop }}</td>
        <td>{{ item.lokasiOp }}</td>
				<td>{{ item.namaWp }}</td>
        <td>{{ item.alamat }}</td>
        <td>{{ item.opLuasTanah }}</td>
        <td>{{ item.opLuasBangunan }}</td>
        <td>{{ item.nominalNjop }}</td>
        <td>{{ item.harga }}</td>
        <td>{{ item.nominalBhptb }}</td>
        <td>{{ item.jenisTransaksi }}</td>
        <td>{{ item.jenisPerolehan_id }}</td>
        <td>{{ item.tanggalPengajuan }}</td>
        <td>{{ item.statusSspd }}</td>
        <td>{{ item.tanggalJatuhTempo }}</td>
      </tr>
    </tbody>
    </thead>
  </table>
</div>