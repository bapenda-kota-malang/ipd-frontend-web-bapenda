<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/components/dbkb-fasum-item/dbkb-fasum-item.js?v=20230201a');
$this->registerJsFile('@web/js/services/dbkb/fasum-list.js?v=20230201a');

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
					<div class="col-md-3 col-lg-4 mb-2 ps-lg-3">
						<div class="input-group">
							<input v-model="tahun" class="form-control" />
							<button @click="getData" class="btn bg-blue" type="button" id="button-addon2">Cari</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
		<div v-if="dataSetList['01']" class="mb-3">
			<div class="mb-1 fw-600">AC SPLIT</div>
			<dbkb-fasum-item :data="dataSetList['01']" :value="dataSetNilai['01']" :url="nonDepUrl" />
		</div>
		<div v-if="dataSetList['02']" class="mb-3">
			<div class="mb-1 fw-600">AC WINDOWS</div>
			<dbkb-fasum-item :data="dataSetList['02']" :value="dataSetNilai['02']" :url="nonDepUrl" />
		</div>
		<div>
			<div class="mb-1 fw-600">AC CENTRAL</div>
			<div v-if="dataSetList['03']" class="mb-3">
				<div class="mb">{{dataSetList['03'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['03']" :value="dataSetNilai['03']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['04']" class="mb-3">
				<div class="mb">{{dataSetList['04'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['04']" :value="dataSetNilai['04']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['05']" class="mb-3">
				<div class="mb">{{dataSetList['05'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['05']" :value="dataSetNilai['05']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['06']" class="mb-3">
				<div class="mb">{{dataSetList['06'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['06']" :value="dataSetNilai['06']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['07']" class="mb-3">
				<div class="mb">{{dataSetList['07'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['07']" :value="dataSetNilai['07']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['08']" class="mb-3">
				<div class="mb">{{dataSetList['08'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['08']" :value="dataSetNilai['08']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['09']" class="mb-3">
				<div class="mb">{{dataSetList['09'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['09']" :value="dataSetNilai['09']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['10']" class="mb-3">
				<div class="mb">{{dataSetList['10'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['10']" :value="dataSetNilai['10']" :url="bintangUrl" />
			</div>
			<div v-if="dataSetList['11']" class="mb-3">
				<div class="mb">{{dataSetList['11'].nama}}</div>
				<dbkb-fasum-item :data="dataSetList['11']" :value="dataSetNilai['11']" :url="nonDepUrl" />
			</div>
		</div>
	</div>
	<!-- <div class="tab-pane fade" id="acl-tab-pane" role="tabpanel" aria-labelledby="acl-tab" tabindex="0">
	
	</div> -->
	<div class="tab-pane fade" id="kolam-tab-pane" role="tabpanel" aria-labelledby="kolam-tab" tabindex="0">
		<div v-if="dataSetList['12']" class="mb-3">
			<div class="mb">{{dataSetList['12'].nama}}</div>
			<dbkb-fasum-item :data="dataSetList['12']" :value="dataSetNilai['12']" :url="minMaxUrl" />
		</div>
		<div v-if="dataSetList['13']" class="mb-3">
			<div class="mb">{{dataSetList['13'].nama}}</div>
			<dbkb-fasum-item :data="dataSetList['13']" :value="dataSetNilai['13']" :url="minMaxUrl" />
		</div>
	</div>
	<div class="tab-pane fade" id="perkerasan-tab-pane" role="tabpanel" aria-labelledby="perkerasan-tab" tabindex="0">
		<div v-if="dataSetList['14']">
			<dbkb-fasum-item :data="dataSetList['14']" :value="dataSetNilai['14']" :url="nonDepUrl" :no-mb="true" />
		</div>
		<div v-if="dataSetList['15']">
			<dbkb-fasum-item :data="dataSetList['15']" :value="dataSetNilai['15']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['16']">
			<dbkb-fasum-item :data="dataSetList['16']" :value="dataSetNilai['16']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['17']">
			<dbkb-fasum-item :data="dataSetList['17']" :value="dataSetNilai['17']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="tenis-tab-pane" role="tabpanel" aria-labelledby="tenis-tab" tabindex="0">
		<div v-if="dataSetList['18']">
			<dbkb-fasum-item :data="dataSetList['18']" :value="dataSetNilai['18']" :url="nonDepUrl" :no-mb="true" />
		</div>
		<div v-if="dataSetList['19']">
			<dbkb-fasum-item :data="dataSetList['19']" :value="dataSetNilai['19']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['20']">
			<dbkb-fasum-item :data="dataSetList['20']" :value="dataSetNilai['20']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['21']">
			<dbkb-fasum-item :data="dataSetList['21']" :value="dataSetNilai['21']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['22']">
			<dbkb-fasum-item :data="dataSetList['22']" :value="dataSetNilai['22']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['23']">
			<dbkb-fasum-item :data="dataSetList['23']" :value="dataSetNilai['23']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['24']">
			<dbkb-fasum-item :data="dataSetList['24']" :value="dataSetNilai['24']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['25']">
			<dbkb-fasum-item :data="dataSetList['25']" :value="dataSetNilai['25']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['26']">
			<dbkb-fasum-item :data="dataSetList['26']" :value="dataSetNilai['26']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['27']">
			<dbkb-fasum-item :data="dataSetList['27']" :value="dataSetNilai['27']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['28']">
			<dbkb-fasum-item :data="dataSetList['28']" :value="dataSetNilai['28']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
		<div v-if="dataSetList['29']">
			<dbkb-fasum-item :data="dataSetList['29']" :value="dataSetNilai['29']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="lift-tab-pane" role="tabpanel" aria-labelledby="lift-tab" tabindex="0">
		<div v-if="dataSetList['30']" class="mb-3">
			<div class="mb">{{dataSetList['30'].nama}}</div>
			<dbkb-fasum-item :data="dataSetList['30']" :value="dataSetNilai['30']" :url="minMaxUrl" />
		</div>
		<div v-if="dataSetList['31']" class="mb-3">
			<div class="mb">{{dataSetList['31'].nama}}</div>
			<dbkb-fasum-item :data="dataSetList['31']" :value="dataSetNilai['31']" :url="minMaxUrl" />
		</div>
		<div v-if="dataSetList['32']" class="mb-3">
			<div class="mb">{{dataSetList['32'].nama}}</div>
			<dbkb-fasum-item :data="dataSetList['32']" :value="dataSetNilai['32']" :url="minMaxUrl" />
		</div>
	</div>
	<div class="tab-pane fade" id="escalator-tab-pane" role="tabpanel" aria-labelledby="escalator-tab" tabindex="0">
		<div v-if="dataSetList['33']">
			<dbkb-fasum-item :data="dataSetList['33']" :value="dataSetNilai['33']" :url="nonDepUrl" :no-mb="true" />
		</div>
		<div v-if="dataSetList['34']">
			<dbkb-fasum-item :data="dataSetList['34']" :value="dataSetNilai['34']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="pagar-tab-pane" role="tabpanel" aria-labelledby="pagar-tab" tabindex="0">
		<div v-if="dataSetList['35']">
			<dbkb-fasum-item :data="dataSetList['35']" :value="dataSetNilai['35']" :url="nonDepUrl" :no-mb="true" />
		</div>
		<div v-if="dataSetList['36']">
			<dbkb-fasum-item :data="dataSetList['36']" :value="dataSetNilai['36']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="prot-tab-pane" role="tabpanel" aria-labelledby="prot-tab" tabindex="0">
		<div v-if="dataSetList['37']">
			<dbkb-fasum-item :data="dataSetList['37']" :value="dataSetNilai['37']" :url="nonDepUrl" :no-mb="true" />
		</div>
		<div v-if="dataSetList['38']">
			<dbkb-fasum-item :data="dataSetList['38']" :value="dataSetNilai['38']" :url="nonDepUrl" :no-mb="true" :hide-header="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="genset-tab-pane" role="tabpanel" aria-labelledby="genset-tab" tabindex="0">
		<div v-if="dataSetList['39']">
			<dbkb-fasum-item :data="dataSetList['39']" :value="dataSetNilai['39']" :url="minMaxUrl" :no-mb="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="pabx-tab-pane" role="tabpanel" aria-labelledby="pabx-tab" tabindex="0">
		<div v-if="dataSetList['40']">
			<dbkb-fasum-item :data="dataSetList['40']" :value="dataSetNilai['40']" :url="nonDepUrl" :no-mb="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="sumur-tab-pane" role="tabpanel" aria-labelledby="sumur-tab" tabindex="0">
		<div v-if="dataSetList['41']">
			<dbkb-fasum-item :data="dataSetList['41']" :value="dataSetNilai['41']" :url="nonDepUrl" :no-mb="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="boiler-tab-pane" role="tabpanel" aria-labelledby="boiler-tab" tabindex="0">
		<div v-if="dataSetList['42']">
			<dbkb-fasum-item :data="dataSetList['42']" :value="dataSetNilai['42']" :url="nonDepUrl" :no-mb="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="listrik-tab-pane" role="tabpanel" aria-labelledby="listrik-tab" tabindex="0">
		<div v-if="dataSetList['42']">
			<dbkb-fasum-item :data="dataSetList['43']" :value="dataSetNilai['43']" :url="bintangUrl" :no-mb="true" />
		</div>
	</div>
	<div class="tab-pane fade" id="boler-ap-tab-pane" role="tabpanel" aria-labelledby="boiler-ap-tab" tabindex="0">
		<div v-if="dataSetList['42']">
			<dbkb-fasum-item :data="dataSetList['44']" :value="dataSetNilai['44']" :url="bintangUrl" :no-mb="true" />
		</div>
	</div>
</div>