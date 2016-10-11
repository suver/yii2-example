<?php
/**
 * @link http://www.iisns.com/
 * @copyright Copyright (c) 2015 iiSNS
 * @license http://www.iisns.com/license/
 */

namespace suver\editor;

use yii\web\AssetBundle;

/**
 * @author Shiyang <dr@shiyang.me>
 */
class EditorAsset extends AssetBundle
{
    public $sourcePath = '@vendor/suver/yii2-editor/assets';
    public $js = [
        'simplemde.min.js'
    ];
    public $css = [
        'simplemde.min.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
