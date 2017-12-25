<?php
/**
 * Created by IntelliJ IDEA.
 * User: ying
 * Date: 17-11-13
 * Time: 下午3:42
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\User;
use yii\web\Response;

/**
 * 用户
 */
class MemberController extends Controller
{

    /**
     * 登录
     */
    public function actionLogin()
    {
        $model_user = new User(['scenario' => 'login']);

        if(Yii::$app->request->isPost) {
            if($model_user->load(Yii::$app->request->post()) && $model_user->validate()){

                $result = $model_user->login();

                if($result['ret'] == 1) {

                    //设置session
                    $email = $result['data'];
                    $user = $model_user->find()->where(['email' => $email])->asArray()->one();

                    $session = Yii::$app->session;
                    $session->set('user_id' ,$user['id']);

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
                    'info' => '登录失败'
                ]);
            }
        }

        //设置标题
        $this->getView()->title = '登录-火车厢';
        return $this->render('login');
    }

    /**
     * 注册
     * Yii::$app->db->getLastInsertedID();
     */
    public function actionRegister()
    {
        $model_user = new User(['scenario' => 'register']);

        if(Yii::$app->request->isPost) {
            if($model_user->load(Yii::$app->request->post()) && $model_user->validate()){

                $result = $model_user->register();

                if($result['ret'] == 1) {

                    //设置session
                    $email = $result['data'];
                    $user = $model_user->find()->where(['email' => $email])->asArray()->one();

                    $session = Yii::$app->session;
                    $session->set('user_id' ,$user['id']);

                    return $this->asJson([
                        'result' => 'success',
                        'info' => '注册成功'
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
                    'info' => '注册失败'
                ]);
            }
        }

        //设置标题
        $this->getView()->title = '注册-火车厢';
        return $this->render('register');
    }

    /**
     * 退出登录,并返回首页
     */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->remove('user_id');
        return $this->redirect(['/site/index']);
    }

}