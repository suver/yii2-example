<?php

namespace common\modules\uploads\models;

use Yii;

/**
 *
 *
 * Interface FileInterface
 * @package common\modules\uploads\models
 */
interface FileInterface
{
    public function getName();
    public function getExtension();
}
