<?php

namespace app\controllers\pendataan\obyekPajak;

class UpdatingJalanStandarController extends \yii\web\Controller {

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
