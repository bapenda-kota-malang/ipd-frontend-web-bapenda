<?php

namespace app\controllers\penetapan\massalSkpdkb;

use app\controllers\_AuthGuardController;
use Yii;

class PajakParkirController extends _AuthGuardController
{

	public function actionIndex()
	{
		$request = Yii::$app->request;
		$type = $request->get('type', 'oa');

		if ($type != "oa") {
			$type = "sa";
		}

		return $this->render('index', ['type' => $type]);
	}

	public function actionDetail($id)
	{
		return $this->render('detail', ['id' => $id]);
	}

	public function actionTambah()
	{
		return $this->render('tambah');
	}

	public function actionEdit($id)
	{
		return $this->render('edit', ['id' => $id]);
	}
};
