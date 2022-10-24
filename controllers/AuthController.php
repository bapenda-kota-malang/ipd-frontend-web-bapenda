<?php

namespace app\controllers;

use Yii;

class AuthController extends \yii\web\Controller {

	public $layout = 'clean';

	public function actionLogin() {
		return $this->render('login');
	}

	public function actionLogout() {
		$cookies = Yii::$app->response->cookies;
		$cookies->remove('token');
		$this->redirect('/');
	}
}
