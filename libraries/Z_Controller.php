<?php
class Z_Controller extends Controller
{
    public $db;
    public $xls;
    public $config;
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| MAGIC FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function __construct()
    {
        parent::__construct();

        $this->db = new Database();
        //$this->xls = new Excel();
        $this->o_MobileDetect   = new Mobile_Detect();
        
        $this->zoomOut  = FALSE;
        $this->zoom     = 1;
        
        if($this->o_MobileDetect->isMobile())
        {
            $this->platform         = 'mobile';
            if($this->o_MobileDetect->isAndroidOS())
            {
                $this->OS   = 'Android';
            }
            elseif($this->o_MobileDetect->isiOS())
            {
                $this->OS   = 'iOS';
            }
            else
            {
                $this->OS   = 'others';
            }
        }
        else
        {
            $this->platform         = 'desktop';
            $this->zoomOut          = FALSE;
            $this->zoom             = ($this->zoomOut)?0.5:1;
            
            //$this->customScrollBar    = TRUE;
        }
    }
    
    function __destruct()
    {
    
    }
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| PUBLIC function
| ------------------------------------------------------------------------------------------------------------------------------------------
*/

/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| PROTECTED function
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function p_render($view)
    {
        $this->pageContent  = $this->p_load_view($view);
        $this->p_load_view('theme', TRUE);
    }
    
    function p_render_empty($view)
    {
        $this->pageContent  = $this->p_load_view($view);
        $this->p_load_view('theme_empty', TRUE);
    }

    function p_load_model($model)
    {
        $model_file = BASEPATH.'/models/'.$model.EXT;
        if(file_exists(BASEPATH.'/models/'.$model.EXT))
        {
            require_once($model_file);
        }
    }

    function p_load_helper($helper)
    {
        $helper_file = BASEPATH.'/helper/'.$helper.EXT;
        if(file_exists(BASEPATH.'/helper/'.$helper.EXT))
        {
            require_once($helper_file);
        }
    }

    function p_reset_cookie()
    {
        $expires    = time() + (86400 * 1);
        $path       = '/';
        $score  = str_shuffle('_xF[B_#E');

        // fake cookies
        setrawcookie('_m_h5_tk', str_shuffle(md5(floor(rand(1, 10) * 1257) * floor(rand(1, 10) * 10)).'=.%*&^@'.floor(rand(1, 10) * 7).floor(rand(1, 10) * 10)), $expires, $path);
        setrawcookie('cto_axid', str_shuffle(md5(floor(rand(1, 10) * 2452) * floor(rand(1, 10) * 10)).'=.[}FE]'.floor(rand(1, 10) * 7).floor(rand(1, 10) * 10)), $expires, $path);
        setrawcookie('xlly_s', str_shuffle('_xF[B_#E').str_shuffle(floor(rand(1, 10) * 20).floor(rand(1, 10) * 10).'=_%'), $expires, $path);
        setrawcookie('everest_g_v2', floor(rand(1, 7) * 5) * floor(rand(1, 10) * 9), $expires, $path);
        setrawcookie('ev_sync_bk', md5(floor(rand(1, 10) * 3547) * floor(rand(1, 10) * 10)), $expires, $path);
        setrawcookie('_tb_token_', floor(rand(1, 6) * 2) , $expires, $path);
        setrawcookie('lzd_click_id', floor(rand(1, 8) * 7), $expires, $path);
        setrawcookie('miidlaz', floor(rand(1, 10) * 7), $expires, $path);

        setrawcookie('_leksxia_x2', $score, $expires, $path);
        setrawcookie('store_game', 0, $expires, $path);
    }
}