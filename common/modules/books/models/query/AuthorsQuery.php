<?php

namespace common\modules\books\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Authors]].
 *
 * @see \common\modules\books\models\BookAuthors
 */
class AuthorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\books\models\Authors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\books\models\Authors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
