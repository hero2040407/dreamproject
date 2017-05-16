$(function () {
  'use strict';
  $(document).on('click','.edit',function() {
    var deletediv = $('.delete');
    // var divV = document.getElementById("testV");
    if(deletediv.css('visibility') == "hidden")
    {
        deletediv.css('visibility',"visible");
    }
    else
    {
        deletediv.css('visibility', "hidden");
    }
  });
  //下拉刷新页面
  $(document).on("pageInit", "#commentreply", function(e, id, page) {
    var $content = $(page).find(".content").on('refresh', function(e) {
      // 模拟2s的加载过程
      setTimeout(function() {

        // $content.find('.list-container').load('refresh');
        // $.router.load('/data/object/commentreply/pid/'+ pid,true);
        // location.reload(); 
        // $(window).scrollTop(0);
        // 加载完毕需要重置
        $.pullToRefreshDone($content);
      }, 2000);
    });
  });
/*
  index/index
*/
  //无限滚动
  $(document).on("pageInit", "#index", function(e, id, page) {
    var loading = false;
    // // 每次加载添加多少条目
    var itemsPerLoad = 5;
    // // 最多可加载的条目
    var maxItems = 100;
    var lastIndex = $(page).find('.list-container li').length;
    var indexp = lastIndex/5 + 1; 
    function addItems(number, lastIndex) {
      // 生成新条目的HTML
      var html = '';
      
      $.ajax({
      type:"GET",
      url: "/data/object/object/p/" + indexp + "",
      data: '',
      success:function(res){
        $.each(res['data'], function(key , value){
        html += '<li>' + '<a href="'+ "/data/object/choose/id/"+ value.id +'" data-no-cache="true">'
          +'<div class="item-content">'
          +'<div class="item-inner">'
          +'<h4 style="text-indent:1em;">'+ value.question +'</h4>'
          +'</div>'
          +'</div>'
          + '</a>'
          + '</li>';  
      });
      // 添加新条目
      $('.infinite-scroll .list-container').append(html);
      if (res['msg'] == 400) {
          $.detachInfiniteScroll($('.infinite-scroll'));
          // 删除加载提示符
          $('.infinite-scroll-preloader').remove();
      }     
            }
        });     
    }
    if (lastIndex == 0) {
      addItems(itemsPerLoad, lastIndex);
    };
    

    $(page).on('infinite', function() {   
      // $.toast(result);         
      // 如果正在加载，则退出
      if (loading) return;
      // 设置flag
      loading = true;
      // 模拟1s的加载过程
      setTimeout(function() {
        // 重置加载flag
        loading = false;
        if (lastIndex >= maxItems) {
          // 加载完毕，则注销无限加载事件，以防不必要的加载
          $.detachInfiniteScroll($('.infinite-scroll'));
          // 删除加载提示符
          $('.infinite-scroll-preloader').remove();
          return;
        }
        indexp = indexp + 1;
        lastIndex = $('.list-container li').length;
        addItems(itemsPerLoad, lastIndex);
        // 更新最后加载的序号        
        // p = lastIndex/5 + 2;
        $.refreshScroller();
      }, 1000);
    });
  });
/*
  index/question
*/
$(document).on("pageInit", "#create", function(e, id, page) {
    function ajax(pub) {
      $.ajax({
      type:"GET",
      url: "/data/post/type/pub/" + pub,
      data: '',
      success:function(res){
          if (res.msg == 201) {
               $.confirm("请先登录", function () {
               $.router.load("/data/index/login");
          });
            }
          else
          {
            $.router.load("/data/index/question");
          }
        }
    });  
  }
    $(page).on('click','#public',function () {
      ajax(1);
    });
    $(page).on('click','#personal',function () {
      ajax(0);
    });    
});
/*
  index/addquestion
*/
$(document).on("pageInit", "#addquestion", function(e, id, page) { 
  $("#picker").picker({
  toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-left">按钮</button>\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">标题</h1>\
  </header>',
  cols: [
    {
      textAlign: 'center',
      values: ['5','10','15','20','25','30']
    }
  ]
});
  var $content = $(page).find('.content');
  $content.on('click','#submit',function () {
    var info = $content.find('form').serializeArray();
    $.ajax({
      type:"POST",
      url: "/data/post/create",
      data: info,
      success:function(res){
          if (res.msg == 201) {
               $.confirm("请先登录", function () {
               $.router.load("/data/index/login");
          });
            }
          else if (res.msg != 200) {
            $.toast(res.info);
          }
          else
          {
            $.router.load(res.url);
          }
        }
    }); 
    });
});

/*
  index/addchoose
*/
$(document).on("pageInit", "#addchoose", function(e, id, page) { 
  var $content = $(page).find('.content');
  var time = $('#myquestion li').length;
  $content.on('click','#deletequestion',function () {
    if (time > 0) {
    $("#choose"+ time).remove();
    time--;
    }  
});    
  $content.on('click','#addquestion',function () {
      time ++ ; 
      // $.toast(123);
  if (time > 6) {
      $.toast('选择不得超过6个');
  }
  else{
    var html = '<li id="choose'+ time +'">'
    + '<div class="item-content">'    
    + '<div class="item-title label">选项'+ time +'</div>'
        + '<div class="item-input">' 
        + '<div class="row">'
        + '<div class="col-50"><input type="text"  placeholder="你的选择" name="choose'+ time +'" /></div>'
        + '</div>'
        + '</div>'
        + '</div>'
        +'</li>';
    $('#myquestion').append(html);
  }
});

    $content.on('click','#submit',function () {
      var info = $content.find('form').serializeArray();
      $.ajax({
       type:"POST",
       url: "/data/post/question",
       data: info,
       success:function(res){
            if (res.msg != 200) {
              $.toast('请填写选项');
            }
            else
            {
              // location.href = res.url;
              $.router.load("/data/object/choose/id/"+ res.info);
          }
        }
    }); 
  });
});

/*
 * object/choose
*/
$(document).on("pageInit", "#choose", function(e, id, page) { 
  var $content = $(page).find('.content');
  // 
   $(page).on('click','#comment',function () {
    var info = $('#commentin').val();
    var qid = $('#qid').val();
    $.ajax({
       type:"POST",
       url: "/data/post/comment",
       data: {'comment':info, 'qid':qid},
       success:function(res){
            if (res.msg == 201) {
               $.confirm("请先登录", function () {
               $.router.load("/data/index/login");
        });
            }
            else if(res.msg != 200) {
              $.toast('请输入评论内容');
            }
            else{
              $.toast('评论成功');
              // setTimeout($('#tab1').router.reload());
            }
        }
    }); 
  });
   
  // 提交选择
  $content.on('click','#submit',function () {
      var info = $content.find('form').serializeArray();
      $.ajax({
       type:"POST",
       url: "/data/post/choose",
       data: info,
       success:function(res){
            if (res.msg == 201) {
               $.confirm("请先登录", function () {
               $.router.load("/data/index/login");
        });
            }
            else if(res.msg != 200) {
              $.toast(res.msg);
            }
            else
            {
              // $.toast('选择成功');
              // location.href = "/data/index/result";
              $.router.load(res.url, true);
          }
        }
    }); 
  });

    // 
    var loading = false;
    // // 每次加载添加多少条目
    var itemsPerLoad = 5;
    // // 最多可加载的条目
    var maxItems = 100;
    var lastIndex = $(page).find('.list-container li').length;
    var qid = $('#qid').val();
    var p = lastIndex/5 + 1;
    function addItems(number, lastIndex) {
      // 生成新条目的HTML
      var html = ''; 
      $.ajax({
      type:"GET",
      url: "/data/object/comment/p/" + p + "/qid/"+ qid +"",
      data: '',
      success:function(res){
        $.each(res['data'], function(key , value){
          html += '<li class="item-content">' 
          +'<div class="item-inner">'
          +'<div class="item-title-row">'
          +'<div class="item-title">'+ value.uid +'</div>'
          +'<a href="'+ "/data/object/commentreply/pid/"+ value.id +'" data-no-cache="true">'+'<div class="item-after">回复</div>'
          +'</a>'+'</div>'
          +'<div class="item-text">'+ value.comment +'</div>'
          +'</div>'
          + '</li>';
      });
      // 添加新条目
      $('.infinite-scroll .list-container').append(html);     
            }
        });     
    }

    $(page).on('infinite', function() { 
       // $.toast(p);
      // 如果正在加载，则退出
      if (loading) return;
      // 设置flag
      loading = true;
      // 模拟1s的加载过程
      setTimeout(function() {
        // 重置加载flag
        loading = false;
        if (lastIndex >= maxItems) {
          // 加载完毕，则注销无限加载事件，以防不必要的加载
          $.detachInfiniteScroll($('.infinite-scroll'));

          return;
        }

        lastIndex = $('.list-container .item-content').length;
        addItems(itemsPerLoad, lastIndex);
        p = p + 1;
        // 更新最后加载的序号        
        $.refreshScroller();
      }, 1000);
    });  

});

/*
  用户登录页面
  index/login
*/
$(document).on("pageInit", "#login", function(e, id, page) { 
  var $content = $(page).find('.content');
  $content.on('click','#login',function () { 
      var info = $("form").serializeArray();
      $.ajax({
       type:"POST",
       url: "/data/user/login",
       data: info,
       success:function(res){
            if (res.msg != 'success') {
              $.toast(res.msg);
            }
            else
            {
              // $.router.back();
              history.go(-1);
              location.reload();
          }
        }
    }); 
  });
});

// 评论页面
$(document).on("pageInit", "#commentreply", function(e, id, page) {
  // 提交评论内容
  var pid = $('#pid').val();
  $(page).on('click','#comment',function () {
    var info = $('#commentin').val();    
    $.ajax({
       type:"POST",
       url: "/data/post/comment",
       data: {'comment':info,'pid':pid},
       success:function(res){
            if (res.msg == 201) {
               $.confirm("请先登录", function () {
               $.router.load("/data/index/login");
        });
            }
            else if(res.msg != 200) {
              $.toast('请输入评论内容');
            }
            else{
              $.toast('评论成功');

            }
        }
    }); 
  });

  $(page).on('click','#loadmore',function () {
     var lastIndex = $(page).find('.list-container li').length;
     var p = lastIndex/5 + 1;
     var html = '';
    $.ajax({
       type:"GET",
       url: "/data/object/commentreply/p/" + p +"/pid/"+ pid +"",
       data: '',
       success:function(res){
      if(res['msg'] != 200) {
        $.toast('已加载全部评论');
      }
      else{
        $.each(res['data'], function(key , value){
         html += '<li class="item-content">' 
          +'<div class="item-inner">'
          +'<div class="item-title">'+ value.pid +'</div>'
          +'<div class="item-text">'+ value.comment +'</div>'
          +'</div>'
          + '</li>';
      });            
          $(page).find('.list-container').append(html);
          // $.toast('加载成功');
            }
        }
    });
  });  
}); 

// 
$(document).on("pageInit", "#mine", function(e, id, page) {
  // location.reload();
  $(page).on('click','#logout',function () {   
    $.ajax({
       type:"POST",
       url: "/data/user/logout",
       data: '',
       success:function(res){     
            location.href = '/data/index/mine';
              // $.router.load('/data/index/mine',true);
        }
    }); 
  });
});

$(document).on("pageInit", "#comment", function(e, id, page) {
  var p = 1;
  var rp = 1
  function addItems(url) {
      // 生成新条目的HTML
      var html = ''; 
      $.ajax({
      type:"GET",
      url:  url + p,
      data: '',
      success:function(res){
        if (res['info'] == '') {
            $.toast('没有更多的评论');
            p--;
        }
        else
        {
        $.each(res['info'], function(key , value){
        html +=  '<li>'  
                +'<div class="item-content">'
                  +'<div class="item-inner">'  
                    +'<div class="item-title-row">'
                        +'<a href="/data/object/choose/id/'+ value.qid +'">'
                            +'<div class="item-title">' + value.comment + '</div>'+'</a>'
                          +'<div id="'+ value.id +'" class="item-after delete" style="color:red;">删除</div>'
                        +'</div>'
                      +'</div>'
                    +'</div>'
                  +'</li> '
      });
      // 添加新条目
      $('.list-comment').html(html);
      }
    }
  });     
}

  function addReply(url) {
      // 生成新条目的HTML
      var html = ''; 
      $.ajax({
      type:"GET",
      url:  url + rp,
      data: '',
      success:function(res){
        if (res['info'] == '') {
            $.toast('没有更多的评论');
            rp--;
        }
        else
        {
        $.each(res['info'], function(key , value){
        html +=  '<li>'  
                +'<div class="item-content">'
                  +'<div class="item-inner">'  
                    +'<div class="item-title-row">'
                        +'<a href="/data/object/commentreply/pid/'+ value.pid +'">'
                            +'<div class="item-title">' + value.comment + '</div>'+'</a>'
                          +'<div id="'+ value.id +'" class="item-after delete" style="color:red;">删除</div>'
                        +'</div>'
                      +'</div>'
                    +'</div>'
                  +'</li>'
      });
      // 添加新条目
      $('.list-reply').html(html);
      }
    }
  });     
}

  $(page).on('click','.delete',function() {
    var comment_id = this.id;
    $.confirm("是否删除",function () {
      $.ajax({
      type:"POST",
      url: "/data/post/comment_delete",
      data: {'comment_id':comment_id},
      success:function(res){
        if (res.msg == 200) {
          $.toast('删除成功');
        }
        else 
        {
          $.toast('不得删除');
        }
        }
      });         
    });    
  });

  $(page).on('click','#replydown',function () {
    rp++;
    addReply("/data/post/reply_page/p/");
  });
   $(page).on('click','#replyup',function () {
    if (rp > 1) {rp--;}
    addReply("/data/post/reply_page/p/");
  });

  $(page).on('click','#commentdown',function () {
     p++;
    addItems("/data/post/comment_page/p/");
  });
   $(page).on('click','#commentup',function () {
    if (p > 1) {p--;}
    addItems("/data/post/comment_page/p/");
  });
});

$(document).on("pageInit", "#question", function(e, id, page) {
  $(page).on('click','.delete',function() {
    var question_id = this.id;
      $.confirm("是否删除",function () {
      $.ajax({
      type:"POST",
      url: "/data/post/question_delete",
      data: {'question_id':question_id},
      success:function(res){
        if (res.msg == 200) {
          $.toast('删除成功');
        }
        else 
        {
          $.toast('不得删除');
        }
        }
      });         
    });    
  });
});
// register
$(document).on("pageInit", "#register", function(e, id, page) {
  var countdown = 60; 
  function settime(val) { 
    if (countdown == 0) { 
    val.removeAttribute("disabled");    
    val.value = "发送验证码";      
    countdown = 60; 
    } 
    else { 
    val.setAttribute("disabled", true); 
    val.value = countdown + "重新发送"; 
    countdown--;
    setTimeout(function() { 
    settime(val); 
    },1000);  
    }   
  } 
  $(page).on('click','#send',function () {
    var submitObject = this;
    var mobile = $('#mobile').val();     
    $.ajax({
      type:"POST",
      url: "/data/object/message",
      data: {'mobile':mobile},
      success:function(res){
        if (res.msg == 200) {
          settime(submitObject);
        }
        else 
        {
          $.toast(res.msg);
        }
        }
    });  
  });

  $(page).on('click','#register',function () {
    var info = $(page).find("form").serializeArray();
    $.ajax({
      type:"POST",
      url: "/data/object/register",
      data: info,
      success:function(res){
        if (res.msg == 200) {
          $.toast('注册成功');
          $.router.load('/data/index/mine');
        }
        else 
        {
          $.toast(res.msg);
        }
        }
    });
  });
});
  
  $(document).on("pageInit", "#admin", function(e, id, page) {
    $(page).on('click','.allow',function () {
    var question_id = this.id;
     $.confirm('是否通过审核',function () {
     $.ajax({
        type:"POST",
        url: "/data/adminsiyizcy/allow",
        data: {'id':question_id},
        success:function(res){
          if (res.msg == 200) {
            $.toast('审核通过');
          }
          else 
          {
            $.toast(res.msg);
          }
          }
      });
    });
  });
});
  $.init();
});
