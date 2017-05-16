<?php
namespace Sotb\Controller;
use Think\Controller;

/**
* 
*/
class AdminsiyizcyController extends Controller
{
	// 审核未通过检查
	public function index()
	{
		$where['audit'] = I('get.allow','0','htmlspecialchars');

		$where['pub'] = 1;

	    $count = M('question')->where($where)->count();
		$pages = new \Think\Page($count,5);//实例化一个分页类
		$qfirst = $pages->firstRow;
		$pageSize = $pages->listRows;
		$this->question = M('question')->where($where)->limit($qfirst,
		$pageSize)->order('id desc')->select();

		$pages->rollPage = 5;// 分页栏每页显示的页数
		$pages->setConfig('prev','上一页');
		$pages->setConfig('next','下一页');

		$this->pagestr = $pages->show();

		$this->display();
	}
	public function allow()
	{
		$id = I('post.id');
		$where['id'] = $id;
		$data['audit'] = 1;
		$result = M('question')->where($where)->data($data)->save();
		if ($result == 1) {
			$res['msg'] = 200;
		}
		else $res['msg'] = $id;
		$this->ajaxReturn($res);
	}
}