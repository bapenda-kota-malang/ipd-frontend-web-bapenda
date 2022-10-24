<?php 
$noRtRw = true;
$title = "Parameter Utama";
include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock.php');
?>

<div class="card">
	<div class="card-header h6 mb-0">
		Perubahan Data
	</div>
	<div class="p-3">
		<div class="row g-1">
			<div class="col-lg-6 mb-2 mb-lg-0">
				<div class="bg-blue p-2 text-center">Nama Jalan Sementara</div>
				<?php for($i=0;$i<10;$i++) { ?>
				<input type="text" class="form-control">
				<?php } ?>
			</div>
			<div class="col-lg-6">
				<div class="bg-blue p-2 text-center">Nama Jalan Standar</div>
				<?php for($i=0;$i<10;$i++) { ?>
				<input type="text" class="form-control">
				<?php } ?>
			</div>
		</div>
	</div>
</div>
