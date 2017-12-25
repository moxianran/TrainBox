/**
 * Created by yingrr on 17-11-14.
 */

function addSpan(obj){
    document.getElementById(obj).className = "glyphicon glyphicon-trash";
}

function rmSpan(obj){
    document.getElementById(obj).className = "";
}

function removes(love_id){

    $.ajax({
        url:"/?r=person/removelove",
        type:"post",
        beforeSend:beforeSend, //发送请求
        complete:complete,
        data:{
            love_id:love_id
        },
        dataType: 'json',
        success:function(data){
            console.log(data);

            if(data.result=="success"){
                //禁用提交按钮。防止点击起来没完
                $('#formSubmit').attr('disabled',true);
                art.dialog.tips(data.info+' | 正在跳转..', 3);

                window.location.href = "/index.php?r=person/index";

            }else{
                art.dialog.tips(data.info);
                //禁用提交按钮。防止点击起来没完
                $('#formSubmit').attr('disabled',true);
            }
        }
    });
}
function beforeSend(XMLHttpRequest){
    $("#showResult").append("<div><img src='/img/loading.gif' style='width:32px;height:32px;' /><div>");
}

function complete(XMLHttpRequest, textStatus){
    $("#showResult").empty();
}