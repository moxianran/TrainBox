var tail_slug = $("#J_tail_slug").val();

$(function(){
    $('#user_nick').datepicker({
        format: 'yyyy-mm-dd',
        autoclose:true
    });
})

function saves(){
    var newpwd1=$("#new_password").val();
    var newpwd2=$("#new_password_confirmation").val();
    var slug = $("#tail_slug").val();
    if(newpwd2!=newpwd1&&newpwd1!=""&&newpwd1!=''&&newpwd1!=null){//修改密码填了不一致
        art.dialog.alert('2次密码不一致');
        return;
    }
    if(slug && slug!=tail_slug){
        $.ajax({
            url:"/cm/tailFlag",
            type:"post",
            data:{"tail":slug},
            success:function(msg){
                if(msg=="exist"){//存在
                    art.dialog.tips('域名代号已存在');
                    $("#tail_slug").focus();
                    return;
                }
            }
        });
    } else {
        edit_user();
    }
}

//修改用户信息
function edit_user() {
    $.ajax({
        url:"/?r=person/edit",
        type:"post",
        beforeSend:beforeSend, //发送请求
        complete:complete,
        data:$("#f1").serialize(),
        dataType: 'json',
        success:function(msg){
            //console.log(msg);
            if(msg.result=="success"){
                //禁用提交按钮。防止点击起来没完
                $('#formSubmit').attr('disabled',true);
                art.dialog.tips(msg.info, 1);
            }else{
                art.dialog.tips(msg.info);
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

function upload_pic()
{
    $("#btnUpload").click();
    $("#btnUpload").change(function() {
        var formData = new FormData($("#formF")[0]);
        //$("#imgPic").val($("#btnUpload").val());
        $.ajax({
            url: "/index.php?r=person/upload",
            type: "POST",
            data: formData,
            cache: false,
            processData: false, // 告诉jQuery不要去处理发送的数据
            contentType: false, // 告诉jQuery不要去设置Content-Type请求头
            dataType: 'json',
            success: function(data) {
                if(data.result == 'success'){
                    $("#imghead").attr("src",data.img);
                    $("#head_img").val(data.img);
                } else {

                }
            }
        });
    })
}

