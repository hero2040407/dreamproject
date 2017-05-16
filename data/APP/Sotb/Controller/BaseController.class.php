<?php
namespace Sotb\Controller;
use Think\Controller;
class BaseController extends Controller {
	protected $uid;
    public function _initialize()
    {

        if (is_numeric(decrypt(cookie('uid'), C('userkey')))) {
            $this->uid = decrypt(cookie('uid'), C('userkey'));
        }
        else
        {
            $res['msg'] = 201;
            $this->ajaxReturn($res);        
        }
        
    }
    public function successReturn($data = null)
    {
        $res['info'] = $data;
        $res['msg'] = 200;
        $this->ajaxReturn($res); 
    }

    public function errorReturn($data = null)
    {
        $res['info'] = $data;
        $res['msg'] = 400;
        $this->ajaxReturn($res); 
    }

    // curl -X 
    // POST -H "AppKey: go9dnk49bkd9jd9vmel1kglw0803mgq3" 
    // -H "CurTime: 1443592222" 
    // -H "CheckSum: 9e9db3b6c9abb2e1962cf3e6f7316fcc55583f86" 
    // -H "Nonce: 4tgggergigwow323t23t" 
    // -H "Content-Type: application/x-www-form-urlencoded" 
    // -d 'mobile=13812345678' 
    // 'https://api.netease.im/sms/sendcode.action'  
      
}