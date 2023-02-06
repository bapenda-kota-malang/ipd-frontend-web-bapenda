<?php

use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);
if ($type == 'oa') {
    $this->registerJsFile('@web/js/services/massal-skpdkb/hiburan/oa/list.js?v=20221117a');
} else if ($type == 'sa') {
    $this->registerJsFile('@web/js/services/massal-skpdkb/hiburan/sa/list.js?v=20221117a');
}
?>
<!-- Nav tabs -->
<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link <?php $type == "oa" ? " active" : "" ?>" href="/penetapan/massal-skpdkb/pajak-hiburan?type=oa">OA</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" <?php $type == "sa" ? " active" : "" ?> href="/penetapan/massal-skpdkb/pajak-hiburan?type=sa">SA</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="row">
    <table class="table custom">
        <thead>
            <tr>
                <th style="width:50px"><input class="form-check-input" type="checkbox" @click="doCheckAll"></th>
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
            <tr v-for="(item, index) in data">
                <td>
                    <input type="checkbox" @click="doCheckRow(index)" :checked="item.checked">
                </td>
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
                            <?php if ($type == "oa") { ?>
                                <li>
                                    <a class="dropdown-item" :href="'/penetapan/massal-skpdkb/pajak-hiburan/' + item.id + '/detail?type=oa'">Detail</a>
                                </li>
                            <?php } else if ($type == "sa") { ?>
                                <li>
                                    <a class="dropdown-item" :href="'/penetapan/massal-skpdkb/pajak-hiburan/' + item.id + '/detail?type=sa'">Detail</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
        </thead>
    </table>
</div>