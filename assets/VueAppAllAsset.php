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
 * Vue Application for Entry Form Page
 *
 * @author Munaja <munawwirul.jamal@gmail.com>
 * @since 1.0
 * 
 * some repetitive assets are defined here instead of in the AppAsset
 * because of order of rendering
 */
class VueAppAllAsset extends AssetBundle {
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [];
	public $js = [
		'js/vue-helper.js?v=20230110a',
		'js/vue-helper-entry.js?v=20230110a',
		'js/vue-helper-list.js?v=20230110a',
		'js/vue-helper-detail.js?v=20230110a',
		'js/vue-app-all.js?v=20230110a',
	];
	public $depends = [];
}
