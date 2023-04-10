<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;

class OutputController extends \yii\web\Controller {

	private $parts = [
		'potensi-op-wp' => ['target' => 'potensiopwp', 'output' => 'potensi-op-wp', 'mark' => 'tanggal'],
	];

	private $ch;
	private $token;
	public $enableCsrfValidation;

	function __construct($id, $module = null) {
		parent::__construct($id, $module);

		$this->enableCsrfValidation = false;
		$this->ch = curl_init();
		$this->token = Yii::$app->getRequest()->getCookies()->getValue('token');

		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);		
	}



	///// Publics 
	public function actionExcel($part) {
		$type = 'excel';
		$config = $this->getConfig($part, $type);
		if(!is_array($config)) {
			return $config;
		}
		$this->setUrl($config['target'], $type);
		$result = curl_exec($this->ch);
		return $this->setResult($result, $type, $config);
	}

	public function actionPdf($part) {
		$type = 'pdf';
		$config = $this->getConfig($part, $type);
		if(!is_array($config)) {
			return $config;
		}
		$this->setUrl($config['target'], $type);
		$result = curl_exec($this->ch);
		echo 'sdf';
		return $this->setResult($result, $type, $config);
	}

	///// Privates
	private function getConfig($part, $type) {
		$partFileName = Yii::getAlias('@outputConfigPath')."/$part.php";
		if(!file_exists($partFileName)) {
			$resp = Yii::$app->response;
			$resp->statusCode = 404;
			$resp->format = \yii\web\Response::FORMAT_JSON;
			$resp->content = '{ "message": "target tidak dikenali" }';
			return $resp;
		}

		include $partFileName;
		if(!isset($config) || !is_array($config) || !isset($config[$type]) || !isset($config['outputFileName'])) {
			$resp = Yii::$app->response;
			$resp->statusCode = 500;
			$resp->format = \yii\web\Response::FORMAT_JSON;
			$resp->content = '{ "message": "terjadi kesalahan pada konfigurasi output" }';
			return $resp;
		}
		return $config;
	}

	private function setUrl($part,$type){
		curl_setopt($this->ch, CURLOPT_URL, API_HOST."/$part/download/$type");
		
		if($this->token) {
			curl_setopt($this->ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer ".$this->token]);
		}
	}

	private function setPayload() {
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode(Yii::$app->request->bodyParams));
	}

	private function setResult($result, $type, $config) {
		if($result == false) {
			$result = '{ "message": "terjadi kesalahan pada server" }';
			Yii::$app->response->statusCode = 500;
		} else {
			Yii::$app->response->statusCode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		}

		if($type == 'excel') {
			$extension = '.xlsx';
		} elseif($type == 'pdf') {
			$extension = '.pdf';
		}

		if(isset($config['signature'])) {
			if(is_array($config['signature'])) {
				$signature = '';
				foreach($config['signature'] as $item) {
					$signature .= isset($_GET[$item]) ? '-'.$_GET[$_GET[$item]] : '';
				}
			} else {
				$signature = isset($_GET[$config['signature']]) ? '-'.$_GET[$config['signature']] : '';
			}
		} else {
			$signature = '';
		}

		$resp = Yii::$app->response;
		$resp->format = \yii\web\Response::FORMAT_RAW;
		$resp->downloadHeaders  = $config['outputFileName'].$signature.$extension;
		$resp->content = $result;
	}

}
