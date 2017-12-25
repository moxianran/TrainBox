<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Admin extends ActiveRecord
{
    public $username;
    public $password;
    public $nickname;
    public $update_time;
    public $create_time;

    public function rules()
    {
        return [
            // 在"register" 场景下 email 和 password 必须有值
            [[ 'username', 'password'], 'required', 'on' => 'register'],

            // 在 "login" 场景下 和 password 必须有值
            [[ 'username', 'password'], 'required', 'on' => 'login'],

            // 在 "login" 场景下 和 password 必须有值
            [[ 'nickname', 'birthday', 'head_img', 'website'], 'required', 'on' => 'editUser'],
        ];
    }

    /**
     * 登录
     */
    public function login()
    {
        $user = Admin::find()
            ->where(['username' => $this->username])
            ->asArray()
            ->one();

        if (!$user) {
            return ['ret'=>0,'msg'=>'该用户名不存在!'];
        }

        if($user['password'] != md5($this->password."_".$user['salt'])) {
            return ['ret'=>0,'msg'=>'密码输入错误!'];
        }

        return ['ret'=>1,'data'=>$this->username];
    }

    /**
     * 注册
     */
    public function register()
    {
        $user = User::find()
            ->where(['email' => $this->email])
            ->asArray()
            ->one();

        if ($user) {
            return ['ret'=>0,'msg'=>'该邮箱已被注册!'];
        }

        $salt = rand(1000,9999);
        $password = md5($this->password."_".$salt);

        $data = [$this->email, $password, $salt, $this->email,time()];

        $result = Yii::$app->db->createCommand()->batchInsert(User::tableName(),
            ['email','password','salt','nickname','create_time'],
            [$data]
        )->execute();

        if($result) {
            return ['ret'=>1,'data'=>$this->email];
        } else {
            return ['ret'=>0,'msg'=>'注册失败!'];
        }
    }

    /**
     * 编辑用户信息
     */
    public function editUser($user_id)
    {
        $update_data = [
            'nickname' => $this->nickname,
            'head_img' => $this->head_img,
            'birthday' => strtotime($this->birthday),
            'website' => $this->website,
            'update_time' => time(),
        ];
        $result = User::updateAll($update_data,'id = '.$user_id);
        return $result;
    }

    /**
     * 帐号信息详情
     */
    public function getDetail($id)
    {
        $admin = Admin::find()
            ->where(['id' => $id])
            ->asArray()
            ->one();
        return $admin;
    }

}