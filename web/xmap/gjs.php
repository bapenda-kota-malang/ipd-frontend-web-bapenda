<?php
session_start();
function iget($a, $c) {
	if (preg_match ("/\b".$a."\b/i", $_SERVER["QUERY_STRING"])) {
		$b = $_GET[$a];
		switch ($c) {
			case 0: //kecamatan//kelurahan//layer
				$pm = '/^[A-Za-z]*$/';
				break;
			case 1: //token
				$pm = '/^[A-Za-z0-9_.-]*$/';
				break;
			case 2: //edd destroy session
				$pm = '/^[0-1]$/';
				break;
			case 3: //ix tema peta
				$pm = '/^[0-8]$/';
		}
		if (preg_match($pm, $b)) return $b;
	}
}

$kec = iget("kc", 0);
$kel = iget("kl", 0);
$tbl = iget("nl", 0);
$token = iget("kd", 1);
$edd = iget("ed", 2);
$idd = iget("ix", 3);

if (isset($kec) && isset($kel) && isset($tbl) && isset($token) && isset($edd) && isset($idd)) {
	$nml = ['kavlingoutline'=>1, 'kavling'=>2, 'persil'=>3];
	if (!isset($nml[$tbl])) {
		unset($_SESSION['gid']);
		session_destroy();
		exit;
	}
	if (isset($_SESSION['gid']) && isset($_SESSION['tok'])) {
		$tik = $_SESSION['tok'];
		$tok = $tik.$_SESSION['gid'];
		include_once('tkn.php');
		if (!dekod('SuRG4T1m3N', $token, $tok)) exit;
		include_once('kin.php');
		
		$idx = intval($idd);
		$kc = strtolower($kec);
		$kl = strtolower($kel);
		$sql = '';
		switch ($tbl) {
			case 'kavlingoutline':
				if ($idx == 0) {
					$sql = "SELECT gis.kelasbangunan('$kc', '$kl')";
				} else if ($idx == 1) {
					$sql = "SELECT gis.jenistanah('$kc', '$kl')";
				} else if ($idx == 2) {
					$sql = "SELECT gis.jpb('$kc', '$kl')";
				} else if ($idx == 3) {
					$sql = "SELECT gis.znt('$kc', '$kl')";
				} else if ($idx == 4) {
					$sql = "SELECT gis.tunggakan('$kc', '$kl')";
				} else if ($idx == 5) {
					$sql = "SELECT gis.objekpajak('$kc', '$kl')";
				} else if ($idx == 6) {
					$sql = "SELECT gis.fasum('$kc', '$kl')";
				} else {
					$sql = "SELECT gis.objekpajak('$kc', '$kl')";
				}
				break;
			//case 'kavling':
				//$sqr
				//break;
			case 'persil':
				if ($idx == 4) {
					$sql = "SELECT gis.persilnunggak('$kc', '$kl')";
				} else if ($idx == 6) {
					$sql = "SELECT gis.persilfasum('$kc', '$kl')";
				} else {
					$sql = "SELECT gis.persil('$kc', '$kl')";
				}
		}

		$rs = pg_query($kon, $sql);
		if (!$rs) {
			echo 'SQL Error Bos.\n';
			pg_close($kon);
			exit;
		}
		$r = pg_fetch_row($rs);
		ob_start('ob_gzhandler');
		header('Content-type: application/json');
		echo $r[0];
		pg_free_result($rs);
		pg_close($kon);
		
		if ($edd == '1') {
			unset($_SESSION['gid']);
			session_destroy();
		}
	}
} else {
	unset($_SESSION['gid']);
	session_destroy();
}
?>