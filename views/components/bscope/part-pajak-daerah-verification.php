<?php
$groupName = isset($paramJobName) ? strtolower($paramJobName) : 'input';
$taxType = isset($taxType) ? strtolower($taxType) : 'keberatan';
?>

<?php 
if ($groupName === 'input') {
  include 'part-pajak-daerah-verification-sub01.php';
} else if ($taxType === 'pengurangan') {
  include 'part-pajak-daerah-verification-sub02.php';
} else if ($taxType === 'keberatan') {
  include 'part-pajak-daerah-verification-sub03.php';
}
?>
