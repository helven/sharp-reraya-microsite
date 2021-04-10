<?php
class Auth extends Z_Controller
{

    protected $pa_Data		= array();
    protected $pa_SubTask	= array();
/*
| ------------------------------------------------------------------------------------------------------------------------------------------
| MAGIC FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function __construct()
    {
        parent::__construct();
        // ----------------------------------------------------------------------- //
        // LOAD models
        // ----------------------------------------------------------------------- //
        $this->p_load_model('MPlayer');
        // ----------------------------------------------------------------------- //
        // INIT variable
        // ----------------------------------------------------------------------- //
        $this->MPlayer	= new MPlayer();
    }

    function __destruct()
    {
        parent::__destruct();
    }
/*
| ------------------------------------------------------------------------------------------------------------------------------------------
| VIEW FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function index()
    {
        redirect(base_url().$this->router->directory.$this->router->class.'/login/');
    }

    function login()
    {
        // CHECK user login status
        if(isset($_SESSION['ss_Public']))
        {
            // REDIRECT to dashboard
            $location	= base_url();
            redirect($location);
        }

        if(isset($_POST['hdd_Action']))
        {
            $this->formError	= FALSE;
            $this->formErrorMsg	= '';

            $_POST['txt_Email']	= trim($_POST['txt_Email']);
            if(!isset($_POST['txt_Email']) || $_POST['txt_Email'] == '')
            {
                $this->formError	= TRUE;
                $this->formErrorMsg	.= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg	.= 'Please enter name.';
            }

            if(!isset($_POST['txt_Password']) || $_POST['txt_Password'] == '')
            {
                $this->formError	= TRUE;
                $this->formErrorMsg	.= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg	.= 'Please enter password.';
            }

            if(!$this->formError)
            {
                // CLEAN $_POST
                sec_clean_all_post($this->db->conn);
                // VERIFY user
                $a_user	= array(
                    'email'     => $_POST['txt_Email'],
                    'secret'    => encrypt_str($_POST['txt_Password']));
                $a_login = $this->MPlayer->verify_user($a_user);
                // ----------------------------------------------------------------------- //
                // FEEDBACK from verification
                // ----------------------------------------------------------------------- //
                // SUCCESS
                if($a_login['status'])
                {
                    $_SESSION['ss_Public']	= $a_login['a_data'];
                    
                    // REDIRECT to video list
                    $location	= base_url();
                    redirect($location);
                }
                else
                {
                    // FAILED
                    $_SESSION['ss_Msgbox']['msg']		= $a_login['msg'];
                    $_SESSION['ss_Msgbox']['msgType']	= 'error';
                }
            }
        }

        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('auth/login');
    }

    function logout()
    {
        session_destroy();
        unset($_SESSION['ss_Public']);
        
        redirect(base_url());
    }
/*
| ------------------------------------------------------------------------------------------------------------------------------------------
| PRIVATE FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/

}