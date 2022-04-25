<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
   
    public $imageFile;
    public $hight;
    public $width;
    public $image;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
        ];
    }
    
    public function upload()
    {
        //to make the upload path consistent.
        //$path = $this->uploadPath() . $this->imageFile->namespace . '.' . $this->imageFile->extension;
            // to validate image and save to uploads folder.
        if ($this->validate()) {   
                $this->imageFile->saveAs('uploads/'.$this->imageFile->basename.'.'.$this->imageFile->extension);
            
                $this->image = $this->imageFile;
            
            return true;
        } else {
            
            return false;
        }
    }
    // The path to where the image should be uploaded
    public function uploadPath(){
        return 'uploads/';
    }

    public function resize(){
        /**$imagevaiables = getimagesize($this->imageFile);
        $model->height = $imagevaiables->height;**/
    }
}
