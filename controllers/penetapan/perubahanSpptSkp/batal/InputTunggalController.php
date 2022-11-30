<?php

namespace app\controllers\penetapan\perubahanSpptSkp\batal;

use app\controllers\_AuthGuardController;

class InputTunggalController extends _AuthGuardController {

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionDetail($id) {
		return $this->render('detail', ['id' => $id]);
	}

	public function actionTambah() {
		return $this->render('tambah');
	}

	public function actionEdit($id) {
		return $this->render('edit', ['id' => $id]);
	}

};
