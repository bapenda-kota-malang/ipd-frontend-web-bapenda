<?php

include Yii::getAlias('@dataPath').'/mainmenu.php';

$session = Yii::$app->session;
if(!$session->isActive) {
	$session->open();
}
$nip = $session->has('nip') ? $session->get('nip') : 'NIP';
$user_id = $session->has('user_id') ? $session->get('user_id') : 'User ID';
$user_name = $session->has('user_name') ? $session->get('user_name') : 'User Name';
$jabatan_id = $session->has('jabatan_id') ? $session->get('jabatan_id') : 'Jabatan';

function renderMenuItem($items, $level = 0, &$id = 0, $parent_id = 0) {
	$el = '';
	++$level;
	if($level == 1) {
		$el = '<ul class="navbar-nav nav justify-content-center">';
		foreach($items as $item) {
			$id++;
			$el .= '<li class="dropdown-center">';
			if(!isset($item['items'])) {
				$el .= '<a class="nav-link p-2" href="'.(isset($item['url']) ? $item['url'] : '#').'" data-bs-auto-close="outside">'.$item['label'].'</a>';
			} else {
				$el .= '<a class="btn dropdown-toggle nav-link p-2" href="'.(isset($item['url']) ? $item['url'] : '#').'" data-bs-toggle="dropdown" role="button" aria-expanded="false" data-bs-auto-close="outside">'.$item['label'].'</a>';
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
				$el .= '<a id="item-'.$id.'" class="dropdown-item with-child" href="#collapse-'.$id.'" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-'.$id.'">'.$item['label'].'</a>';
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
				$el .= '<a id="item-'.$id.'" class="dropdown-item with-child" href="#collapse-'.$id.'" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-'.$id.'">'.$item['label'].'</a>';
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
<nav id="w1" class="navbar-expand-lg navbar-dark bg-grey fixed-top menu">
	<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="main-menu" class="collapse navbar-collapse justify-content-center" >
		<?= renderMenuItem($mainMenuData) ?>
	</div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top px-3 main">
	<a class="navbar-brand" href="/">
		<img src="/img/bakoma-logo.png" alt="" class="me-1">
		<span class="d-none d-md-inline">Badan Pendapatan Daerah</span><span class="d-inline d-md-none">Bapenda</span> Kota Malang
	</a>
	<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#w0-collapse" aria-controls="w0-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse">
		<div class="collapse navbar-collapse" id="navbarText">
			<div class="me-auto"></div>
			<ul class="navbar-nav mb-2 mb-lg-0">
				<li class="dropdown nav-item">
					<a id="item-153" class="dropdown-toggle nav-link show" href="/myaarea" data-bs-toggle="dropdown" role="button" aria-expanded="true" data-bs-auto-close="outside">
						<i class="bi bi-person"></i> <?= $user_name ?>
					</a>
					<div class="dropdown-menu dropdown-menu-end" data-bs-popper="static" style="width:150px">
						<a id="item-154" class="dropdown-item" href="/profil"><i class="bi bi-person"></i> Profil</a>
						<a id="item-155" class="dropdown-item" href="/akun"><i class="bi bi-lock"></i> Akun</a>
						<a id="item-156" class="dropdown-item" href="/auth/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

<input type="hidden" id="user_name" value="<?= isset($user_name) ? $user_name : '' ?>" />
<input type="hidden" id="user_id" value="<?= isset($user_id) ? $user_id : '' ?>" />
<input type="hidden" id="jabatan_id" value="<?= isset($jabatan_id) ? $jabatan_id : '' ?>" />
<input type="hidden" id="nip" value="<?= isset($nip) ? $nip : '' ?>" />