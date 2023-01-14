<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use \yii\web\View;

/**
 * Vue Application for Detail Page
 *
 * @author Munaja <munawwirul.jamal@gmail.com>
 * @since 1.0
 * 
 * some repetitive assets are defined here instead of in the AppAsset
 * because of order of rendering
 */
class VueAppDetailAsset extends AssetBundle {
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [];
	public $js = [
		'js/vue-app-legacy/vue-app-detail.js?v=20230105a',
	];
	public $depends = [];
}
