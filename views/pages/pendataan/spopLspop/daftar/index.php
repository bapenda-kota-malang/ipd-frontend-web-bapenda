<?php


$scope = ' Daftar SPOP/LSPOP';
$action = 'Daftar';
// $showAdd = true;
// $addUrl = '/pendataan/spop-lspop/daftar/tambah';
$showOK = true;
$titleNav = 
	'<div class="btn-group ms-2">'.
		'<button class="btn bg-blue border-slate-300 dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">'.
			'<i class="bi bi-plus"></i> Tambah'.
		'</button>'.
		'<ul class="dropdown-menu dropdown-menu-end" style="width:150px">'.
			'<li><a href="/pendataan/spop-lspop/daftar/tambahspop" class="dropdown-item"><i class="bi bi-file me-1"></i> SPOP</a></li>'.
			'<li><a href="/pendataan/spop-lspop/daftar/tambahlspop" class="dropdown-item"><i class="bi bi-files me-1"></i> LSPOP</a></li>'.
		'</ul>'.
	'</div>'.
	'<a href="/output/excel/spop" target="_blank" class="btn bg-green ms-2">'.
		'<i class="bi bi-file-earmark-excel"></i> Output Excel'.
	'</a>';
$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
