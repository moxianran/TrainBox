


function beforeSend(XMLHttpRequest){
    $("#showResult").append("<div><img src='/img/loading.gif' style='width:32px;height:32px;' /><div>");
}

function complete(XMLHttpRequest, textStatus){
    $("#showResult").empty();
}



$(function(){

    var E = window.wangEditor
    var editor = new E('#editor')
    // 或者 var editor = new E( document.getElementById('#editor') )
    editor.create()


    $("#formSubmit").click(function(){

        var content = $(".w-e-text").html();
        $.ajax({
            url:"/?r=person/addnote",
            type:"post",
            beforeSend:beforeSend, //发送请求
            complete:complete,
            data:{
                content:content
            },
            dataType: 'json',
            success:function(msg){
                //console.log(msg);
                if(msg.result=="success"){
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                    art.dialog.tips(msg.info, 1);
                    window.location.href = "/index.php?r=person/note";
                }else{
                    art.dialog.tips(msg.info);
                    //禁用提交按钮。防止点击起来没完
                    $('#formSubmit').attr('disabled',true);
                }
            }
        });
    })


});