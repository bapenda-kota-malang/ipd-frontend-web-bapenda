<?php

$scope = ' Verifikasi Pendaftaran User WP';
$action = 'Detail';
$showApproval = true;
$showBack = true;
$backUrl = '/pendaftaran/verifikasi-user-wp';
// $showOK   = true;

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include __DIR__.'/_components/detail.php' ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
