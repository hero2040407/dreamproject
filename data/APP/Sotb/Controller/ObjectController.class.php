<?php
namespace Sotb\Controller;
use Think\Controller;

/**
* 			
*/
class ObjectController extends Controller
{
	public function object()
	{
		$p = I('get.p');
		$where['pub'] = 1;
		$where['audit'] = 1;
		$count = M('question')->where($where)->count();
		$pages = new \Think\Page($count,5);//实例化一个分页类
		$firstRow = $pages->firstRow;
		$pageSize = $pages->listRows;

		
		$res = M('question')->where($where)->limit($firstRow, $pageSize)->order('id desc')
		->select();
		if (!empty($res) && floor($p) == $p) {
			if ($p == $pages) {
				$data['msg'] = 400;
			}
			else $data['msg'] = 200;
				$data['data'] = $res;
			 	$this->ajaxReturn($data);
			}
		else 
		{
			$data['msg'] = 400;
			$data['data'] = $res;
			$this->ajaxReturn($data);
		}
	}
	public function choose()
	{

	$where['id'] = I('get.id','','htmlspecialchars');

	$this->data = M('question')->where($where)->find();

	$qid['qid'] = I('get.id');
	$qid['pid'] = 0;
	$this->choose = M('choose')->where($qid)->select();
	$this->comment = M('comment')->where($qid)->order('id desc')->limit(5)->select();
	$where['uid'] = decrypt(cookie('uid'), C('userkey'));
	$where['qid'] = I('get.id');

	$this->res = M('result')->where($where)->find();
	if ($this->res) {
		$this->data['res'] = 1;
	}	
	$this->display();		
	}
	public function comment()
	{
		$qid = I('get.qid','','htmlspecialchars');
		$p = I('get.p');
		$count = M('comment')->count();

		$pages = new \Think\Page($count,5);//实例化一个分页类

		$firstRow = $pages->firstRow;
		$pageSize = $pages->listRows;

		$where['qid'] = $qid;
		$where['pid'] = 0;
		$res = M('comment')->where($where)->limit($firstRow, $pageSize)->order('id desc')
		->select();
		if (!empty($res) && floor($p) == $p) {
				$data['msg'] = 200;
				$data['data'] = $res;
			 	$this->ajaxReturn($data);
		}
	}
	public function commentreply()
	{
		$pid = I('get.pid','','htmlspecialchars');
		$p = I('get.p','','htmlspecialchars');
		$where['pid'] = $pid;
		$count = M('comment')->where($where)->count();

		$pages = new \Think\Page($count,5);//实例化一个分页类

		$firstRow = $pages->firstRow;
		$pageSize = $pages->listRows;
		if(empty($p)){
			$this->reply = M('comment')->where($where)->limit($firstRow, $pageSize)->order('id desc')->select();
			$this->comment = M('comment')->where("id = '$pid'")->find();
			$this->pid = $pid;
			$this->display();
		}
		else
		{
			$res = M('comment')->where($where)->limit($firstRow, $pageSize)->order('id desc')->select();
			if (!empty($res) && floor($p) == $p) {
				$data['msg'] = 200;
				$data['data'] = $res;
			 	$this->ajaxReturn($data);
			}
		}
	}
	public function message()
	{
		$data = getInfo();
		if (cookie('message')) {
			$res['msg'] = '请稍后再发送';
			$this->ajaxReturn($res);
		}

		if (check_mobile($data['mobile'])) {
			$url = 'https://api.netease.im/sms/sendcode.action';
			$result = messagepost($url, $data);
			if ($result['code'] == 200) {
			 cookie('message',1,60);
			 $res['msg'] = 200;
			} 
		} 
		else $res['msg'] = '手机号码不正确';
		$this->ajaxReturn($res);	
	}
	public function register()
	{
		$data = getInfo();
		$url = 'https://api.netease.im/sms/verifycode.action';
		$message_data['code'] = $data['message'];
		$message_data['mobile'] = $data['mobile'];
		$result = messagepost($url, $message_data);
		if (empty($data['mobile'])) {
			$res['msg'] = '请输入用户名';
		}
		elseif (empty($data['password'])) {
			$res['msg'] = '请输入密码';
		}
		elseif (empty($data['message'])) {
			$res['msg'] = '请输入验证码';
		}
		elseif (strlen($data['password']) < 6) {
			$res['msg'] = '密码不得小于6位';
		}
		elseif ($result['code'] != 200) {
			$res['msg'] = '验证码错误';
		}
		else {
			$model = D('user');
			$result = $model->register($data);
			if ($result) {
				$res['msg'] = '用户名已存在';
			}
			else $res['msg'] = 200;
		}

		
		$this->ajaxReturn($res);
	}
}