<?php

namespace app\controllers;

use Yii;

class _AuthGuardController extends \yii\web\Controller {

	function __construct($id, $module = null) {
		parent::__construct($id, $module);

		$token = Yii::$app->getRequest()->getCookies()->getValue('token');
		if($token == NULL) {
			header('Location: /auth/login');
			exit();
		}
	}

}
