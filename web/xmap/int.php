<?php
session_start();
function iget($a, $c) {
	$b = $_POST[$a];
	switch ($c) {
		case 0: //kecamatan//kelurahan//layer
			$pm = '/^[A-Za-z]*$/';
			break;
		case 1: //ix tema peta
			$pm = '/^[0-8]$/';
			break;
		case 2: //fid
			$pm = '/^[0-9]*$/';
	}
	if (preg_match($pm, $b)) return $b;
}

if (getenv('REQUEST_METHOD') == 'POST') {
	$kec = iget("kc", 0);
	$kel = iget("kl", 0);
	$lyr = iget("nl", 0);
	$idd = iget("ix", 1);
	$fid = iget("id", 2);
	
	if (isset($kec) && isset($kel) && isset($lyr) && isset($idd) && isset($fid)) {
		$nml = ['kavlingoutline'=>1, 'kavling'=>2, 'persil'=>3];
		if (!isset($nml[$lyr])) {
			unset($_SESSION['qid']);
			session_destroy();
			exit;
		}
		include_once('kin.php');
			
		$idx = intval($idd);
		$sql = '';
		switch ($lyr) {
			case 'kavlingoutline':
			case 'kavling':
				if ($idx == 5) {
					$sql = 'SELECT TRIM("WajibPajakPbb_Id"), "NoFormulirSpop", "Jalan", "BlokKavNo", "Rw", "Rt", "StatusWp", "TotalLuasBumi", "TotalLuasBangunan", "NjopBumi", "NjopBangunan", "JenisTransaksi" FROM public."ObjekPajakPbb" WHERE "WajibPajakPbb_Id" = '."'".$fid."'";
				}
				break;
			case 'persil':
				if ($idx == 5) {
					$sql = 'SELECT "D_Nop", "Jpb_Kode", "NoFormulirSpop", "TahunDibangun", "TahunRenovasi", "LuasBangunan", "JmlLantaiBng", "Kondisi", "JenisKonstruksi", "JenisAtap", "KodeDinding", "KodeLantai", "KodeLangitLangit", "NilaiSistem", "JenisTransaksi" FROM public."ObjekPajakBangunan" WHERE "D_Nop" = '."'".$fid."'";
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
		header('Content-type: application/json; charset=UTF-8');
		print utf8_encode(json_encode($r));
		pg_free_result($rs);
		pg_close($kon);
	}
}
?>