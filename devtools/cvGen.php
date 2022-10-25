<?php

include '../data/mainmenu.php';

const CPATH = '../controllers';
const VPATH = '../views/pages';
const URL_RULES_FILES = 'urlRules.txt';

function generateCV($items, $level = 0, $extLabel = '') {

	if($level == 0 && file_exists(URL_RULES_FILES)) {
		unlink(URL_RULES_FILES);
	}

	$level++;
	$rules = '';
	foreach($items as $item) {
		if(isset($item['items'])) {
			generateCV($item['items'], $level, isset($item['extLabel']) ? $item['extLabel'] : '');
			continue;
		}
		if(!isset($item['url'])) {
			continue;
		}

		// prep
		$lastSlashPos = strrpos($item['url'], '/');
		$oriPath = substr($item['url'], 0, $lastSlashPos);
		$oriCtr = substr($item['url'], $lastSlashPos + 1);
		$fixCtr = ucfirst(kebabToCamel(substr($item['url'], $lastSlashPos + 1)));

		// 
		if($fixCtr == '') {
			continue;
		}

		// check if path contains dash ('-')
		if(strpos($oriPath, '-') > 0) {
			$fixPath = kebabToCamel($oriPath);
			$rules .= "			'$item[url]' => '".$fixPath."/$oriCtr',\n";
		} else {
			$fixPath = $oriPath;
			$fixed = '';
		}

		//
		if($lastSlashPos == 0 && $oriPath == '/'.$oriCtr) {
			$fixPath = '';
		}

		// controller
		if(!array_search('skipctr', $_SERVER['argv'])) {
			// create dir if doesn't exist
			$cpath = CPATH.$fixPath;
			if (!file_exists($cpath)) {
				mkdir($cpath, 0755, true,);
			}

			// create controller
			$file = $cpath.'/'.$fixCtr.'Controller.php';
			if(!file_exists($file) || array_search('force-replace', $_SERVER['argv'])) {
				$content = "<?php\n\n".
					"namespace app\\controllers".str_replace('/', '\\', $fixPath).";\n\n".
					"use app\controllers\_AuthGuardController;\n\n".
					"class ".$fixCtr."Controller extends _AuthGuardController {\n\n".
					"	public function actionIndex() {\n".
					"		return \$this->render('index');\n".
					"	}\n\n".
					"	public function actionDetail() {\n".
					"		return \$this->render('detail');\n".
					"	}\n\n".
					"	public function actionTambah() {\n".
					"		return \$this->render('tambah');\n".
					"	}\n\n".
					"	public function actionEdit() {\n".
					"		return \$this->render('edit');\n".
					"	}\n\n".
					"};\n";
				file_put_contents($file, $content);
			}
		}

		// view
		if(!array_search('skipview', $_SERVER['argv'])) {
			// create dir if doesn't exist
			$vpath = VPATH.$fixPath.'/'.$oriCtr;
			if (!file_exists($vpath)) {
				mkdir($vpath, 0755, true,);
			}
			$vcpath = $vpath.'/_components';
			if (!file_exists($vcpath)) {
				mkdir($vcpath, 0755, true,);
			}

			$item['label'] = (isset($extLabel) ? $extLabel.' ' : '').$item['label'];

			// create view index
			$file = $vpath.'/index.php';
			if(!file_exists($file) || !array_search('force-replace', $_SERVER['argv'])) {
				file_put_contents($file, "<?php\n\n".
					"\$this->params['container_unset'] = true;\n\n".
					"\$scope = '$item[label]';\n".
					"\$action = 'Daftar';\n".
					"\$showAdd = true;\n".
					"\$addUrl = '$item[url]/tambah';\n\n".
					"\$file = __DIR__.'/_components/list.php';\n".
					"\$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';\n\n".
					"include Yii::getAlias('@vwCompPath/list/header.php');\n".
					"include file_exists(\$file) ? \$file : \$file_default;\n".
					"include Yii::getAlias('@vwCompPath/list/footer.php');\n");
			}

			// create view tambah
			$file = $vpath.'/tambah.php';
			if(!file_exists($file) || !array_search('force-replace', $_SERVER['argv'])) {
				file_put_contents($file, "<?php\n\n".
					"\$scope = '$item[label]';\n".
					"\$action = 'Tambah';\n".
					"\$showCancel = true;\n".
					"\$cancelUrl = '$item[url]';\n".
					"\$showOK = true;\n\n".
					"\$file = __DIR__.'/_components/entryform.php';\n".
					"\$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';\n\n".
					"include Yii::getAlias('@vwCompPath/detail/header.php');\n".
					"include file_exists(\$file) ? \$file : \$file_default;\n".
					"include Yii::getAlias('@vwCompPath/detail/footer.php');\n");
			}

			// view
			unlink($vpath.'/view.php');
			$file = $vpath.'/detail.php';
			if(!file_exists($file) || !array_search('force-replace', $_SERVER['argv'])) {
				file_put_contents($file, "<?php\n\n".
					"\$scope = '$item[label]';\n".
					"\$action = 'Detail';\n".
					"\$showBack = true;\n".
					"\$backUrl = '$item[url]';\n".
					"\$showOK = true;\n\n".
					"\$file = __DIR__.'/_components/entryform.php';\n".
					"\$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';\n\n".
					"include Yii::getAlias('@vwCompPath/detail/header.php');\n".
					"include file_exists(\$file) ? \$file : \$file_default;\n".
					"include Yii::getAlias('@vwCompPath/detail/footer.php');\n");
			}

			// edit
			$file = $vpath.'/edit.php';
			if(!file_exists($file) || !array_search('force-replace', $_SERVER['argv'])) {
				file_put_contents($file, "<?php\n\n".
					"\$scope = '$item[label]';\n".
					"\$action = 'Edit';\n".
					"\$showCancel = true;\n".
					"\$cancelUrl = '$item[url]';\n".
					"\$showOK = true;\n\n".
					"\$file = __DIR__.'/_components/entryform.php';\n".
					"\$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';\n\n".
					"include Yii::getAlias('@vwCompPath/detail/header.php');\n".
					"include file_exists(\$file) ? \$file : \$file_default;\n".
					"include Yii::getAlias('@vwCompPath/detail/footer.php');\n");
			}
		}
	}

	$fmode = ($level == 1 ? null : FILE_APPEND);
	file_put_contents(URL_RULES_FILES, $rules, FILE_APPEND);
}

function kebabToCamel($string, $capitalizeFirstCharacter = false) {
	$str = str_replace('-', '', ucwords($string, '-'));

	if (!$capitalizeFirstCharacter) {
		$str = lcfirst($str);
	}

	return $str;
}

// START
generateCV($mainMenuData);
