<?php
/**
 * Created by IntelliJ IDEA.
 * User: ying
 * Date: 17-11-15
 * Time: 上午11:00
 */
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/head_img/';
            $name = time().rand(10000,99999) . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path.$name);
            return ['ret' => 1,'img' => $path.$name];
        } else {
            return ['ret' => 0];
        }
    }
}