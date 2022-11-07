<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;

class ApiController extends \yii\web\Controller {

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

	public function actionPost($part) {
		$this->setUrl();
		$this->setPayload();
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	}

	public function actionGet($part) {
		$this->setUrl();
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	}

	public function actionGetId($part, $id) {
		$this->setUrl();
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	}

	public function actionPatch($part, $id) {
		$this->setUrl();
		$this->setPayload();
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	}

	public function actionDelete($part, $id) {
		$this->setUrl();
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	}

	public function actionGetAction($part, $action) {
		$this->setUrl();
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	}

	public function actionGetIdAction($part, $id, $action) {
		$this->setUrl();
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	} 

	public function actionPostAction($part, $action) {
		$this->setUrl();
		$this->setPayload();
		$result = curl_exec($this->ch);

		if($action == 'login') {
			if(curl_getinfo($this->ch, CURLINFO_HTTP_CODE) == 200) {
				$resultObj = json_decode($result);
				if(isset($resultObj->data->accessToken)) {
					//
					$cookies = Yii::$app->response->cookies;
					$cookies->add(new \yii\web\Cookie([
						'name' => 'token',
						'value' => $resultObj->data->accessToken,
						'expire' => time() + 24 * 60 * 60,
					]));
					// 
					$session = Yii::$app->session;
					if(!$session->isActive) {
						$session->open();
					}
					if(isset($resultObj->data->user->name)) {
						$session->set('user_name', $resultObj->data->user->name);
					}
				}
			};
		}

		return $this->setResult($result);
	}

	public function actionPatchAction($part, $id, $action) {
		$this->setUrl();
		$this->setPayload();
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
		$result = curl_exec($this->ch);
		return $this->setResult($result);
	}

	public function actionGetStatic($part, $content) {
		$this->setUrl();
		$result = curl_exec($this->ch);
		$response = \Yii::$app->response;
		$response->format = yii\web\Response::FORMAT_RAW;
		$response->headers->add('content-type', 'image/jpg');
		$response->data = $result;
		return $response;	
	}

	///// Privates
	
	private function setUrl(){
		curl_setopt($this->ch, CURLOPT_URL, API_HOST.str_replace('/api','',str_replace(['resources', '___'], ['static', '.'], Url::current())));
		
		if($this->token) {
			curl_setopt($this->ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer ".$this->token]);
		}
	}

	private function setPayload() {
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode(Yii::$app->request->bodyParams));
	}

	private function setResult($result) {
		if($result == false) {
			$result = '{ "message": "terjadi kesalahan pada server" }';
			Yii::$app->response->statusCode = 500;
		} else {
			Yii::$app->response->statusCode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		}
		$resp = Yii::$app->response;
		$resp->format = \yii\web\Response::FORMAT_JSON;
		$resp->content = $result;
	}

}
