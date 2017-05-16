<?php
return array(
'DB_TYPE'               =>  'mysql',     // 数据库类型
'DB_HOST'               =>  'localhost', // 服务器地址
'DB_NAME'               =>  'data',          // 数据库名
'DB_USER'               =>  'root',      // 用户名
'DB_PWD'                =>  'sos330635641',          // 密码
'DB_PORT'               =>  '3306',        // 端口
'DB_PREFIX'             =>  'data_',    // 数据库表前缀
'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
	);

// //$input - stuff to decrypt
//     //$key - the secret key to use

//     function do_mencrypt($input, $key)
//     {
//         $input = str_replace("n", "", $input);
//         $input = str_replace("t", "", $input);
//         $input = str_replace("r", "", $input);
//         $key = substr(md5($key), 0, 24);
//         $td = mcrypt_module_open('tripledes', '', 'ecb', '');
//         $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
//         mcrypt_generic_init($td, $key, $iv);
//         $encrypted_data = mcrypt_generic($td, $input);
//         mcrypt_generic_deinit($td);
//         mcrypt_module_close($td);
//         return trim(chop(base64_encode($encrypted_data)));
//     }

//     //$input - stuff to decrypt
//     //$key - the secret key to use

//     function do_mdecrypt($input, $key)
//     {
//         $input = str_replace("n", "", $input);
//         $input = str_replace("t", "", $input);
//         $input = str_replace("r", "", $input);
//         $input = trim(chop(base64_decode($input)));
//         $td = mcrypt_module_open('tripledes', '', 'ecb', '');
//         $key = substr(md5($key), 0, 24);
//         $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
//         mcrypt_generic_init($td, $key, $iv);
//         $decrypted_data = mdecrypt_generic($td, $input);
//         mcrypt_generic_deinit($td);
//         mcrypt_module_close($td);
//         return trim(chop($decrypted_data));

//     }   