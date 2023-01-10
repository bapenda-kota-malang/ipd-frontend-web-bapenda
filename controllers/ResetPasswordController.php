<?php

namespace app\controllers;

use Yii;

class ResetPasswordController extends \yii\web\Controller {

	public $layout = 'clean';
	public $params = [];

	public function actionRequest() {
		return $this->render('request');
	}

	public function actionCheck() {
		return $this->render('check');
	}
}
