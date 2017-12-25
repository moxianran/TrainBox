<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Love extends ActiveRecord
{
    /**
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function getList($page = 1,$pageSize = 10,$condition = [])
    {
        $where = Love::listCondition($condition);
        $count = Love::find()->where($where)->count();
        $list = Love::find()
            ->where($where)
            ->orderBy('id DESC')
            ->offset(($page-1)*$pageSize)
            ->limit($pageSize)
            ->asArray()
            ->all();

        if(isset($list) && $list) {

            $model_love_remember = new \frontend\models\LoveRemember();
            $model_love_comment = new \frontend\models\LoveComment();

            foreach ($list as $k=>$v){

                //点赞数
                $count_remember = $model_love_remember->find()
                    ->where(['love_id' => $v['id']])
                    ->count();
                $list[$k]['count_remember'] = $count_remember;

                //评论数
                $count_comment = $model_love_comment->find()
                    ->where(['love_id' => $v['id']])
                    ->count();
                $list[$k]['count_comment'] = $count_comment;
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
        if(isset($condition['user_id']) && $condition['user_id']) {
            $where['user_id'] = $condition['user_id'];
        }
        return $where;
    }

    /**
     * 添加最爱
     */
    public function addLove($pic,$title,$user_id)
    {
        $data = [$user_id,$title,$pic,time()];
        $result = Yii::$app->db->createCommand()->batchInsert(Love::tableName(),
            ['user_id','title','pic','create_time'],
            [$data]
        )->execute();
        if($result) {
            return ['ret'=>1];
        } else {
            return ['ret'=>0,'msg'=>'添加失败!'];
        }
    }


    /**
     * 删除最爱
     */
    public function removeLove($love_id,$user_id)
    {
        $model = Love::findOne($love_id);
        $result = $model->delete();

        if($result) {
            return ['ret'=>1];
        } else {
            return ['ret'=>0,'msg'=>'删除失败!'];
        }
    }

    /**
     * 获取最爱详情
     */
    public function getDetail($id)
    {
        $detail = Love::find()
            ->where(['id'=>$id])
            ->asArray()
            ->one();

        if(isset($detail) && $detail) {

            $model_user = new \frontend\models\User;
            $model_love_remember = new \frontend\models\LoveRemember();
            $model_love_comment = new \frontend\models\LoveComment();

            $user = $model_user->find()
                ->where(['id' => $detail['user_id']])
                ->asArray()->one();
            $detail['nickname'] = $user['nickname'];
            $detail['head_img'] = $user['head_img'];
            $detail['first_charter'] = $this->getFirstCharter($user['email']);

            //点赞数
            $count_remember = $model_love_remember->find()
                ->where(['love_id' => $detail['id']])
                ->count();
            $detail['count_remember'] = $count_remember;

            //评论数
            $count_comment = $model_love_comment->find()
                ->where(['love_id' => $detail['id']])
                ->count();
            $detail['count_comment'] = $count_comment;
        }
        return $detail;
    }

}