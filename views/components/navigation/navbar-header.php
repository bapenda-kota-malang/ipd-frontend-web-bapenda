<?php

include Yii::getAlias('@dataPath').'/mainmenu.php';

$session = Yii::$app->session;
if(!$session->isActive) {
	$session->open();
}
$user_name = $session->has('user_name') ? $session->get('user_name') : 'User';
$jabatan_id = $session->has('jabatan_id') ? $session->get('jabatan_id') : 'Jabatan';

function renderMenuItem($items, $level = 0, &$id = 0, $parent_id = 0) {
	$el = '';
	++$level;
	if ($level == 1) {
		$el = '<ul class="navbar-nav nav justify-content-center">';
		foreach($items as $item) {
			$id++;
			if (isset($item['items'])) {
				$dropdown = 'dropdown';
				$dropdownToggle = 'dropdown-toggle';
				$dropdownAttr = 'data-bs-toggle="dropdown" role="button" aria-expanded="false"';
			} else {
				$dropdown = '';
				$dropdownToggle = '';
				$dropdownAttr = '';
			}
			$el .= '<li class="'.$dropdown.' nav-item">'.
					'<a id="item-'.$id.'" class="'.$dropdownToggle.' nav-link" href="'.(isset($item['url']) ? $item['url'] : '#').'" '.$dropdownAttr.' data-bs-auto-close="outside">'.$item['label'].'</a>';
			if(isset($item['items'])) {
				$el .= renderMenuItem($item['items'], $level, $id, $id);
			}	
			$el .= '</li>';
		}
		$el .= '</ul>';
	} elseif($level == 2) {
		$el = '<div class="dropdown-menu">';
		foreach ($items as $item) {
			$id++;
			if(isset($item['items'])) {
				$el .= '<a id="item-'.$id.'" class="dropdown-item" href="#collapse-'.$id.'" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-'.$id.'">'.$item['label'].'</a>';
				$el .= renderMenuItem($item['items'], $level, $id, $id);
			} else {
				$el .= '<a id="item-'.$id.'" class="dropdown-item" href="'.(isset($item['url']) ? $item['url'] : '').'">'.$item['label'].'</a>';
			}
		}
		$el .= '</div>';
	} else {
		$el = '<div class="ps-3"><div id="collapse-'.$parent_id.'" class="collapse">';
		foreach ($items as $item) {
			$id++;
			if(isset($item['items'])) {
				$el .= '<a id="item-'.$id.'" class="dropdown-item" href="#collapse-'.$id.'" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-'.$id.'">'.$item['label'].'</a>';
				$el .= renderMenuItem($item['items'], $level, $id, $id);
			} else {
				$el .= '<a id="item-'.$id.'" class="dropdown-item" href="'.(isset($item['url']) ? $item['url'] : '').'">'.$item['label'].'</a>';
			}
		}
		$el .= '</div></div>';
	}
	return $el;
}

?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top px-3 main">
	<a class="navbar-brand" href="/">
		<img src="/img/bakoma-logo.png" alt="" class="me-1">
		<span class="d-none d-md-inline">Badan Pendapatan Daerah</span><span class="d-inline d-md-none">Bapenda</span> Kota Malang
	</a>
	<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#w0-collapse" aria-controls="w0-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse">
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#"></a>
				</li>
			</ul>
			<span class="navbar-text me-3"><?= $user_name ?></span>
			<a href="/auth/logout" class="navbar-text">
				Logout
			</a>
		</div>
	</div>
</nav>

<nav id="w1" class="navbar navbar-expand-lg navbar-dark bg-grey fixed-top menu">
	<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="main-menu" class="collapse navbar-collapse justify-content-center" >
		<?= renderMenuItem($mainMenuData) ?>
	</div>
</nav>