<?php

namespace app\controllers\pendaftaran;

class VerifikasiNpwpdController extends \yii\web\Controller {

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

	public function actionPreview($id) {
		return $this->render('preview',  ['id' => $id]);
	}

};
