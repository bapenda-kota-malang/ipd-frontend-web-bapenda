<?php

namespace app\controllers\konfigurasi\manajemenUser;

use app\controllers\_AuthGuardController;

class GroupController extends _AuthGuardController{

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionDetail() {
		return $this->render('detail');
	}

	public function actionTambah() {
		return $this->render('tambah');
	}

	public function actionEdit($id) {
		return $this->render('edit', ['id' => $id]);
	}


};
