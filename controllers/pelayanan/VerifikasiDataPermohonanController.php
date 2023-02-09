<?php

namespace app\controllers\pelayanan;

use app\controllers\_AuthGuardController;

class VerifikasiDataPermohonanController extends _AuthGuardController {

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionDetail($id) {
		return $this->render('detail', ['id' => $id]);
	}

	public function actionTambah() {
		return $this->render('tambah');
	}

	public function actionVerifikasi($id) {
		return $this->render('verifikasi', ['id' => $id]);
	}

	public function actionVerifikasiSppt($id) {
		return $this->render('verifikasi-sppt', ['id' => $id]);
	}
};
