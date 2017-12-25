$(document).ready(function() {

    // 评论
    $("#J_commentBtn").click(function(){

        var love_id = $("#love_id").val();
        var content = $(".w-e-text").html();

        $.ajax({
            url:"/?r=love/addcomment",
            type:"post",
            beforeSend:beforeSend, //发送请求
            complete:complete,
            data:{
                love_id:love_id,
                content:content
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                     location.reload();
                }else{
                    art.dialog.tips(data.info);
                    //禁用提交按钮。防止点击起来没完
                    $('#J_commentBtn').attr('disabled',true);
                }
            }
        });
    });

    //点赞
    $("#J_gz_btn").click(function(){

        var love_id = $("#love_id").val();

        $.ajax({
            url:"/?r=love/addremember",
            type:"post",
            beforeSend:beforeSend, //发送请求
            complete:complete,
            data:{
                love_id:love_id,
            },
            dataType: 'json',
            success:function(data){
                if(data.result=="success"){
                    location.reload();
                }else{
                    art.dialog.tips(data.info);
                    //禁用提交按钮。防止点击起来没完
                    $('#J_commentBtn').attr('disabled',true);
                }
            }
        });

    });

    loadcmt();
    //加载更多
    $("#loadStuffCommentBtn").click(function(){
        var pagenow = $("#comment_id_from").val();
        $("#comment_id_from").val(parseInt(pagenow)+1);
        loadcmt();
    })
});

//加载评论
function loadcmt(){
    var page_id = $("#page_id").val();
    var love_id = $("#love_id").val();
    $.ajax({
        url:"/index.php?r=love/comment",
        type:"post",
        data:{
            page_id:page_id,
            love_id:love_id
        },
        beforeSend:beforeSend, //发送请求
        complete:complete,
        success:function(data){
            if(data) {
                var html = template('test', data);
                $("#stuffCommentBox").append(html);
                var page_id = $("#page_id").val();
                if(data.page_all <= page_id) {
                    $("#loadStuffCommentBtn").remove();
                }
                var page_now = parseInt(page_id)+parseInt(1);
                $("#page_id").val(page_now);
            }
        }
    });
}

$(function(){
    var E = window.wangEditor
    var editor = new E('#editor')
    // 或者 var editor = new E( document.getElementById('#editor') )
    editor.create()
});
function beforeSend(XMLHttpRequest){
    $("#loadingAnimation").show();
}

function complete(XMLHttpRequest, textStatus){
    $("#loadingAnimation").hide();
}