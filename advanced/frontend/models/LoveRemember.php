<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class LoveRemember extends ActiveRecord
{
    /**
     * 点赞
     */
    public function addRemember($love_id,$user_id)
    {
        $data = [$love_id,$user_id,time()];
        $result = Yii::$app->db->createCommand()->batchInsert(LoveRemember::tableName(),
            ['love_id','user_id','create_time'],
            [$data]
        )->execute();
        if($result) {
            return ['ret'=>1];
        } else {
            return ['ret'=>0,'msg'=>'添加失败!'];
        }
    }
}