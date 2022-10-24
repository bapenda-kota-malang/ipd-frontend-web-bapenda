<?php

namespace app\controllers\konfigurasi\dataReferensi\masterData;

class PegawaiController extends \yii\web\Controller {

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
