//绑定捂住眼睛的动作
$(function() {

    $('#login #password').focus(function() {
        $('#owl-login').addClass('password');
    }).blur(function() {
        $('#owl-login').removeClass('password');
    });
});

$(document).ready(function() {


    $('#loginForm').on('keyup', '#password', function(event) {
        if($('#password').val().length>=6)
            $('#formSubmit').removeAttr('disabled').val($('#formSubmit').data('activetext') );
        else
            $('#formSubmit').attr('disabled',true);
    });

    $(document).keydown(function(event){
        if(event.keyCode==13){
            var cansub = $('#formSubmit').attr('disabled');
            var can = (cansub == 'disabled');
            if(!cansub){//没有禁用

                $("#formSubmit").click();
            }

        }
    });

    $('#formSubmit').click(function(){
        $.ajax({
            url:"/?r=member/login",
            type:"post",
            beforeSend:beforeSend, //发送请求
            complete:complete,
            data:$("#loginForm").serialize(),
            dataType: 'json',
            success:function(data){
                console.log(data);

                if(data.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    art.dialog.tips(data.info+' | 正在跳转..', 3);
                    var uri = $("#redirectURI").val();
                    if(uri.trim()){
                        window.location.href = uri;
                    }else{

                        window.location.href = "/";
                    }
                }else{
                    art.dialog.tips(data.info);
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    });

    function beforeSend(XMLHttpRequest){
        $("#showResult").append("<div><img src='/img/loading.gif' style='width:32px;height:32px;' /><div>");
    }

    function complete(XMLHttpRequest, textStatus){
        $("#showResult").empty();
    }


});