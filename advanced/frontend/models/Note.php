<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Note extends ActiveRecord
{
    /**
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function getList($page = 1,$pageSize = 10,$condition = [])
    {
        $where = Note::listCondition($condition);
        $count = Note::find()->where($where)->count();
        $list = Note::find()
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
        if(isset($condition['user_id']) && $condition['user_id']) {
            $where['user_id'] = $condition['user_id'];
        }
        return $where;
    }

    /**
     * 添加笔记
     */
    public function addNote($content,$user_id)
    {
        $data = [$user_id,$content,time()];
        $result = Yii::$app->db->createCommand()->batchInsert(Note::tableName(),
            ['user_id','content','create_time'],
            [$data]
        )->execute();
        if($result) {
            return ['ret'=>1];
        } else {
            return ['ret'=>0,'msg'=>'注册失败!'];
        }
    }


}