<?php
function base64url_encode($data) {
	return str_replace('=', '', strtr(base64_encode($data), '+/', '-_'));
}

function base64url_decode($input) {
    $remainder = strlen($input) % 4;
    if ($remainder) {
        $padlen = 4 - $remainder;
        $input .= str_repeat('=', $padlen);
    }
    return base64_decode(strtr($input, '-_', '+/'));
}
	
function enkod($key, $data) {
	$headers = ['alg'=>'SHA256','typ'=>'JWT'];
	$headers_encoded = base64url_encode(json_encode($headers));
	$iat = time(); //wb -> waktu buat
	$nbf = $iat + 10;//wj -> waktu jeda
	$exp = $iat + 120;//we -> waktu habis
	$pay = ['wb'=>$iat,'wj'=>$nbf,'we'=>$exp];
	$payload = ['id'=>$data,'wb'=>$iat,'wj'=>$nbf,'we'=>$exp];
	$payload_encoded = base64url_encode(json_encode($payload));
	$pay_encoded = base64url_encode(json_encode($pay));
	$signature = hash_hmac('SHA256',"$headers_encoded.$payload_encoded",$key,true);
	$signature_encoded = base64url_encode($signature);
	$token = "$pay_encoded.$signature_encoded";
	return $token;
}

function dekod($key, $token, $kata) {
	$xx = false;
	$wkt = time();
	$nbf = $wkt + 10;
	$exp = $wkt - 10;
	$aa = explode(".", $token);
	if (count($aa) != 2) return $xx;
	list($bodyb64, $cryptob64) = $aa;
	if (null === $pay = json_decode(base64url_decode($bodyb64))) return $xx;
	if (false === ($sig = base64url_decode($cryptob64))) return $xx;
	$header = ['alg'=>'SHA256','typ'=>'JWT'];
	$headb64 = base64url_encode(json_encode($header));	
	$body = ['id'=>$kata,'wb'=>$pay->wb,'wj'=>$pay->wj,'we'=>$pay->we];
	$bodyb64 = base64url_encode(json_encode($body));
	if (!cocok("$headb64.$bodyb64", $sig, $key)) return $xx;
	if (isset($pay->wj) && $pay->wj > $nbf) return $xx;
	if (isset($pay->wb) && $pay->wb > $nbf) return $xx;
	if (isset($pay->we) && $exp >= $pay->we) return $xx;
	return true;
}

function cocok($msg, $signature, $key) {
	$hash = hash_hmac("SHA256", $msg, $key, true);
	if (function_exists('hash_equals')) {
		return hash_equals($signature, $hash);
	}
	$len = min(safeStrlen($signature), safeStrlen($hash));
    $status = 0;
    for ($i = 0; $i < $len; $i++) {
        $status |= (ord($signature[$i]) ^ ord($hash[$i]));
    }
    $status |= (safeStrlen($signature) ^ safeStrlen($hash));	
	return ($status === 0);
}

function safeStrlen($str) {
    if (function_exists('mb_strlen')) {
        return mb_strlen($str, '8bit');
    }
    return strlen($str);
}
?>