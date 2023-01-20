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
		'js/vue-app/vue-helper.js?v=20221225a',
		'js/vue-app/vue-helper-entry.js?v=20221223a',
		'js/vue-app/vue-helper-list.js?v=20221207a',
		'js/vue-app/vue-helper-detail.js?v=20221207a',
		'js/vue-app/vue-app-all.js?v=20230101a',
	];
	public $depends = [];
}
