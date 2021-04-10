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
}