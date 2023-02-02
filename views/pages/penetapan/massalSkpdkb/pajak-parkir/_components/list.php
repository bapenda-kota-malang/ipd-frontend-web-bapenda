<?php

use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);
if ($type == 'oa') {
    $this->registerJsFile('@web/js/services/massal-skpdkb/parkir/oa/list.js?v=20221117a');
} else if ($type == 'sa') {
    $this->registerJsFile('@web/js/services/massal-skpdkb/parkir/sa/list.js?v=20221117a');
}
?>
<!-- Nav tabs -->
<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link <?php $type == "oa" ? " active" : "" ?>" href="/penetapan/massal-skpdkb/pajak-parkir?type=oa">OA</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" <?php $type == "sa" ? " active" : "" ?> href="/penetapan/massal-skpdkb/pajak-parkir?type=sa">SA</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="row">
    <table class="table custom">
        <thead>
            <tr>
                <th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
                <th>No SPT</th>
                <th>NPWPD</th>
                <th>Nama WP</th>
                <th>Rekening</th>
                <th>Periode Awal</th>
                <th>Periode Akhir</th>
                <th>Tanggal SPT</th>
                <th>Batas Bayar</th>
                <th style="width:90px"></th>
            </tr>
        <tbody>
            <tr v-for="item in data">
                <td><input type="checkbox" /></td>
                <td>{{item.nomor_spt}}</td>
                <td>{{item.npwpd}}</td>
                <td>{{item.objek_pajak_nama}}</td>
                <td>{{item.jenis_usaha}}</td>
                <td>{{item.periode_awal}}</td>
                <td>{{item.periode_akhir}}</td>
                <td>{{item.tanggal_spt}}</td>
                <td>{{item.jatuh_tempo}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Aksi
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#" @click="detail(item.id)">Detail</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
        </thead>
    </table>
</div>