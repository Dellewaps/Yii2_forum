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
        
            //$path = $this->uploadPath() . $this->imageFile->namespace . '.' . $this->imageFile->extension;
            if ($this->validate()) {
                //$time = time();
    
            $this->imageFile->saveAs('uploads/'.$this->imageFile->basename.'.'.$this->imageFile->extension);
            // if (is_writable($this->imageFile)) {
            //     echo 'The file is writable';
            // } else {
            //     echo 'The file is not writable';
            // }
            $this->image = $this->imageFile;
            
            return true;
        } else {
            
            return false;
        }
    }

    public function uploadPath(){
        return 'uploads/';
    }

    public function resize(){
        /**$imagevaiables = getimagesize($this->imageFile);
        $model->height = $imagevaiables->height;**/
    }
}
