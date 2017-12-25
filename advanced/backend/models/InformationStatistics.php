<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use backend\models\Admin;

class InformationStatistics extends ActiveRecord
{

    /**
     * 获取统计信息
     */
    public function getInfo()
    {
        $return = [];

        $group = ['1'=>'碎碎念','2'=>'最爱','3'=>'用户','4'=>'管理员'];
        $terms = ['1'=>'总数','2'=>'今日','3'=>'昨日','4'=>'本周','5'=>'本月'];


        foreach($group as $k=>$v) {
            foreach($terms as $n=>$m) {

                switch ($n) {
                    case 1 :

                        break;



                }
                $admin = Admin::find()->where($where)->count();


                $data[] = '';
            }
            $return[] = $data;
        }
        $where = [];






        return $return;
    }


}