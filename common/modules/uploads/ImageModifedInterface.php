<?php

namespace common\modules\uploads\models;



interface  ImageModifedInterface
{
    public function execute($source_path, $destinct_path);
}
