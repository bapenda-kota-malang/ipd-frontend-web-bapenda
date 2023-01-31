<?php

use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// $this->registerJsFile('@web/js/services/massal-skpdkb/air-tanah/list.js?v=20221117a');
?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="oa-tab" data-bs-toggle="tab" data-bs-target="#oa" type="button" role="tab" aria-controls="oa" aria-selected="true">OA</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="sa-tab" data-bs-toggle="tab" data-bs-target="#sa" type="button" role="tab" aria-controls="sa" aria-selected="false">SA</button>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="oa" role="tabpanel" aria-labelledby="oa-tab">
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
                <!-- <tr v-for="item in oa">
                    <td><input type="checkbox" /></td>
                    <td>{{item.NomorSpt}}</td>
                    <td>{{item.npwpd?.npwpd}}</td>
                    <td>{{item.objekPajak?.nama}}</td>
                    <td>{{item.rekening?.jenisUsaha}}</td>
                    <td>{{item.periodeAwal}}</td>
                    <td>{{item.periodeAkhir}}</td>
                    <td>{{item.tanggalSpt}}</td>
                    <td>{{item.jatuhTempo}}</td>
                </tr> -->
                <tr v-for="(item, index) in 5">
                    <td><input type="checkbox" /></td>
                    <td>A-123456</td>
                    <td>1111.111.111</td>
                    <td>abdul</td>
                    <td>air tanah</td>
                    <td>01/11/2022</td>
                    <td>31/11/2022</td>
                    <td>01/12/2022</td>
                    <td>31/12/2022</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= $currentUrl ?>/99df8d86-ae74-45ea-8977-67dd9a0dcf5e">Detail</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>

    <div class="tab-pane" id="sa" role="tabpanel" aria-labelledby="sa-tab">
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
                <!-- <tr v-for="item in sa">
                    <td><input type="checkbox" /></td>
                    <td>{{item.NomorSpt}}</td>
                    <td>{{item.npwpd?.npwpd}}</td>
                    <td>{{item.objekPajak?.nama}}</td>
                    <td>{{item.rekening?.jenisUsaha}}</td>
                    <td>{{item.periodeAwal}}</td>
                    <td>{{item.periodeAkhir}}</td>
                    <td>{{item.tanggalSpt}}</td>
                    <td>{{item.jatuhTempo}}</td>
                </tr> -->
                <tr v-for="item in 5">
                    <td><input type="checkbox" /></td>
                    <td>A-123456</td>
                    <td>1111.111.111</td>
                    <td>abdul</td>
                    <td>air tanah</td>
                    <td>01/11/2022</td>
                    <td>31/11/2022</td>
                    <td>01/12/2022</td>
                    <td>31/12/2022</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Detail</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>
</div>