<?php

namespace common\modules\uploads\models;

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
 * Class File
 * @package common\modules\uploads\models
 */
class ImageFile
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

    protected function thumbnail(UploadsInterface $model, $size=false)
    {
        $params = $this->defaultParams;
        if ($size && isset($this->thumbnail[$size])) {
            $params = ArrayHelper::merge($params, $this->thumbnail[$size]);
            $size = isset($params['size']) ? $params['size'] : false;
        }
        $prefix = isset($params['prefix']) ? $params['prefix'] . '_' : '';

        if($size) {
            if (is_numeric($size)) {
                $thumbnail_width = $size;
                $thumbnail_height = false;
            } else if (preg_match("#^[xX]([\d]+)$#isUu", $size, $math)) {
                $thumbnail_width = false;
                $thumbnail_height = $math[1];
            } else if (preg_match("#^([\d]+)[xX]([\d]+)$#isUu", $size, $math)) {
                $thumbnail_width = $math[1];
                $thumbnail_height = $math[2];
            } else {
                $thumbnail_width = false;
                $thumbnail_height = false;
            }
        }

        $path = $this->getPath($model);
        if(!$size) {
            $image = $path . '/' . $model->getName() . '.' . $model->getExtension();
        }
        else {
            $image = $path . '/' . $prefix . $model->getName() . '_' . $size . '.' . $model->getExtension();
            $imageFullPath = Yii::getAlias('@storage/' . $image);
            if(!file_exists($imageFullPath)) {
                $imageSource = Yii::getAlias('@storage/' . $path . '/' . $model->getName() . '.' . $model->getExtension());
                $this->_thumbnail($imageSource, $imageFullPath, $thumbnail_width, $thumbnail_height, $params);
            }
        }
        return $image;
    }

    protected function _thumbnail($source_path, $thumbnail_path, $thumbnail_width, $thumbnail_height, $params = [])
    {
        $imagine = Image::getImagine();

        $image = $imagine->open($source_path);
        $currentSize  = $image->getSize();

        $mode = ImageInterface::THUMBNAIL_OUTBOUND;
        //$mode = ImageInterface::THUMBNAIL_INSET;


        if(empty($thumbnail_width)) $thumbnail_width = $currentSize->getWidth();
        if(empty($thumbnail_height)) $thumbnail_height = $currentSize->getHeight();

        $size = new Box($thumbnail_width, $thumbnail_height);

        if($params['modifedObject']) {
            if($params['modifedObject'] instanceof ImageModifedInterface) {
                throw new Exception("'modifedObject' not implement from ImageModifedInterface interface");
            }

            return $params['modifedObject']->execute($source_path, $thumbnail_path, $params);
        }
        else if($params['animate'] && count($image->layers()) > 1) {
            $imageNew = $imagine->create($size);
            $imageNewLayers = $imageNew->layers();

            $layers = $image->layers();
            foreach ($layers as $frame) {
                $imageNewLayers->add($frame->resize($size));
            }

            return $imageNew->save($thumbnail_path, $params);
        }
        else if(!$params['animate'] && count($image->layers()) > 1) {
            $imageNew = $imagine->create($size);
            $imageNewLayers = $imageNew->layers();

            $layers = $image->layers();
            $imageNewLayers->add($layers[0]->resize($size));

            return $imageNew->save($thumbnail_path, $params);
        }
        else {
            $image = $image->thumbnail($size, $mode);
            return $image->save($thumbnail_path, $params);
        }

        return false;
    }

}
