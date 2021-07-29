<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int|null $author
 * @property string|null $content
 * @property string|null $date
 */
class Comments extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }

    public function rules()
    {
        return [
            [['date'],'date','format'=>'php:Y-m-d'],
            [['date'],'default','value'=>date('Y-m-d')],
        ];
    }

    public function getAuthorModel()
    {
        return $this->findUser($this->author);
    }

    protected function findUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
}
