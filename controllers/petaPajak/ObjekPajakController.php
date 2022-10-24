<?php

namespace app\controllers\petaPajak;

class ObjekPajakController extends \yii\web\Controller {

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionDetail() {
		return $this->render('detail');
	}

	public function actionTambah() {
		return $this->render('tambah');
	}

	public function actionEdit() {
		return $this->render('edit');
	}

};
