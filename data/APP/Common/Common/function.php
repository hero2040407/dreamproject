<?php
	/**
	 * [writeArr 写入配置文件方法]
	 * @param  [type] $arr      [要写入的数据]
	 * @param  [type] $filename [文件路径]
	 * @return [type]           [description]
	 */
	function writeArr($arr, $filename) {

	    return file_put_contents($filename,  json_encode($arr));

	}
// 	function xml_array($data){

// 	$ch = curl_init();
// 	curl_setopt($ch, CURLOPT_URL,"http://www.midao360.com/wap/index.php?ctl=wxpayapi&act=wxpay");
// 	curl_setopt($ch, CURLOPT_POST, true);
//  	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//  	curl_exec($ch);
// }