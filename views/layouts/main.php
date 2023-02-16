<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);

$content_fixed = !isset($this->params['content_fixed']) || $this->params['content_fixed'] ? true : false;
$container_status = isset($this->params['container_unset']) ? 'mx-3' : 'container';
$container_fill = isset($this->params['container_transparent']) ? '' : 'bg-white';

$this->beginPage()

?><!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="/img/bakoma-logo.png" rel="icon" type="image/x-icon">
<link href="/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="/vendors/quicksand-font/css/font.css" rel="stylesheet">
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@200&display=swap" rel="stylesheet">

<script src="/vendors/vuejs-2.6.1/vue.js"></script>
<script src="/js/helper/api.js?v=20230201a"></script>
<script src="/js/helper/common.js?v=20230201a"></script>
<script src="/js/helper/image.js?v=20230201a"></script>
<script src="/js/refs/common.js?v=20230216a"></script>

<title><?= 'IPD' // Html::encode($this->title) ?></title>
<?php $this->registerCsrfMetaTags() ?>
<?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100 nav-placed">
	<?php $this->beginBody() ?>

	<header>
		<?php
		include __DIR__.'/../components/navigation/navbar-header.php'
		?>
	</header>

	<?php if($content_fixed) { ?>
	<main id="main" role="main" class="flex-shrink-0">
		<div id="vueBox" class="<?=  $container_status.' '.$container_fill ?> p-3">
			<?= '';
			// Breadcrumbs::widget([
			//	 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			// ])
			?>
			<?= ''; //Alert::widget() ?>
			<?= $content ?>
		</div>
	</main>
	<?php } else { ?>
		<?= $content ?>
	<?php } ?>

	<footer class="footer mt-auto py-3 text-muted">
		<div class="container">
			<p class="float-left">&copy; Bapenda Kota Malang 2022</p>
		</div>
	</footer>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
