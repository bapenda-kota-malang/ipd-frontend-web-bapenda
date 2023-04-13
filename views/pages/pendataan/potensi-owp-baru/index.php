<?php

$this->params['container_unset'] = true;

$scope = ' Potensi Objek/Wajib Pajak Baru';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/potensi-owp-baru/tambah';
$showOK = true;

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

$titleNav = 
    '<a href="/output/excel/potensi-opwp-baru" target="_blank" class="btn bg-green ms-2">'.
        '<i class="bi bi-file-earmark-excel"></i> Output Excel'.
    '</a>';
	// '<div class="btn-group ms-2">'.
	// 	'<button href="/output/excel/potensi-owp-baru" data-bs-toggle="dropdown" aria-expanded="false" class="btn bg-green ms-2">'.
	// 		'<i class="bi bi-download"></i> Output'.
	// 	'</button>'.
	// 	'<ul class="dropdown-menu dropdown-menu-end" style="width: 150px; min-width:unset;">'.
	// 		'<li><a href="/output/excel/potensi-opwp-baru" target="_blank" class="dropdown-item"><i class="bi bi-file-earmark-excel"></i> Excel</a></li>'.
	// 		'<li><a href="/output/pdf/potensi-opwp-baru" target="_blank" class="dropdown-item"><i class="bi bi-file-earmark-pdf"></i> PDF</a></li>'.
	// 	'</ul>'.
	// '</div>';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
