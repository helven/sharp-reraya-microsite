<?php
if(strpos($config['base_url'], 'cocorolife.my/SharpReRaya_stage')) // client staging
{
	$database['host']		= '127.0.0.1';
	$database['password']	= 'HXn8p,Y)FkB8';
	$database['user']		= 'sharpnet_reraya';
	$database['db_name']	= 'sharpnet_reraya_stage';
}
elseif(strpos($config['base_url'], 'cocorolife.my/SharpReRaya')) // live
{
	$database['host']		= '127.0.0.1';
	$database['password']	= 'HXn8p,Y)FkB8';
	$database['user']		= 'sharpnet_reraya';
	$database['db_name']	= 'sharpnet_reraya';
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