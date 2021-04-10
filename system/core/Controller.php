<?php
class Controller
{
    public $db;
    public $xls;
    public $config;
    public $className;
    public $methodName;
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| MAGIC FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function __construct()
    {
        global $config;
        $this->config	= $config;

        session_start();

        $_SESSION['ss_Geo']['ip']   = $this->get_client_ip();
    }
    
    function __destruct()
    {
    
    }
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| PUBLIC function
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function z_construct()
    {
        $this->pageName	= str_replace('_', ' ', $this->methodName);
        $this->pageName	= str_replace(' ', '', ucwords($this->pageName));
        $this->pageName	= $this->className.'_'.$this->pageName;
    }

    function get_client_ip()
    {
        $ip	= '';
        if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $config['environment'] != 'dev')
        {
            $ip	= $_SERVER['REMOTE_ADDR'];
        }
        else
        {
            $ip	= '121.121.16.77'; // 1Techpark ip
        }

        return $ip;
    }
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| PROTECTED function
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function p_load_view($view, $autorender=FALSE)
    {
        if(!$autorender)
        {
            ob_start();
            require_once(BASEPATH.'/views/'.$view.EXT);
            return ob_get_clean();
        }
        else
        {
            require_once(BASEPATH.'/views/'.$view.EXT);
        }
    }
}