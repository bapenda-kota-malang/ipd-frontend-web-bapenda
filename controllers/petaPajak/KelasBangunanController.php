<?php

namespace app\controllers\petaPajak;

use app\controllers\_AuthGuardController;

class KelasBangunanController extends _AuthGuardController {
	
	public $layout = 'peta';
	
	public function actionIndex() {
		return $this->render('index');
	}
	
	/*
	public function actionDetail($id) {
		return $this->render('detail', ['id' => $id]);
	}

	public function actionTambah() {
		return $this->render('tambah');
	}

	public function actionEdit($id) {
		return $this->render('edit', ['id' => $id]);
	}
	*/
};
