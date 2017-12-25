<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class LoveComment extends ActiveRecord
{
    /**
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function getList($page = 1,$pageSize = 10,$condition = [])
    {
        $where = LoveComment::listCondition($condition);

        $count = LoveComment::find()->where($where)->count();
        $page_all = ceil($count/$pageSize);
        $list = LoveComment::find()
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
                    ->where(['id' => $v['user_id']])
                    ->asArray()->one();

                $list[$k]['create_date'] = date("Y-m-d",$v['create_time']);

                $list[$k]['nickname'] = $user['nickname'];
                $list[$k]['head_img'] = $user['head_img'];
                $list[$k]['first_charter'] = $this->getFirstCharter($user['email']);

            }
        }
        return ['list' => $list,'page_all' => $page_all];
    }

    /**
     * 获取条件
     */
    public function listCondition($condition)
    {
        if(empty($condition)) {
            return [];
        }

        $where = [];
        //用户id
        if(isset($condition['love_id']) && $condition['love_id']) {
            $where['love_id'] = $condition['love_id'];
        }
        return $where;
    }

    /**
     * 添加评论
     */
    public function addComment($content,$love_id,$user_id)
    {
        $data = [$love_id,$user_id,$content,time()];
        $result = Yii::$app->db->createCommand()->batchInsert(LoveComment::tableName(),
            ['love_id','user_id','content','create_time'],
            [$data]
        )->execute();
        if($result) {
            return ['ret'=>1];
        } else {
            return ['ret'=>0,'msg'=>'添加失败!'];
        }
    }


}