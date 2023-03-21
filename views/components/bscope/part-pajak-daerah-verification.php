<?php
$groupName = isset($paramJobName) ? strtolower($paramJobName) : 'input';
?>

<?php 
if ($groupName === 'input') {
  include 'part-pajak-daerah-verification-sub01.php';
} else {
  include 'part-pajak-daerah-verification-sub02.php';
}
?>
