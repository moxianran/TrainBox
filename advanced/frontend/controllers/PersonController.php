<?php
/**
 * Created by IntelliJ IDEA.
 * User: ying
 * Date: 17-11-14
 * Time: 上午11:20
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use frontend\models\Note;
use frontend\models\Follow;
use frontend\models\User;
use frontend\models\Love;

use frontend\models\UploadForm;
use yii\web\UploadedFile;

/**
 * 个人档案
 */
class PersonController extends Controller
{
    public $enableCsrfValidation = false;
    public $pageSize = 10;

    /**
     * 个人档案-最爱
     */
    public function actionIndex()
    {
        //用户档案信息
        $user = $this->getUser();
        $user_id = Yii::$app->session->get('user_id');

        $page = $request = Yii::$app->request->get('page', 1);
        //获取最爱数据和总数
        list($list,$count) = Love::getList($page,$this->pageSize,['user_id' => $user_id]);
        $pagination = new Pagination(['totalCount' => $count,'pageSize' => $this->pageSize]);

        $data = [
            'user' => $user,
            'list' => $list,
            'count' => $count,
            'pagination' => $pagination
        ];
        return $this->render('index',$data);
    }

    /**
     * 个人档案-最爱-删除
     */
    public function actionRemovelove()
    {
        if(Yii::$app->request->isPost) {

            $love_id = Yii::$app->request->post('love_id');

            $user_id = Yii::$app->session->get('user_id');

            $result = Love::removeLove($love_id,$user_id);

            if ($result['ret'] == 1) {
                return $this->asJson([
                    'result' => 'success',
                    'info' => '添加成功'
                ]);
            } else {
                return $this->asJson([
                    'result' => 'fail',
                    'info' => '添加失败'
                ]);
            }
        }
    }

    /**
     * 个人档案-最爱-添加
     */
    public function actionAddlove()
    {
        if(Yii::$app->request->isPost) {

            $pic = Yii::$app->request->post('pic');
            $title = Yii::$app->request->post('title');
            $user_id = Yii::$app->session->get('user_id');

            $result = Love::addLove($pic,$title,$user_id);

            if ($result['ret'] == 1) {
                return $this->asJson([
                    'result' => 'success',
                    'info' => '添加成功'
                ]);
            } else {
                return $this->asJson([
                    'result' => 'fail',
                    'info' => '添加失败'
                ]);
            }
        }
        return $this->render('addlove');
    }

    /**
     * 个人档案-笔记
     */
    public function actionNote()
    {
        //用户档案信息
        $user = $this->getUser();
        $user_id = Yii::$app->session->get('user_id');

        $page = $request = Yii::$app->request->get('page', 1);
        //获取笔记数据和总数
        list($list,$count) = Note::getList($page,$this->pageSize,['user_id' => $user_id]);
        $pagination = new Pagination(['totalCount' => $count,'pageSize' => $this->pageSize]);

        $data = [
            'user' => $user,
            'list' => $list,
            'count' => $count,
            'pagination' => $pagination
        ];
        return $this->render('note',$data);
    }

    /**
     * 个人档案-添加笔记
     */
    public function actionAddnote()
    {

        if(Yii::$app->request->isPost) {

            $content = Yii::$app->request->post('content');

            $user_id = Yii::$app->session->get('user_id');

            $result = Note::addNote($content,$user_id);

            if ($result['ret'] == 1) {
                return $this->asJson([
                    'result' => 'success',
                    'info' => '添加成功'
                ]);
            } else {
                return $this->asJson([
                    'result' => 'fail',
                    'info' => '添加失败'
                ]);
            }
        }

        //用户档案信息
        $user = $this->getUser();
        $data = [
            'user' => $user,
        ];
        return $this->render('addnote',$data);
    }

    /**
     * 个人档案-粉丝
     */
    public function actionFans()
    {
        //用户档案信息
        $user = $this->getUser();
        $user_id = Yii::$app->session->get('user_id');

        $page = $request = Yii::$app->request->get('page', 1);
        //获取粉丝数据和总数
        list($list,$count) = Follow::getList($page,$this->pageSize,['to_user_id' => $user_id]);
        $pagination = new Pagination(['totalCount' => $count,'pageSize' => $this->pageSize]);

        $data = [
            'user' => $user,
            'list' => $list,
            'count' => $count,
            'pagination' => $pagination
        ];
        return $this->render('fans',$data);
    }

    /**
     * 编辑用户信息
     */
    public function actionEdit()
    {
        $model_user = new User(['scenario' => 'editUser']);
        if(Yii::$app->request->isPost) {

            if ($model_user->load(Yii::$app->request->post()) && $model_user->validate()) {

                $user_id = Yii::$app->session->get('user_id');

                $result = $model_user->editUser($user_id);

                if ($result) {
                    return $this->asJson([
                        'result' => 'success',
                        'info' => '更新成功'
                    ]);
                } else {
                    return $this->asJson([
                        'result' => 'fail',
                        'info' => '更新失败'
                    ]);
                }
            } else {
                return $this->asJson([
                    'result' => 'fail',
                    'info' => '更新失败'
                ]);
            }
        }

        //用户档案信息
        $user = $this->getUser();
        $model = new UploadForm();
        $data = [
            'user' => $user,
            'model' => $model
        ];
        return $this->render('edit',$data);
    }

    /**
     * 上传图片
     * @return Response
     */
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            $result = $model->upload();
            if ($result['ret'] == 1) {
                return $this->asJson([
                    'result' => 'success',
                    'img' => $result['img']
                ]);
            } else {
                return $this->asJson([
                    'result' => 'success',
                    'msg' => '上传失败'
                ]);
            }
        }
    }

    /**
     * 获取用户信息
     */
    private function getUser()
    {
        $user_id = Yii::$app->session->get('user_id');

        $model_user = new \frontend\models\User;
        $user = $model_user->find()
            ->where(['id' => $user_id])
            ->asArray()->one();

        $user['first_charter'] = $this->getFirstCharter($user['email']);
        return $user;
    }

    /**
     * 获取中文字符拼音首字母
     * @param $str
     * @return null|string
     */
    public function getFirstCharter($str)
    {
        if (empty($str)) {
            return '';
        }

        $str = mb_substr($str,0,1);
        if(is_numeric($str)) {
            return $str;
        }

        $fchar = ord($str{0});
        if ($fchar >= ord('A') && $fchar <= ord('z')) return strtoupper($str{0});
        $s1 = iconv('UTF-8', 'gb2312', $str);
        $s2 = iconv('gb2312', 'UTF-8', $s1);
        $s = $s2 == $str ? $s1 : $str;
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if ($asc >= -20319 && $asc <= -20284) return 'A';
        if ($asc >= -20283 && $asc <= -19776) return 'B';
        if ($asc >= -19775 && $asc <= -19219) return 'C';
        if ($asc >= -19218 && $asc <= -18711) return 'D';
        if ($asc >= -18710 && $asc <= -18527) return 'E';
        if ($asc >= -18526 && $asc <= -18240) return 'F';
        if ($asc >= -18239 && $asc <= -17923) return 'G';
        if ($asc >= -17922 && $asc <= -17418) return 'H';
        if ($asc >= -17417 && $asc <= -16475) return 'J';
        if ($asc >= -16474 && $asc <= -16213) return 'K';
        if ($asc >= -16212 && $asc <= -15641) return 'L';
        if ($asc >= -15640 && $asc <= -15166) return 'M';
        if ($asc >= -15165 && $asc <= -14923) return 'N';
        if ($asc >= -14922 && $asc <= -14915) return 'O';
        if ($asc >= -14914 && $asc <= -14631) return 'P';
        if ($asc >= -14630 && $asc <= -14150) return 'Q';
        if ($asc >= -14149 && $asc <= -14091) return 'R';
        if ($asc >= -14090 && $asc <= -13319) return 'S';
        if ($asc >= -13318 && $asc <= -12839) return 'T';
        if ($asc >= -12838 && $asc <= -12557) return 'W';
        if ($asc >= -12556 && $asc <= -11848) return 'X';
        if ($asc >= -11847 && $asc <= -11056) return 'Y';
        if ($asc >= -11055 && $asc <= -10247) return 'Z';
        return null;
    }
}