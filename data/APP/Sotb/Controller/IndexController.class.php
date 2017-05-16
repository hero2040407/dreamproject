<?php
namespace Sotb\Controller;
use Think\Controller;
use Think\Cache\Driver\Redis;
/**
* 
*/
class IndexController extends Controller
{
	public function addProject()
	{
		echo "success";
	}
	public function createfinal()
	{
		$arr = session('data');
		$res['msg'] = $arr['memo'];
		$this->ajaxReturn($res);
	}
	public function comment()
	{
		$where['qid'] = 1;

		$this->comment = M('comment')->where($where)->order('id desc')->limit(5)->select();

		var_dump($this->comment);
	}
	public function returnto()
	{
		$res = getallheaders();
		$this->ajaxReturn($res);
	}
	public function redis()
	{
		

		$redis = new Redis();
		$redis->set('username','zongs');
		echo $redis->get('username');
	}
	public function mine()
	{
		$uid = decrypt(cookie('uid'), C('userkey'));
		if (!is_numeric($uid)){
		  $this->question = 1;		
		}
		else
		{
		  $where['uid'] = $uid;
		  $where['pub'] = 1;
		  $this->question = M('question')->field('id,question,audit')->where($where)->order('id desc')->select();
		  $where['pub'] = 0;
		  $this->personal = M('question')->field('id,question')->where($where)->order('id desc')->select();
		  $where['qid'] = array('eq','0');
		  $this->reply = M('comment')->field('id,comment,pid')->where($where)->order('id desc')->limit(7)->select();	  
		  $where['qid'] = array('neq','0');
		  $this->comment = M('comment')->field('id,comment,qid')->where($where)->order('id desc')->limit(7)->select();
		}
		// var_dump($this->question);
		$this->display();		
	}
}