<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/dto/objek-pajak-pbb/create.js?v=20230227a');
$this->registerJsFile('@web/js/services/spop/entryform.js?v=202301206a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Formulir</div>
	<div class="card-body">
		<div class="row g-0">
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1">NOP</div>
					<div class="col mb-2">
						<?php
						$nopName = 'data.NopDetailCreateDto';
						$blokName = 'blok_kode';
						include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
						?>
						<span v-if="dataErr['(embedded:NopDetailCreateDto).provinsi_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateDto).provinsi_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateDto).daerah_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateDto).daerah_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateDto).kecamatan_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateDto).kecamatan_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateDto).kelurahan_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateDto).kelurahan_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateDto).noUrut']" class="text-danger">{{dataErr['(embedded:NopDetailCreateDto).noUrut']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateDto).blok_kode']" class="text-danger">{{dataErr['(embedded:NopDetailCreateDto).blok_kode']}}</span>
						<span v-else-if="dataErr['(embedded:NopDetailCreateDto).jenisOp']" class="text-danger">{{dataErr['(embedded:NopDetailCreateDto).jenisOp']}}</span>
					</div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1">NOP Bersama</div>
					<div class="col mb-2">
						<?php
						$nopName = 'nopBersamaFields';
						include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
						?>
					</div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1">NOP Asal</div>
					<div class="col mb-2">
						<?php
						$nopName = 'nopAsalFields';
						include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
						?>
					</div>
				</div>
			</div>
			<div class="col-lg">
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 pt-1">Nomor Formulir</div>
					<div class="col-md-6 col-xl-4 mb-2">
						<div class="row g-1">
							<div class="col-3">
								<input v-model="noFormulirFields[0]" class="form-control" />
							</div>
							<div class="col-3">
								<input v-model="noFormulirFields[1]" class="form-control" />
							</div>
							<div class="col-2">
								<input v-model="noFormulirFields[2]" class="form-control" />
							</div>
						</div>
						<span v-if="dataErr['jalan']" class="text-danger">{{dataErr['jalan']}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">Subjek Pajak</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md">
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Nomor KTP</div>
					<div class="xc-lg mb-2">
						<input v-model="data.wajibPajakPbb.nik" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Pekerjaan</div>
					<div class="xc-lg mb-2">
						<input v-model="data.wajibPajakPbb.pekerjaan" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">NPWP</div>
					<div class="xc-lg mb-2">
						<input v-model="data.wajibPajakPbb.npwp" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Jalan</div>
					<div class="xc-lg mb-2">
						<input v-model="data.wajibPajakPbb.jalan" class="form-control" />
						<span v-if="dataErr['jalan']" class="text-danger">{{dataErr['jalan']}}</span>
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">RT/RW</div>
					<div class="xc-lg-5 mb-2">
						<div class="d-flex">
							<input v-model="data.wajibPajakPbb.rt" class="form-control" />
							<input v-model="data.wajibPajakPbb.rw" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Dati II</div>
					<div class="xc-lg mb-2">
						<vueselect v-model="data.wajibPajakPbb.derah_kode"
							:options="daerahList"
							:reduce="item => item.kode"
							label="nama"
							code="kode"
						/>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Status WP</div>
					<div class="xc-lg mb-2">
						<input v-model="data.wajibPajakPbb.status" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Nama</div>
					<div class="xc-lg mb-2">
						<input v-model="data.wajibPajakPbb.nama" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Telp</div>
					<div class="xc-lg mb-2">
						<input v-model="data.wajibPajakPbb.telp" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Blok</div>
					<div class="xc-lg-5 mb-2">
						<input v-model="data.wajibPajakPbb.blok" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Kelurahan</div>
					<div class="xc-lg mb-2">
						<vueselect v-model="data.wajibPajakPbb.area_kode"
							:options="kelurahanList"
							:reduce="item => item.kode"
							label="nama"
							code="kode"
						/>
					</div>
				</div>
				<div class="row">
					<div class="xc-lg-5 xc-xl-4 pt-1">Kode Pos</div>
					<div class="xc-lg-6 mb-2">
						<input v-model="data.wajibPajakPbb.kodePos" class="form-control" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">Data Letak Objek Pajak</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-5 xc-xl-4 pt-1">No Persil</div>
					<div class="xc-lg mb-2">
						<input v-model="data.noPersil" class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-md">
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-5 xc-xl-4 pt-1">Jalan</div>
					<div class="xc-lg mb-2">
						<input v-model="data.jalan" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-5 xc-xl-4 pt-1">Blok</div>
					<div class="xc-lg-12 mb-2">
						<input v-model="data.blokKavNo" class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-5 xc-xl-4 pt-1">RT/RW</div>
					<div class="xc-lg-6 mb-2">
						<div class="d-flex">
							<input v-model="data.rt" class="form-control" />
							<div>&nbsp;</div>
							<input v-model="data.rw" class="form-control" />
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-5 xc-xl-4 pt-1">Cabang</div>
					<div class="xc-lg mb-2">
						<div class="form-check pt-1">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">Data Bumi</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Luas Tanah</div>
					<div class="xc-lg mb-2">
						<input v-model="data.objekPajakBumi.luasBumi" class="form-control" />
						<span v-if="dataErr['objekPajakBumi.luasBumi']" class="text-danger">{{dataErr['objekPajakBumi.luasBumi']}}</span>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-6 pt-1">Kode ZNT</div>
					<div class="xc-lg mb-2">
						<input v-model="data.objekPajakBumi.kodeZnt" class="form-control" />
						<span v-if="dataErr['objekPajakBumi.kodeZnt']" class="text-danger">{{dataErr['objekPajakBumi.kodeZnt']}}</span>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-md-6 xc-xl-5 pt-1">Jenis Tanah</div>
					<div class="xc-lg mb-2">
						<vueselect v-model="data.objekPajakBumi.jenisBumi"
							:options="jenisBumis"
							:reduce="item => item.kode"
							label="nama"
							code="kode"
						/>
						<span v-if="dataErr['objekPajakBumi.jenisBumi']" class="text-danger">{{dataErr['objekPajakBumi.jenisBumi']}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">Identitas Pendata / Pejabat Berwenang</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-7 xc-xl-6 pt-1">Tgl Pendataan</div>
					<div class="xc-lg mb-2">
						<div>
							<datepicker v-model="tanggalPerekaman" format="DD/MM/YYYY" />
						</div>
						<span v-if="dataErr['tanggalPerekaman']" class="text-danger">{{dataErr['tanggalPerekaman']}}</span>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-7 xc-xl-6 pt-1 text-lg-end">NIP Pendata</div>
					<div class="xc-lg mb-2">
						<input v-model="data.perekam_pegawai_nip" class="form-control" />
						<span v-if="dataErr['perekam_pegawai_nip']" class="text-danger">{{dataErr['perekam_pegawai_nip']}}</span>
					</div>
				</div>
			</div>
			<div class="d-none d-lg-inline-block col-lg">
			</div>
		</div>
		<div class="row">
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-7 xc-xl-6 pt-1">Tanggal Penelitian</div>
					<div class="xc-lg mb-2">
						<div>
							<datepicker v-model="tanggalPemeriksaan" format="DD/MM/YYYY" />
						</div>
						<span v-if="dataErr['tanggalPemeriksaan']" class="text-danger">{{dataErr['tanggalPemeriksaan']}}</span>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="row g-1">
					<div class="xc-lg-7 xc-xl-6 pt-1 text-lg-end">NIP Peneliti</div>
					<div class="xc-lg mb-2">
						<input v-model="data.pemeriksa_pegawai_nip" class="form-control" />
						<span v-if="dataErr['pemeriksa_pegawai_nip']" class="text-danger">{{dataErr['pemeriksa_pegawai_nip']}}</span>
					</div>
				</div>
			</div>
			<div class="d-none d-lg-inline-block col-lg">
			</div>
		</div>
	</div>
</div>
