<?php

$this->params['container_transparent'] = true;

include Yii::getAlias('@dummyDataPath').'/dashboard.php'

?>
<div class="row mt-3 dashboard-glance">
	<?php foreach($realizationByCategory as $item) { ?>
	<div class="col-12 col-lg-6 col-xl-4">
		<div class="card shadow item">
			<div class="<?= $item->bgColor ?> icon shadow"><i class="<?= $item->icon ?>"></i></div>
			<div class="label"><?= $item->tax_name ?></div>
			<div class="field-name mt-4 text-grey-600">Realisasi</div>
			<div class="value text-blue-600"><?= number_format($item->realization_value, 2, ',', '.') ?></strong></div>
			<div class="field-name mt-2 text-grey-600">Target</div>
			<div class="value text-green-600"><?= number_format($item->target_value, 2, ',', '.') ?></div>
			<div class="percentage">
				<?php $percentage = $item->realization_value / $item->target_value * 100 ?>
				<?= number_format($percentage, 2, ',', '.') ?>%
				<div class="progress">
					<div class="progress-bar bg-blue-300" role="progressbar" aria-label="Basic example" style="width: <?= intval($percentage) ?>%" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<style>
.dashboard-glance .item {
	position: relative;
	height:170px;
	margin-bottom:25px;
	padding:15px;
	background-color:#fff;
}

.dashboard-glance .icon {
	position: absolute;
	right:15px;
	top:-5px;
	width:50px;
	height:50px;
	padding-top:6px;
	text-align:center;
	font-size:20pt;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
}

.dashboard-glance .label {
	/* position: absolute;
	right:15px;
	top:10px;
	padding-left:100px; */
	/* text-align:right; */
	font-weight:600;
	font-size:14pt;
	line-height:16pt;
}

.dashboard-glance .field-name {
	/* position: absolute;
	right:15px;
	top:10px;
	padding-left:100px; */
	text-align:right;
	font-size:9pt;
	line-height:16pt;
}

.dashboard-glance .value {
	/* position: absolute; */
	/* right:15px; */
	/* bottom:4px; */
	text-align:right;
	font-size:12pt;
}

.dashboard-glance .percentage {
	position: absolute; */
	left:15px;
	top:50px;
	width:180px;
	text-align:center;
	font-size:30pt;
}

</style>
