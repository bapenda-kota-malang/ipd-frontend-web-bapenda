<?php

$scope = ' Verifikasi Pendaftaran User WP';
$action = 'Proses';
$showApproval = true;
$showBack = true;
$backUrl = '/pendaftaran/verifikasi-user-wp';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include __DIR__.'/_components/preview.php'; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
