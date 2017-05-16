<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
	    $where['pub'] = 1;
	    $where['audit'] = 0;
	    $count = M('question')->where($where)->count();
		$pages = new \Think\Page($count,10);//实例化一个分页类
		$firstRow = $pages->firstRow;
		$pageSize = $pages->listRows;
		$this->question = M('question')->where($where)->limit($firstRow, $pageSize)->order('id desc')
		->select();



    }
}