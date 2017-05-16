<?php
namespace Sotb\Controller;
use Think\Controller;

/**
* 
*/
class UserController extends Controller
{
	public function login()
	{
		$data = getInfo();
		$mobile = $data['mobile'];
		$password = $data['password'];
		
		$user = D('User');

		$res = $user->login($mobile,$password);
		$this->ajaxReturn($res);
	}

	public function register()
	{
		$data = getInfo();

		$mobile = $data['mobile'];
		$password = $data['password'];
		$verify = $data['verify_code'];

		$this->check_mobile($mobile);

		$user = D('User');
		
		$res = $user->register($mobile,$password,$verify);

		echo $res;
	}
	public function logout()
	{
		cookie('uid', null);
		// $this->redirect('New/category', array('cate_id' => 2), 5, '页面跳转中...');
		// $this->redirect('Index/mine','', 2,'注销成功');
	}
	public function mine()
	{
		$question_model = M('question');
		$comment_model = M('comment');
		// $model = new \Admin\Model\RefundModel();
		$count = $comment_model->count();
		// $count=$question_model->count(); 
		$comment_page = new \Think\Page($count,5);//实例化一个分页类
		$firstRow = $comment_page->firstRow;
		$pagesize = $comment_page->listRows;
		if (!is_numeric($this->uid)){
		  $this->question = 1;		
		}
		else
		{
		  $where['uid'] = $this->uid;
		  $this->question = M('question')->field('id,question')->where($where)->select();
		  
		  $where['qid'] = array('neq','0');
		  $this->comment = M('comment')->field('id,comment,qid')->where($where)->limit($firstRow,$pagesize)->select();
		}
		// $comment_page->lastSuffix = false; // 最后一页是否显示总页数
		// $comment_page->rollPage = 5;// 分页栏每页显示的页数
		// $comment_page->setConfig('prev',' < ');
		// $comment_page->setConfig('next',' > ');
		// $this->pagestr = $comment_page->show();
		var_dump($this->question);
		// $this->display();		
	}
}