<?php
/**
 * @link http://www.iisns.com/
 * @copyright Copyright (c) 2015 iiSNS
 * @license http://www.iisns.com/license/
 */

namespace suver\editor;

use yii\helpers\Html;
use yii\base\Widget;

class TransformationWidget extends Widget
{
    public $message;
    public $class = '\suver\editor\TransformationMarkdown';

    public function init()
    {
        parent::init();

        if ($this->message === null) {
            ob_start();
        }
    }

    public function run()
    {
        if(empty($this->message)) {
            $this->message = ob_get_clean();
        }
        return $this->render($this->message);
    }

    public function render($string) {
        $object = new $this->class();
        return $object->transformation($string);
    }
}

