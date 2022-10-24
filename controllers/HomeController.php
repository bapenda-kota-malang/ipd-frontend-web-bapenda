<?php

namespace app\controllers;

use Yii;

class HomeController extends _AuthGuardController {

    public function actionIndex() {
		$cookies = Yii::$app->response->cookies;

		return $this->render('index');
	}
}
