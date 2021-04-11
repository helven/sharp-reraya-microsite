<?php
if(strpos($config['base_url'], 'happybrday.baskinrobbins.com.my/staging')) // client staging
{
	$database['host']		= '127.0.0.1';
	$database['password']	= '';
	$database['user']		= '';
	$database['db_name']	= '';
}
elseif(strpos($config['base_url'], 'happybrday.baskinrobbins.com.my')) // live
{
	$database['host']		= '127.0.0.1';
	$database['password']	= '';
	$database['user']		= '';
	$database['db_name']	= '';
}
elseif(strpos($config['base_url'], 'sharpmicro.senjitsu.com')) // staging
{
	$database['host']		= '127.0.0.1';
	$database['password']	= 'zLSh2ms2s7';
	$database['user']		= 'symphoni_sharpreraya';
	$database['db_name']	= 'symphoni_sharpreraya';
}
else // localhost
{
	$database['host']		= 'localhost';
	$database['password']	= '';
	$database['user']		= 'root';
	$database['db_name']	= 'sharp_reraya';
}

$database['trans']      = 'COMMIT'; // COMMIT / ROLLBACK