<?php
namespace Sotb\Model;
use Think\Model;

/**
* 
*/
class UserModel extends Model
{
	
	public function login($mobile,$password)
	{
		if (empty($mobile)) {
			$res['msg'] = '请输入用户名';
			return $res;
		}
		if (empty($password)) {
			$res['msg'] = '请输入密码';
			return $res;
		}

		$where['mobile'] = $mobile;

		$result = $this->where($where)->find();

		if (empty($result['mobile'])) {
			$res['msg'] = '用户名不存在';
		}
		elseif($result['password'] != md5($password))
		{
			$res['msg'] = '密码错误';
		}
		else {
			$res['msg'] = 'success';
			$res['url'] = U('Index/index');
			$key = C('userkey');
			$uidcrypt = encrypt($result['id'] , $key);
			cookie('uid', $uidcrypt, 60*60*24);
		}
		return $res;
	}

	public function register($data)
	{

		$where['mobile'] = $data['mobile'];
		$data['password'] = md5($data['password']);
		$res = $this->where($where)->find();
		if ($res) {
			return true;
		}
		else{
			$this->add($data);
			return false;
		} 
				
	}
}