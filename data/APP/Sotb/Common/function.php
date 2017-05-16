<?php

/**
 *@param $mobile 手机号
 */
function check_mobile($mobile)
    {
    	if(!preg_match("/^1[34578]\d{9}$/", $mobile))
    	{
    		return false;
    	}

        return true;
    }
/**
 *获取提交数据
 */
function getInfo()
{
	$data = I('post.','','htmlspecialchars');
	// if (empty($data)) {
 //        echo 'Hacking attempt';
 //        exit();
 //        }
    return $data;
}

/**
 *@param $url 地址
 *@param $data 发送内容
 */
function messagepost($url , $data)
{  
   header("Content-Type:text/html; charset=utf-8");       
   $AppKey = C('AppKey');        
   $AppSecret = C('AppSecret');        
   $Nonce = rand(100000,999999);        
   $CurTime = time();        
   $CheckSum = strtolower(sha1($AppSecret.$Nonce.$CurTime));        

   $head_arr = array();             
   $head_arr[] = 'AppKey:'.$AppKey;        
   $head_arr[] = 'Nonce:'.$Nonce;       
   $head_arr[] = 'CurTime:'.$CurTime;        
   $head_arr[] = 'CheckSum:'.$CheckSum;               
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);        
    curl_setopt($ch, CURLOPT_URL, $url);        
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_POST, true);       
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head_arr);        
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));     
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);     
    $result = curl_exec($ch);               
    curl_close($ch);
    return (array) json_decode($result);
}

/**
 * 用户加密算法
 *@param  $data 用户ID
 *@param  $key  一个自定义的数值
 */
    function encrypt($data , $key)  
    {  
        $key    =   md5($key);  
        $x      =   0;  
        $len    =   strlen($data);  
        $l      =   strlen($key);  
        for ($i = 0; $i < $len; $i++)  
        {  
            if ($x == $l)   
            {  
                $x = 0;  
            }  
            $char .= $key{$x};  
            $x++;  
        }  
        for ($i = 0; $i < $len; $i++)  
        {  
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);  
        }  
        return base64_encode($str);  
    }  


/**
 * 用户ID解密算法
 *@param  $data 用户ID
 *@param  $key  一个自定义的数值
 */
    function decrypt($data , $key)  
    {  
        $key = md5($key);  
        $x = 0;  
        $data = base64_decode($data);  
        $len = strlen($data);  
        $l = strlen($key);  
        for ($i = 0; $i < $len; $i++)  
        {  
            if ($x == $l)   
            {  
                $x = 0;  
            }  
            $char .= substr($key, $x, 1);  
            $x++;  
        }  
        for ($i = 0; $i < $len; $i++)  
        {  
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))  
            {  
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));  
            }  
            else  
            {  
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));  
            }  
        }  
        return $str;  
    }