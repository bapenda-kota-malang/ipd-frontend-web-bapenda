<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);

$this->beginPage()

?><!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
	<meta name="keywords" content="peta, gis, pbb, pajak, malang">
	<meta name="description" content="Sistem Informasi Pajak dan Bangunan">
	<meta name="author" content="BAPENDA Kota Malang">
	<meta name="robots" content="pajak, pbb, smart map">
	<meta itemprop="name" content="SMART MAP">
	<meta property="og:url" content="https://bapenda.malangkota.go.id/">
	<meta name="geo.placename" content="Indonesia">
	<meta name="DC.Format" content="text/html">
	<meta name="DC.Language" content="id">
	<link rel="publisher" href="https://bapenda.malangkota.go.id/">
	<link rel="canonical" href="https://bapenda.malangkota.go.id/">
	
	<link href="/img/bakoma-logo.png" rel="icon" type="image/x-icon">
	<link href="/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="/vendors/quicksand-font/css/font.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@200&display=swap" rel="stylesheet">
	
	<title>PETA PAJAK BAPENDA KOTA MALANG</title>
	<?php $this->registerCsrfMetaTags() ?>
	<?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
	<?php $this->beginBody() ?>
	<header>
		<?php
		include __DIR__.'/../components/navigation/header-peta.php'
		?>
	</header>
	<iframe src="/xmap/" width="100%" height="100%" style="padding-top: 60px"></iframe>
	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
