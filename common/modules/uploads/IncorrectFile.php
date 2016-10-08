<?php

namespace common\modules\uploads;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use common\modules\uploads\models\UploadsInterface;

use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Image\Color;
use Imagine\Image\ImageInterface;
use Imagine\Image\ImagineInterface;
use Imagine\Image\ManipulatorInterface;
use Imagine\Image\Point;
use common\modules\uploads\ImageModifedInterface;

use Imagine\Exception\Exception as ImagineException;

/**
 * Class IncorectFile
 * @package common\modules\uploads\models
 */
class IncorectFile
{

    protected $model;
    protected $thumbnail;

    public function __construct($model, $thumbnail)
    {
        $this->model = $model;
        $this->thumbnail = $thumbnail;
    }


    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    public function getName() {
        return $this->model->name;
    }

    public function getExtension() {
        return $this->model->extension;
    }

    public function delete() {
        return $this->model->delete();
    }

}
