<?php
session_start();
$token = iget("tik");
if (isset($token)) {
	if (isset($_SESSION['gid'])) {
		$id = $_SESSION["gid"];
		$aa = explode(".", $token);
		if (count($aa) == 2) {
			if (strlen($aa[0]) == 16 && substr($aa[0], 5, 1) == 'b' && substr($aa[0], 8, 1) == '5' && $aa[1] == $id) {
				$_SESSION["tok"] = $aa[0];
				include_once('tkn.php');
				echo enkod('SuRG4T1m3N', $aa[0].$aa[1]);
			}
		}
	}
}

function iget($a){
	$b = $_POST[$a];
	if (preg_match('/^[A-Za-z0-9.]*$/', $b)) return $b;
}
?>