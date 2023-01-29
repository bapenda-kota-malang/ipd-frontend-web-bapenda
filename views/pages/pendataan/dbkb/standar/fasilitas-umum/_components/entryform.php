<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/components/dbkb-fasum-item/dbkb-fasum-item.js?v=20221108a');
$this->registerJsFile('@web/js/services/dbkb/fasum-list.js?v=20221108a');

?>
<div class="card mb-3">
	<div class="p-3">
		<div class="row">
			<!-- <div class="col-lg-6">
				<?php 
				$noKec = true;
				$noKel = true;
				$noRtRw = true;
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>

			</div> -->
			<div class="col-lg-6">
				<div class="row g-0 g-md-1">
					<div class="col-md-2 col-lg-3 col-xl-2 pt-1">Tahun</div>
					<div class="col-md-3 col-lg-4 mb-2 ps-lg-3"><input :v-model="tahun" class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="mb-2">Daftar Harga Fasilitas</div>
<div style="overflow:auto">
	<ul class="nav nav-tabs  flex-nowrap" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap active" id="ac-tab" data-bs-toggle="tab" data-bs-target="#ac-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">AC</button>
		</li>
		<!-- <li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="acl-tab" data-bs-toggle="tab" data-bs-target="#acl-tab-pane" type="button" role="tab" aria-controls="acl-tab-pane" aria-selected="false">AC (Lanjutan)</button>
		</li> -->
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="kolam-tab" data-bs-toggle="tab" data-bs-target="#kolam-tab-pane" type="button" role="tab" aria-controls="kolam-tab-pane" aria-selected="false">Klm Renang</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="perkerasan-tab" data-bs-toggle="tab" data-bs-target="#perkerasan-tab-pane" type="button" role="tab" aria-controls="perkerasan-tab-pane" aria-selected="false">Perkerasan</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="tenis-tab" data-bs-toggle="tab" data-bs-target="#tenis-tab-pane" type="button" role="tab" aria-controls="tenis-tab-pane" aria-selected="false">Lap. Tenis</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="lift-tab" data-bs-toggle="tab" data-bs-target="#lift-tab-pane" type="button" role="tab" aria-controls="lift-tab-pane" aria-selected="false">Lift</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="escalator-tab" data-bs-toggle="tab" data-bs-target="#escalator-tab-pane" type="button" role="tab" aria-controls="escalator-tab-pane" aria-selected="false">Tgg. Berjalan</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="pagar-tab" data-bs-toggle="tab" data-bs-target="#pagar-tab-pane" type="button" role="tab" aria-controls="pagar-tab-pane" aria-selected="false">Pagar</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="prot-tab" data-bs-toggle="tab" data-bs-target="#prot-tab-pane" type="button" role="tab" aria-controls="prot-tab-pane" aria-selected="false">Prot. Api</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="genset-tab" data-bs-toggle="tab" data-bs-target="#genset-tab-pane" type="button" role="tab" aria-controls="genset-tab-pane" aria-selected="false">Genset</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="pabx-tab" data-bs-toggle="tab" data-bs-target="#pabx-tab-pane" type="button" role="tab" aria-controls="pabx-tab-pane" aria-selected="false">PABX</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="sumur-tab" data-bs-toggle="tab" data-bs-target="#sumur-tab-pane" type="button" role="tab" aria-controls="sumur-tab-pane" aria-selected="false">Sumur Ar.</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="boiler-tab" data-bs-toggle="tab" data-bs-target="#boiler-tab-pane" type="button" role="tab" aria-controls="boiler-tab-pane" aria-selected="false">Boiler</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="listrik-tab" data-bs-toggle="tab" data-bs-target="#listrik-tab-pane" type="button" role="tab" aria-controls="listrik-tab-pane" aria-selected="false">Listrik</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link text-nowrap" id="boiler-ap-tab" data-bs-toggle="tab" data-bs-target="#boiler-ap-pane" type="button" role="tab" aria-controls="boiler-ap-pane" aria-selected="false">Boiler Apartemen</button>
		</li>
	</ul>
</div>

<div class="tab-content p-3 border" id="myTabContent" style="border-top:none !important">
	<div class="tab-pane fade show active" id="ac-tab-pane" role="tabpanel" aria-labelledby="ac-tab" tabindex="0">
		<div v-if="dbkbFasumList['01']" class="mb-1">
			<div class="mb-1">{{dbkbFasumList['01'].nama}}</div>
			<dbkb-fasum-item />
		</div>
		<div v-if="dbkbFasumList['02']" class="mb-1">
			<div class="mb-1">{{dbkbFasumList['02'].nama}}</div>
			<dbkb-fasum-item />
		</div>

		<div>
			<div class="mb-1">C. AC Central</div>
			<div v-if="dbkbFasumList['03']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['03'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['04']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['04'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['05']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['05'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['06']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['06'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['07']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['07'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['08']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['08'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['09']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['09'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['10']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['10'].nama}}</div>
				<dbkb-fasum-item />
			</div>
			<div v-if="dbkbFasumList['11']" class="mb-1">
				<div class="mb-1">{{dbkbFasumList['11'].nama}}</div>
				<dbkb-fasum-item />
			</div>
		</div>
	</div>
	<!-- <div class="tab-pane fade" id="acl-tab-pane" role="tabpanel" aria-labelledby="acl-tab" tabindex="0">
	
	</div> -->
	<div class="tab-pane fade" id="kolam-tab-pane" role="tabpanel" aria-labelledby="kolam-tab" tabindex="0">
		<div v-if="dbkbFasumList['12']" class="mb-1">
			<div class="mb-1">{{dbkbFasumList['12'].nama}}</div>
			<dbkb-fasum-item />
		</div>
		<div v-if="dbkbFasumList['13']" class="mb-1">
			<div class="mb-1">{{dbkbFasumList['13'].nama}}</div>
			<dbkb-fasum-item />
		</div>
	</div>
	<div class="tab-pane fade" id="perkerasan-tab-pane" role="tabpanel" aria-labelledby="perkerasan-tab" tabindex="0">
		<div v-if="dbkbFasumList['14']">
			<dbkb-fasum-item :no-mb="true" />
		</div>
		<div v-if="dbkbFasumList['15']">
			<dbkb-fasum-item :hide-header="true" :no-mb="true" />
		</div>
		<div v-if="dbkbFasumList['16']">
			<dbkb-fasum-item :hide-header="true" :no-mb="true" />
		</div>
		<div v-if="dbkbFasumList['17']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="tenis-tab-pane" role="tabpanel" aria-labelledby="tenis-tab" tabindex="0">
		<div v-if="dbkbFasumList['18']">
			<dbkb-fasum-item :no-mb="true" />
		</div>
		<div v-if="dbkbFasumList['19']">
			<dbkb-fasum-item :hide-header="true" :no-mb="true" />
		</div>
		<div v-if="dbkbFasumList['20']">
			<dbkb-fasum-item :hide-header="true" :no-mb="true" />
		</div>
		<div v-if="dbkbFasumList['21']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['22']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['23']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['24']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['25']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['26']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['27']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['28']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['29']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="lift-tab-pane" role="tabpanel" aria-labelledby="lift-tab" tabindex="0">
		<div v-if="dbkbFasumList['30']" class="mb-1">
			<div class="mb-1">{{dbkbFasumList['30'].nama}}</div>
			<dbkb-fasum-item />
		</div>
		<div v-if="dbkbFasumList['31']" class="mb-1">
			<div class="mb-1">{{dbkbFasumList['31'].nama}}</div>
			<dbkb-fasum-item />
		</div>
		<div v-if="dbkbFasumList['32']" class="mb-1">
			<div class="mb-1">{{dbkbFasumList['32'].nama}}</div>
			<dbkb-fasum-item />
		</div>
	</div>
	<div class="tab-pane fade" id="escalator-tab-pane" role="tabpanel" aria-labelledby="escalator-tab" tabindex="0">
		<div v-if="dbkbFasumList['33']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['34']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="pagar-tab-pane" role="tabpanel" aria-labelledby="pagar-tab" tabindex="0">
		<div v-if="dbkbFasumList['35']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['36']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="prot-tab-pane" role="tabpanel" aria-labelledby="prot-tab" tabindex="0">
		<div v-if="dbkbFasumList['37']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
		<div v-if="dbkbFasumList['38']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="genset-tab-pane" role="tabpanel" aria-labelledby="genset-tab" tabindex="0">
		<div v-if="dbkbFasumList['39']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="pabx-tab-pane" role="tabpanel" aria-labelledby="pabx-tab" tabindex="0">
		<div v-if="dbkbFasumList['40']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="sumur-tab-pane" role="tabpanel" aria-labelledby="sumur-tab" tabindex="0">
		<div v-if="dbkbFasumList['41']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="boiler-tab-pane" role="tabpanel" aria-labelledby="boiler-tab" tabindex="0">
		<div v-if="dbkbFasumList['42']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="listrik-tab-pane" role="tabpanel" aria-labelledby="listrik-tab" tabindex="0">
		<div v-if="dbkbFasumList['42']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="boler-ap-tab-pane" role="tabpanel" aria-labelledby="listrik-tab" tabindex="0">
		<div v-if="dbkbFasumList['42']">
			<dbkb-fasum-item :hide-header="true" />
		</div>
	</div>
</div>