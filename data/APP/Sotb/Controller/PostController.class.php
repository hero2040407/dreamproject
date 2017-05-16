<?php
namespace Sotb\Controller;
use Think\Controller;

/**
* 		
*/
class PostController extends BaseController
{
	public function type()
	{
		$data = I('get.pub','','htmlspecialchars');
		session('data',$data,60*60);
		$this->successReturn();
	}
	public function create()
	{
		$model = M('question');
		$where['uid'] = $this->uid;
		$count = $model->where($where)->count();
		if ($count > 5) {
			$this->errorReturn('提问数量已超出限制');
		}

		$data = I('post.','','htmlspecialchars');
		
		// $info = $data['data'];
		if (empty($data['why'])) {
			$res['info'] = "请输入你的想法";
		}
		else $res['msg'] = 200;	
		$data['pub'] = session('data');
		session('data',$data,60*60);

		$res['url'] = U('Index/addchoose');

		$this->ajaxReturn($res);
	}
	public function question()
	{

		$data = I('post.','','htmlspecialchars');
		foreach ($data as $k ) {
		if (empty($k)) {
			$this->errorReturn();
			}			
		}
		$questionId = D('Post')->addquestion(session('data'));		
		if ($questionId > 0) {
			$choose = D('Post')->addchoose($data , $questionId);
			if ($choose) {
				$this->successReturn($questionId);
			}
		}

		$this->errorReturn();
	}

	public function contend()
	{
		$res['url'] = U('Post/session');	
		$res['msg'] = 200;
		$this->ajaxReturn($res);
	}
	public function session()
	{
		// $data = session('data');
		// $model = M('Object')->add($data);
		$this->display();
	}


	public function choose()
	{
		$data = getInfo();
		if (empty($data['cid'])) {
			$res['msg'] = '请选择一个选项';
		}
		else
		{
			$data['uid'] = $this->uid;
			$id = M('result')->add($data);
			if ($id > 0) {
				$where['id'] = $data['cid'];
				$qid['id'] = $data['qid'];
				$rid = M('question')->where($qid)->setInc('sum');
			 	$rid = M('choose')->where($where)->setInc('total');
			 	if ($rid) {
			 		$res['msg'] = 200;
			 		$res['url'] = U('Object/choose?id='.$data['qid']);
			 	}
			} 
		}
		$this->ajaxReturn($res);
	}
	public function comment()
	{
		$data = getInfo();
		if (empty($data['comment'])) {
		$this->errorReturn();
		}
		$data['uid'] = $this->uid;
		$pid = $data['pid'];
		$comment_id = M('comment')->add($data); 
		
		// $file = APP_PATH.MODULE_NAME.'/Conf/index.html';
		// writeArr($data, $file);
		$this->successReturn();
		// echo $qid;
		
		// echo file_get_contents(APP_PATH.MODULE_NAME.'/Conf/index.html');
	}
	
	public function comment_page()
	{
		$p = I('get.p','','htmlspecialchars');
		$comment_model = M('comment');
		// $model = new \Admin\Model\RefundModel();
		$count = $comment_model->count();
		// $count=$question_model->count(); 
		$comment_page = new \Think\Page($count,7);//实例化一个分页类
		$firstRow = $comment_page->firstRow;
		$pagesize = $comment_page->listRows;

		$where['uid'] = $this->uid;
		$where['qid'] = array('neq','0');
		$comment = $comment_model->field('id,comment,qid')->where($where)
		->order('id desc')->limit($firstRow,$pagesize)->select();

		$this->successReturn($comment);

	}

	public function reply_page()
	{
		$p = I('get.p','','htmlspecialchars');

		$reply_model = M('comment');
		// $model = new \Admin\Model\RefundModel();
		$count = $reply_model->count();
		// $count=$question_model->count(); 
		$comment_page = new \Think\Page($count,7);//实例化一个分页类
		$firstRow = $comment_page->firstRow;
		$pagesize = $comment_page->listRows;

		$where['uid'] = $this->uid;
		$where['qid'] = array('eq','0');
		$reply = $reply_model->field('id,comment,pid')->where($where)
		->order('id desc')->limit($firstRow,$pagesize)->select();

		$this->successReturn($reply);
	}
	public function question_page()
	{
		$p = I('get.p','','htmlspecialchars');
		$question_model = M('question');
		// $model = new \Admin\Model\RefundModel();
		$count = $question_model->count();
		// $count=$question_model->count(); 
		$question_page = new \Think\Page($count,7);//实例化一个分页类
		$firstRow = $question_page->firstRow;
		$pagesize = $question_page->listRows;

		$where['uid'] = $this->uid;
		$question = $question_model->field('id,question,id')
		  ->where($where)->order('id desc')->limit($firstRow,$pagesize)->select();
		
		$this->successReturn($question);
	}
	public function comment_delete()
	{
		$comment_id = I('post.comment_id');

		$where['id'] = $comment_id;

		$result = M('comment')->where($where)->delete();

		if ($result) {
			$this->successReturn();
		}
		else $this->errorReturn();
	}
	public function question_delete()
	{
		$question_id = I('post.question_id');
		$where['id'] = $question_id;
		$audit = M('question')->field('audit')->where($where)->find();
		if ($audit['audit'] == 1) {
			$this->errorReturn();
		}

		$result = M('question')->where($where)->delete();

		$choose['qid'] = $question_id;
		$chooseres = M('choose')->where($choose)->delete();
		
		if ($result && $chooseres) {
			$this->successReturn();
		}
		else $this->errorReturn();
	}
}