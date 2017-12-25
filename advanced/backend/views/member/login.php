<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>火车厢后台管理</title>
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <!--必要样式-->
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href="css/demo.css" rel="stylesheet" type="text/css" />
    <link href="css/loaders.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class='login'>
    <div class='login_title'>
        <span>管理员登录</span>
    </div>
    <div class='login_fields'>
        <form id="loginForm" method="post">
            <input name="_csrf-backend" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
            <div class='login_fields__user'>
                <div class='icon'>
                    <img src='img/user_icon_copy.png'>
                </div>
                <input name="Admin[username]" placeholder='用户名' maxlength="16" type='text' autocomplete="off" />
                <div class='validation'>
                    <img alt="" src='img/tick.png'>
                </div>
            </div>
            <div class='login_fields__password'>
                <div class='icon'>
                    <img src='img/lock_icon_copy.png'>
                </div>
                <input name="Admin[password]" placeholder='密码' maxlength="16" type='password' autocomplete="off">
                <div class='validation'>
                    <img alt="" src='img/tick.png'>
                </div>
            </div>
            <div class='login_fields__submit'>
                <input type='button' value='登录'>
            </div>
        </form>
    </div>
    <div class='success'>
    </div>
    <div class='disclaimer'>
        <p>欢迎登陆火车厢后台管理系统</p>
    </div>
</div>
<div class='authent'>
    <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
        <div class="loader-inner ball-clip-rotate-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <p>认证中...</p>
</div>
<div class="OverWindows"></div>
<link href="layui/css/layui.css" rel="stylesheet" type="text/css" />
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src='js/stopExecutionOnTimeout.js?t=1'></script>
<script src="layui/layui.js" type="text/javascript"></script>
<script src="js/Particleground.js" type="text/javascript"></script>
<script src="js/Treatment.js" type="text/javascript"></script>
<script src="js/jquery.mockjax.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).keypress(function (e) {
        // 回车键事件
        if (e.which == 13) {
            $('input[type="button"]').click();
        }
    });

    //粒子背景特效
    $('body').particleground({
        dotColor: '#E8DFE8',
        lineColor: '#133b88'
    });
    $('input[name="pwd"]').focus(function () {
        $(this).attr('type', 'password');
    });
    $('input[type="text"]').focus(function () {
        $(this).prev().animate({ 'opacity': '1' }, 200);
    });
    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({ 'opacity': '.5' }, 200);
    });
    $('input[name="login"],input[name="pwd"]').keyup(function () {
        var Len = $(this).val().length;
        if (!$(this).val() == '' && Len >= 5) {
            $(this).next().animate({
                'opacity': '1',
                'right': '30'
            }, 200);
        } else {
            $(this).next().animate({
                'opacity': '0',
                'right': '20'
            }, 200);
        }
    });

    layui.use('layer', function () {
        //非空验证
        $('input[type="button"]').click(function () {
            var login = $('input[name="login"]').val();
            var pwd = $('input[name="pwd"]').val();
            if (login == '') {
                ErroAlert('请输入您的账号');
            } else if (pwd == '') {
                ErroAlert('请输入密码');
            } else {
                //认证中..
                $('.login').addClass('test'); //倾斜特效
                setTimeout(function () {
                    $('.login').addClass('testtwo'); //平移特效
                }, 300);
                setTimeout(function () {
                    $('.authent').show().animate({ right: -320 }, {
                        easing: 'easeOutQuint',
                        duration: 600,
                        queue: false
                    });
                    $('.authent').animate({ opacity: 1 }, {
                        duration: 200,
                        queue: false
                    }).addClass('visible');
                }, 500);

                //登陆
                $.ajax({
                    url:"/?r=member/login",
                    type:"post",
                    data:$("#loginForm").serialize(),
                    dataType: 'json',
                    success:function(data){
                        //认证完成
                        setTimeout(function () {
                            $('.authent').show().animate({ right: 90 }, {
                                easing: 'easeOutQuint',
                                duration: 600,
                                queue: false
                            });
                            $('.authent').animate({ opacity: 0 }, {
                                duration: 200,
                                queue: false
                            }).addClass('visible');
                            $('.login').removeClass('testtwo'); //平移特效
                        }, 2000);
                        setTimeout(function () {
                            $('.authent').hide();
                            $('.login').removeClass('test');
                            if (data.result == 'success') {
                                //登录成功
                                $('.login div').fadeOut(100);
                                $('.success').fadeIn(1000);
                                $('.success').html('登录成功,欢迎回来!');
                                setTimeout(function () {
                                    window.location.href = "/?r=site/index";
                                }, 2000);
                            } else {
                                layer.msg('帐号或密码错误');
                            }
                        }, 2400);


                    }
                });
            }
        })
    })

</script>
</body>
</html>
