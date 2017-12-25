<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use backend\models\Admin;


class MemberController extends Controller
{
    public $layout = false;

    /**
     * 登录
     */
    public function actionLogin()
    {
        $model = new Admin(['scenario' => 'login']);

        if(Yii::$app->request->isPost) {
            if($model->load(Yii::$app->request->post()) && $model->validate()){

                $result = $model->login();
                if($result['ret'] == 1) {
                    //设置session
                    $username = $result['data'];
                    $user = $model->find()->where(['username' => $username])->asArray()->one();

                    $session = Yii::$app->session;
                    $session->set('admin_id' ,$user['id']);

                    return $this->asJson([
                        'result' => 'success',
                        'info' => '登录成功'
                    ]);
                } else {
                    return $this->asJson([
                        'result' => 'fail',
                        'info' => $result['msg']
                    ]);
                }
            } else {
                return $this->asJson([
                    'result' => 'fail',
                    'info' => '登录失败!'
                ]);
            }
        }
        return $this->render('login');
    }







}
