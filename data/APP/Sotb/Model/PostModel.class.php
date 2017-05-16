<?php
namespace Sotb\Model;
use Think\Model;

/**
*
*/
class PostModel extends Model
{	
	Protected $autoCheckFields = false;
/**
 *@param $data 提交内容
 */
	public function addquestion($data)
	{
		$key = C('userkey');
		$model = M('question');
		$data['uid'] = decrypt(cookie('uid'), $key);
		
		$id = $model->add($data);
		
		return $id;
	}
/**
 *@param $id 问题的id
 *@param $data 选择数据
 */	
	public function addchoose($data , $id)
	{
		$model = M('choose');
		$info = array();
		foreach ($data as $k ) {
		if (empty($k)) {
				return false;
			}
			$info[] = array('choose' => $k, 'qid' => $id);			
		}
		$id = $model->addAll($info);
		return $id;
	}
}