<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

// $this->registerJsFile('/vendors/lodash/debounce.min.js', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://cdn.jsdelivr.net/npm/lodash@4.17.21/debounce.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/spop/list.js?v=20221108a');

?>
<table class="table">
    <thead>
        <tr>
            <th>NOP</th>
            <th>Nama WP</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
            <td>{{item.provinsi_kode+item.daerah_kode+item.kecamatan_kode+item.kelurahan_kode+item.blok_kode+item.noUrut+item.jenisOp}}</td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>