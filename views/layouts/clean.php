<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);

$container_status = isset($this->params['container_unset']) ? 'mx-3' : 'container';
$container_fill = isset($this->params['container_transparent']) ? '' : 'bg-white';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="/img/bakoma-logo.png">
	<link href="/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="/vendors/quicksand-font/css/font.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@200&display=swap" rel="stylesheet">

	<script src="/vendors/vuejs/vue.global.js"></script>
	<script src="/js/main.js"></script>

	<?php $this->registerCsrfMetaTags() ?>
	<title><?= ''; // Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
	<?php $this->beginBody() ?>

	<?= $content ?>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
