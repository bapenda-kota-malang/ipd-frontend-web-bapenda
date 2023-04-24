<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

function iget($a){
	$b = $_POST[$a];
	if (preg_match('/^[A-Z][A-Z_]*[A-Z]$/', $b)) return $b;
}

function igut($a){
	$b = $_POST[$a];
	if (preg_match('/^[A-Za-z0-9_.-]*$/', $b)) return $b;
}

if (getenv('REQUEST_METHOD') == 'POST') {
	$aa = iget("tik");
	$bb = igut("tok");
	if (isset($aa) && isset($bb)) {
		if (isset($_SESSION['gid']) && isset($_SESSION['tok'])) {
			$tik = $_SESSION['tok'];
			$tok = $tik.$_SESSION['gid'];
			include_once('tkn.php');
			if (!dekod('SuRG4T1m3N', $bb, $tok)) exit;
			
			$dt = strtolower($aa) . '_';
			include_once('kin.php');
			$sql = "SELECT f_table_name FROM geometry_columns WHERE f_table_schema = 'gis' AND f_geometry_column = 'geom' AND f_table_name LIKE '$dt%'";
			$rs = pg_query($kon, $sql);
			if (!$rs) {
				echo 'ERR';
				pg_close($kon);
				exit;
			} else {
				$hsl = '';
				if (pg_num_rows($rs) > 0) {
					$fl = [];
					while($r = pg_fetch_row($rs)) {
						$fl[] = str_replace($dt, '', $r[0]);
					}
					pg_free_result($rs);
					
					if (sizeof($fl) > 0) {
						$nam = ["kavling", "persil"];
						for ($x = 0; $x < sizeof($nam); $x++) {
							foreach ($fl as $ff) {
								if ($nam[$x] == strtolower($ff)) {
									if ($x == 0) {
										$hsl .= "|kavlingoutline|".$ff;
									} else {
										$hsl .= "|".$ff;
									}
									break;
								}
							}
						}
					}
				}
				pg_close($kon);
				echo $hsl;
			}
		}
	}
}
?>