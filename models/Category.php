<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

class Category extends ActiveRecord
{
    
     // what table in database that are used
    public static function tablename()
    {
        return '{{%Categorys}}';
    }

    public function rules()
    {
        [['name', 'description', 'required']];
    }

    // gets all categorys in datebase
    public function getCategory()
    {
        return Category::find();
    }

    // gets category with the right id
    public function getCategorybyid($id)
    {
        
        return Category::find()->where(['id' => $id]);
    }
}