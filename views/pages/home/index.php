<?php

use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/refs/jenis-pajak.js?v=20221108a');
$this->registerJsFile('@web/js/services/dashboard/dashboard.js?v=20221108a');

$this->params['container_transparent'] = true;

?>
<div class="row mt-3 dashboard-glance">
	<div v-for="item in jenisPajakList" class="col-12 col-lg-6 col-xl-4">
		<div class="card shadow item">
			<div :class="item.bgColor + ' icon shadow'"><i :class="item.icon"></i></div>
			<div class="label">{{item.tax_name}}</div>
			<div class="field-name mt-4 text-grey-600">Realisasi</div>
			<div class="value text-blue-600">{{dataProcessed[item.tax_code].realisasi}}</strong></div>
			<div class="field-name mt-2 text-grey-600">Target</div>
			<div class="value text-green-600">{{dataProcessed[item.tax_code].target}}</div>
			<div class="percentage">
				{{dataProcessed[item.tax_code].percentage}}%
				<div class="progress">
					<div class="progress-bar bg-blue-300" role="progressbar" aria-label="Basic example" :style="{ width: dataProcessed[item.tax_code].percentage + '%' }" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
</div>
