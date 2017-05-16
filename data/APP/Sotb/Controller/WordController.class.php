<?php
namespace Sotb\Controller;

/**
* 
*/
class WordController extends BaseController
{
	
	public function Brain()
	{
		$count = M('word')->count();
		echo rand(0,$count);		
	}
}