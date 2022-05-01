<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

class SubCategory extends ActiveRecord
{
    
    // what table in database that are used
    public static function tablename()
    {
        return '{{%Subcategorys}}';
    }

    public function rules()
    {
        [['name', 'description', 'required']];
    }

    // gets all subcategorys in datebase
    public function getSubcategory()
    {
        return SubCategory::find();
    }

    // gets subcategory with the right id
    public function getSubcategorybyid($id)
    {
        return SubCategory::find()->where(['id' => $id]);
    }

    
}