<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Follow extends ActiveRecord
{
    /**
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function getList($page = 1,$pageSize = 10,$condition = [])
    {
        $where = Follow::listCondition($condition);
        $count = Follow::find()->where($where)->count();
        $list = Follow::find()
            ->where($where)
            ->orderBy('id DESC')
            ->offset(($page-1)*$pageSize)
            ->limit($pageSize)
            ->asArray()
            ->all();

        if(isset($list) && $list) {

            $model_user = new \frontend\models\User;

            foreach ($list as $k=>$v){
                $user = $model_user->find()
                    ->where(['id' => $v['from_user_id']])
                    ->asArray()->one();

                $list[$k]['nickname'] = $user['nickname'];
                $list[$k]['head_img'] = $user['head_img'];
                $list[$k]['first_charter'] = $this->getFirstCharter($user['email']);

            }
        }
        return [$list,$count];
    }

    /**
     * 获取条件
     */
    public function listCondition($condition)
    {
        if(empty($condition)) {
            return [];
        }

        //用户id
        if(isset($condition['to_user_id']) && $condition['to_user_id']) {
            $where['to_user_id'] = $condition['to_user_id'];
        }
        return $where;
    }

}