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

    </tbody>
</table>