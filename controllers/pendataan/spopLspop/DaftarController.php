<?php

namespace app\controllers\pendataan\spopLspop;

use app\controllers\_AuthGuardController;

class DaftarController extends _AuthGuardController {

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionDetail($id) {
		return $this->render('detail', ['id' => $id]);
	}

	public function actionTambahspop() {
		return $this->render('tambahspop');
	}

	public function actionTambahlspop() {
		return $this->render('tambahlspop');
	}

	public function actionEdit($id) {
		return $this->render('edit', ['id' => $id]);
	}

};
