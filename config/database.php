<?php
if(strpos($config['base_url'], 'happybrday.baskinrobbins.com.my/staging')) // client staging
{
	$database['host']		= '127.0.0.1';
	$database['password']	= '~vu1r4W5';
	$database['user']		= 'welcometobrday';
	$database['db_name']	= 'welcometobrday_staging';
}
elseif(strpos($config['base_url'], 'happybrday.baskinrobbins.com.my')) // live
{
	$database['host']		= '127.0.0.1';
	$database['password']	= '~vu1r4W5';
	$database['user']		= 'welcometobrday';
	$database['db_name']	= 'welcometobrday';
}
elseif(strpos($config['base_url'], 'duck.senjitsu.com')) // staging
{
	$database['host']		= '127.0.0.1';
	$database['password']	= 'Q0dIwxJ4f';
	$database['user']		= 'symphoni_oppo';
	$database['db_name']	= 'symphoni_oppo';
}
else // localhost
{
	$database['host']		= 'localhost';
	$database['password']	= '';
	$database['user']		= 'root';
	$database['db_name']	= 'sharp_reraya';
}

$database['trans']      = 'COMMIT'; // COMMIT / ROLLBACK