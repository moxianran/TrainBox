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
use frontend\models\Love;
use frontend\models\LoveComment;
use frontend\models\LoveRemember;
use yii\web\Response;
use yii\data\Pagination;

/**
 * 最爱
 */
class LoveController extends Controller
{
    public $enableCsrfValidation = false;
    public $pageSize = 1;

    /**
     * 最爱列表
     */
    public function actionIndex()
    {
        $page = $request = Yii::$app->request->get('page', 1);

        //获取数据和总数
        list($list,$count) = Love::getList($page,$this->pageSize);

        $pagination = new Pagination(['totalCount' => $count,'pageSize' => $this->pageSize]);

        $data = [
            'list' => $list,
            'count' => $count,
            'pagination' => $pagination
        ];
        return $this->render('index',$data);
    }

    /**
     *　最爱详情
     */
    public function actionDetail()
    {
        $id = $request = Yii::$app->request->get('id');
        $detail = Love::getDetail($id);

        $data = [
            'detail' => $detail,
        ];
        return $this->render('detail',$data);
    }

    /**
     * 评论列表
     */
    public function actionComment()
    {
        if(Yii::$app->request->isPost) {
            $page_id = $request = Yii::$app->request->post('page_id', 1);
            $love_id = $request = Yii::$app->request->post('love_id');
            $list = LoveComment::getList($page_id,$this->pageSize,['love_id'=>$love_id]);
            return $this->asJson($list);
        }
    }

    /**
     * 点赞
     */
    public function actionAddremember()
    {
        $love_id = Yii::$app->request->post('love_id');
        $user_id = Yii::$app->session->get('user_id');

        $result = LoveRemember::addRemember($love_id,$user_id);

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

    /**
     * 添加评论
     */
    public function actionAddcomment()
    {
        $content = Yii::$app->request->post('content');
        $love_id = Yii::$app->request->post('love_id');

        $user_id = Yii::$app->session->get('user_id');

        $result = LoveComment::addComment($content,$love_id,$user_id);

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