
/**
 * ajax异步提交数据 
 * @param  {[type]} posturl 提交的url地址
 * @param  {[type]} result  传递的数据
 * @return {[type]}         [description]
 */
function firstProjectSubmit(posturl) {
  $(document).ready(function(){		 
  	$('#submit').live('click',function () {
    	info =  $("form").serializeArray();
  		$.ajax({
		 type:"POST",
		 url: posturl,
		 data: info,
		 success:function(res){
		      if (res.msg != 'success') {
		        $.toast(123);
		      }
		      else
		      {
		        location.href = res.url;
		      }
		    }
		}); 
  	});
});		
}

/**
 * 限制框内输入字数
 *@param  {[type]} field      对象变量
 *@param  {[type]} countfield 标签名
 *@param  {[type]} maxlimit   最大字数
 *@return {[type]}            [description]
 */
function textLimit(field,maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0,maxlimit);
}


function addquestion () {
	var time = 1;
	$(document).ready(function(){
	$('#addquestion').live('click',function () {
		html += '<li>'
		+ '<div class="item-content">'
		+ '<div class="item-media">'
        + '<i class="icon icon-form-comment">'
        + '</i>'
        + '</div>'
        + '<div class="item-inner">'
		+ '<div class="item-title label">'+ time +'</div>'
        + '<div class="item-input">' 
        + '<input type="text" placeholder="Your name" name="choose'+ time +'" />'
        + '</div>'
        + '</div>'
        + '</div>'
        +'</li>';
		$('#myquestion').append(html);
		time ++ ;
    });
 });
}

/*
 *内容自动保存
*/			
function AutoSave() {
	$(document).ready(function(){
	$('#form').sisyphus({
		customKeyPrefix: 'gb',
		timeout: 3,
		onSave: function() {
			$.toast('已保存');
		},
		onRestore: function() {
			$.toast('已保存');
		},
		onRelease: function() {
			$.toast('已保存');
		}
	});
});
}
