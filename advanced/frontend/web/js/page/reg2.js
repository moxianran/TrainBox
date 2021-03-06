
$(function() {

    $('#login #newPassword').focus(function() {
        $('#owl-login').addClass('password');
    }).blur(function() {
        $('#owl-login').removeClass('password');
    });
});

function em(email){

    var Regex = /^(?:\w+\.?)*\w+@(?:\w+\.)*\w+$/;

    if (Regex.test(email)){

        return true;

    }else{
        return false;
    }

}

$(document).ready(function() {


    if( $('#formSubmit').val().length<6){

        $('#formSubmit').attr('disabled',true);
    }


    $('#signupForm').on('keyup', '#newPassword', function(event) {
        if($('#newPassword').val().length>=6 && em($('#newAccount').val()))
            $('#formSubmit').removeAttr('disabled').val($('#formSubmit').data('activetext') );
        else
            $('#formSubmit').attr('disabled',true);
    });

    $("#newAccount").change(function(){
        if($('#newPassword').val().length>=6 && em($('#newAccount').val()))
            $('#formSubmit').removeAttr('disabled').val($('#formSubmit').data('activetext') );
        else
            $('#formSubmit').attr('disabled',true);
    });


    //signup em....
    $("#formSubmit").click(function(){
        $.ajax({
            url:"/?r=member/register",
            type:"post",
            beforeSend:beforeSend, //发送请求
            complete:complete,
            data:$("#signupForm").serialize(),
            dataType: 'json',
            success:function(msg){

                if(msg.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    var uri = $("#redirectURI").val();
                    if(uri.trim()){
                        window.location.href = uri;
                    }else{
                        window.location.href = "/";
                    }
                }else{
                    art.dialog.tips(msg.info);
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    })

    function beforeSend(XMLHttpRequest){
        $("#showResult").append("<div><img src='/img/loading.gif' style='width:32px;height:32px;' /><div>");
    }

    function complete(XMLHttpRequest, textStatus){
        $("#showResult").empty();
    }

});
