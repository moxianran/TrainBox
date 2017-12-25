<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Admin;
use backend\models\InformationStatistics;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = false;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * 首页
     */
    public function actionIndex()
    {
        $admin_id = Yii::$app->session->get('admin_id');

        $admin_info = Admin::getDetail($admin_id);

        $data = [
            'admin_info' => $admin_info,
        ];

        return $this->render('index',$data);
    }

    /**
     * 欢迎页
     */
    public function actionWelcome()
    {
        $admin_id = Yii::$app->session->get('admin_id');
        $admin_info = Admin::getDetail($admin_id);

        $information_statistics = InformationStatistics::getInfo();

        $data = [
            'admin_info' => $admin_info,

            'information_statistics' => $information_statistics
        ];
        return $this->render('welcome',$data);
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

}
