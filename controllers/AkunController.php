<?php

namespace app\controllers;

use Yii;

class AkunController extends _AuthGuardController {

	public function actionIndex() {
		return $this->render('index');
	}

}
