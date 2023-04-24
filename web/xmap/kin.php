<?php
$cnr = "host=localhost port=5432 dbname=ptx user=p3t4 password=M4rt4b4Xp3c0";
$kon = pg_connect($cnr);
if (!$kon) {
	echo "Koneksi ke database gagal";
	exit;
}
?>
