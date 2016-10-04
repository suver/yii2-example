<?php

namespace common\modules\books\models\query;

/**
 * This is the ActiveQuery class for [[\common\modules\books\models\Catalog]].
 *
 * @see \common\modules\books\models\BookCatalog
 */
class CatalogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\books\models\Catalog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\books\models\Catalog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
