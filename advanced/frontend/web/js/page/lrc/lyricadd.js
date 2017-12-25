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
                    $("#pic").val(data.img);
                }
            }
        });
    })
}


$(function(){

    $("#formSubmit").click(function(){

        var pic = $("#pic").val();
        var title = $("#title").val();

        $.ajax({
            url:"/?r=person/addlove",
            type:"post",
            beforeSend:beforeSend, //发送请求
            complete:complete,
            data:{
                pic:pic,
                title:title
            },
            dataType: 'json',
            success:function(msg){
                //console.log(msg);
                if(msg.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    window.location.href = "/index.php?r=person/index";
                }else{
                    art.dialog.tips(msg.info);
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    })
})

function beforeSend(XMLHttpRequest){
    $("#showResult").append("<div><img src='/img/loading.gif' style='width:32px;height:32px;' /><div>");
}

function complete(XMLHttpRequest, textStatus){
    $("#showResult").empty();
}
