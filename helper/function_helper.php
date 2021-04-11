<?php
function br2nl($str)
{
	return preg_replace('/\<br(\s*)?\/?\>/i', "\r\n", $str);
}
function redirect($url)
{
	header("Location: {$url}");
}
function format_date($str='')
{
	if($str == '')
	{
		return '';
	}


	return date('Y-m-d H:i:s', strtotime($str));
}