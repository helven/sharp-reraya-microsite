<?php
global $config;
$config = array();
$config['protocol'] = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
$config['base_url'] = $_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
$config['base_url'] = $config['protocol'].((isset($config['base_url']))?$config['base_url']:'www.cocorolife.my/sharpreraya');

if(strpos($config['base_url'], 'cocorolife.my/SharpReRaya_stage'))
{
    $config['active_group'] = 'client_staging';
}
elseif(strpos($config['base_url'], 'cocorolife.my/sharpreraya'))
{
    $config['active_group'] = 'live';
}
elseif(strpos($config['base_url'], 'sharpmicro.senjitsu.com'))
{
    $config['active_group'] = 'staging';
}
else
{
    $config['active_group'] = 'dev';
}
$config['live']['environment']      = 'live';
$config['live']['dir_base_url']     = 'https://'.((isset($config['live']['base_url']))?$config['live']['base_url']:'www.cocorolife.my/sharpreraya'); 
$config['live']['base_url']         = 'https://'.((isset($config['live']['base_url']))?$config['live']['base_url']:'www.cocorolife.my/sharpreraya');
$config['live']['media_url']        = $config['live']['base_url'].'/media';
$config['live']['site_url']         = 'https://www.cocorolife.my/sharpreraya';
$config['live']['storage_url']      = 'https://www.cocorolife.my/sharpreraya/storage';
$config['live']['storage_path']     = getcwd().'/storage/';
$config['live']['mail_admin_email'] = 'no-reply@sharp.com.my';
$config['live']['mail_admin_name']  = 'Sharp Re-Raya';
$config['live']['mail_mailtype']    = 'html';

$config['client_staging']['environment']        = 'staging';
$config['client_staging']['dir_base_url']     = 'https://'.((isset($config['client_staging']['base_url']))?$config['client_staging']['base_url']:'www.cocorolife.my/SharpReRaya_stage'); 
$config['client_staging']['base_url']         = 'https://'.((isset($config['client_staging']['base_url']))?$config['client_staging']['base_url']:'www.cocorolife.my/SharpReRaya_stage');
$config['client_staging']['media_url']        = $config['client_staging']['base_url'].'/media';
$config['client_staging']['site_url']         = 'https://www.cocorolife.my/SharpReRaya_stage';
$config['client_staging']['storage_url']      = 'https://www.cocorolife.my/SharpReRaya_stage/storage';
$config['client_staging']['storage_path']     = getcwd().'/storage/';
$config['client_staging']['mail_admin_email'] = 'no-reply@sharp.com.my';
$config['client_staging']['mail_admin_name']  = 'Sharp Re-Raya';
$config['client_staging']['mail_mailtype']    = 'html';

$config['staging']['environment']       = 'staging';
$config['staging']['dir_base_url']      = $config['protocol'].((isset($config['staging']['base_url']))?$config['staging']['base_url']:'sharpmicro.senjitsu.com'); 
$config['staging']['base_url']          = $config['protocol'].((isset($config['staging']['base_url']))?$config['staging']['base_url']:'sharpmicro.senjitsu.com');
$config['staging']['media_url']         = $config['staging']['base_url'].'/media';
$config['staging']['site_url']          = $config['protocol'].'sharpmicro.senjitsu.com';
$config['staging']['storage_url']       = $config['protocol'].'www.senjitsu.com/sharpstorage';
$config['staging']['storage_path']      = '../sharpstorage/';
$config['staging']['mail_admin_email']  = 'no-reply@sharp.com.my';
$config['staging']['mail_admin_name']   = 'Sharp Re-Raya';
$config['staging']['mail_mailtype']     = 'html';

$config['dev']['environment']       = 'dev';
$config['dev']['base_url']          = str_replace('\\','', $_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']));
$config['dev']['base_url']          = 'http://'.((isset($config['dev']['base_url']))?$config['dev']['base_url']:'sharp-reraya-microsite.test');
$config['dev']['media_url']         = $config['dev']['base_url'].'/media';
$config['dev']['site_url']          = 'http://sharp-reraya-microsite.test';
$config['dev']['storage_url']       = 'http://sharp-reraya-storage.test';
$config['dev']['storage_path']      = '../sharp-reraya-storage/';
$config['dev']['mail_admin_email']  = 'no-reply@sharp.com.my';
$config['dev']['mail_admin_name']   = 'Sharp';
$config['dev']['mail_mailtype']     = 'html';
$config = $config[$config['active_group']];

$config['row_per_page'] = 10;

$config['title']    = 'Sharp Re-Raya';
$config['og_title'] = 'Play Sharp Shooter to win epic ReRaya prizes! ';
$config['og_desc']  = 'Win amazing prizes for SHARP ReRaya with this fun game.';

$config['leaderboard_round']    = array(
    array('2021-04-26', '2021-04-30'), // testing

    array('2021-05-01', '2021-05-09'),
    array('2021-05-10', '2021-05-16'),
    array('2021-05-17', '2021-05-23'),
    array('2021-05-24', '2021-05-30'),
    array('2021-05-31', '2021-06-6'),
    array('2021-06-07', '2021-06-13'),
    array('2021-06-13', '2021-06-20'),
    array('2021-06-21', '2021-06-30'),
);
$config['luckydraw_round']  = array(
    array('2021-04-26', '2021-04-30'), // testing

    array('2021-05-01', '2021-05-16'),
    array('2021-05-17', '2021-05-31'),
    array('2021-06-01', '2021-06-15'),
    array('2021-06-16', '2021-06-30'),
);