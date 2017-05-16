$(document).on("pageInit", "#page-infinite-scroll-bottom", function(e, id, page) {
    var loading = false;
    // 每次加载添加多少条目
    var itemsPerLoad = 10;
    // 最多可加载的条目
    var maxItems = 100;
    var lastIndex = $('.list-container li').length;

    function addItems(number, lastIndex, p) {
      // 生成新条目的HTML
      var html = '';
    $.ajax({
      type:"GET",
      url: "{:U('object/object/p/" + p + "')}",
      data: '',
      success:function(res){
        for (var i = 0; i <= 2; i++) {
          html += '<li>'
          + '<a href="'+ "{:U('object/detail/id/"+ res[i].id +"')}" +'">' 
          + '<div class="card">'+ 
          '<div class="card-header">'+ res[i].question +'</div>' +
          '<div class="card-content-inner">' +
          '</div>' +
          '</div>' + '</a>'
          + '</li>';
      }
      // 添加新条目
      $('.infinite-scroll .list-container').append(html);     
            }
        });     
    }

    addItems(itemsPerLoad, 0, 1);

    var p = 2;
    $(page).on('infinite', function() {
       
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

        addItems(itemsPerLoad, lastIndex, p);
        // 更新最后加载的序号
        p++;
        lastIndex = $('.list-container li').length;
        $.refreshScroller();
      }, 1000);
    });
  });
   $.init();