<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<?php 
				$noRtRw = true;
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>
				<div class="d-none d-lg-block" style="height:107px;"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">
				Data
			</div>
			<div class="p-3">
				<div class="row g-1">
					<div class="col-3 col-md-3 col-lg-5">
						<div class="p-1 bg-grey-300 text-center">
							Kode Blok
						</div>
					</div>
					<div class="col-3 col-md-3 col-lg-5 ">
						<div class="p-1 bg-grey-300 text-center">
							Status Peta
						</div>
					</div>
				</div>
				<?php for($i=0; $i<7; $i++) { ?>
				<div class="row g-1">
					<div class="col-3 col-md-3 col-lg-5">
						<input class="form-control" />
					</div>
					<div class="col-3 col-md-3 col-lg-5">
						<div class="py-1 px-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									....
								</label>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>


