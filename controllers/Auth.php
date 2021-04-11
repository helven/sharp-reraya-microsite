<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once(BASEPATH.'/libraries/PHPMailer/src/Exception.php');
require_once(BASEPATH.'/libraries/PHPMailer/src/PHPMailer.php');

class Auth extends Z_Controller
{
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
        $this->MPlayer  = new MPlayer();
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

    function sign_up()
    {
        // CHECK user login status
        if(isset($_SESSION['ss_Public']))
        {
            // REDIRECT to dashboard
            $location   = base_url();
            redirect($location);
        }

        if(isset($_POST['hdd_Action']))
        {
            $this->formError    = FALSE;
            $this->formErrorMsg = '';

            $_POST['txt_Email'] = trim($_POST['txt_Email']);
            if(!isset($_POST['txt_Email']) || $_POST['txt_Email'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter name.';
            }

            if(!isset($_POST['txt_Password']) || $_POST['txt_Password'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter password.';
            }

            if(!isset($_POST['txt_ConfPassword']) || $_POST['txt_ConfPassword'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter confirm password.';
            }

            if($_POST['txt_Password'] != $_POST['txt_ConfPassword'])
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Password and confirm password does not match.';
            }

            if(!$this->formError)
            {
                // CLEAN $_POST
                sec_clean_all_post($this->db->conn);

                // CHECK player
                $a_cond = array(
                    'table'     => 'players',
                    'field'     => 'email',
                    'value'     => $_POST['txt_Email'],
                    'compare'=> '='
                );
                $player_exist   = $this->MPlayer->check_player_exist($a_cond);

                if($player_exist)
                {
                    $this->formError    = TRUE;
                    $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                    $this->formErrorMsg .= 'Password and confirm password does not match.';
                }
                else
                {
                    // INSERT player
                    $cdate  = date('Y-m-d H:i:s');
                    $a_insert   = array(
                        'status'        => 1,
                        'name'          => $_POST['txt_Name'],
                        'email'         => $_POST['txt_Email'],
                        'phone'         => $_POST['txt_Phone'],
                        'password'      => '',
                        'secret'        => encrypt_str($_POST['txt_Password']),
                        'remember_token'=> '',
                        'created_at'  => $cdate,
                        'updated_at'  => $cdate
                    );
                    $insert = $this->MPlayer->insert_player($a_insert);

                    if($insert['status'])
                    {
                        // AUTO login after Sign Up
                        $a_cond= array(
                            'table' => 'players',
                            'field'     => 'id',
                            'value'     => $insert['player_id'],
                            'compare'=> '='
                        );
                        $a_user = $this->MPlayer->get_player($a_cond);
        
                        if($a_user['status'])
                        {
                            unset($a_user['a_data']['password']);
                            unset($a_user['a_data']['secret']);
        
                            $_SESSION['ss_Public']  = $a_user['a_data'];
        
                            $token      = encrypt_str($a_user['a_data']['email'].'|'.date('Y-m-d H:i:s'));
                            $expires    = time() + (86400 * 30);
                            $path       = '/';
                            setrawcookie('c_user', '', $expires, $path);
                            setrawcookie('remember_token', '', $expires, $path);

                            // REDIRECT to home
                            $location   = base_url();
        
                            // STORE game
                            if($_COOKIE['store_game'] == 1)
                            {
                                if($this->_store_game())
                                {
                                    $location   = base_url().'game';
                                }
                            }
                        }
                    }
                }
            }

            redirect($location);
        }

        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('auth/sign_up');
    }

    function login()
    {
        // CHECK user login status
        if(isset($_SESSION['ss_Public']))
        {
            // REDIRECT to dashboard
            $location   = base_url();
            redirect($location);
        }

        // Login with cookies (Remember Me)
        if(isset($_COOKIE['c_user']) && $_COOKIE['c_user'] != '' && isset($_COOKIE['remember_token']) && $_COOKIE['remember_token'] != '')
        {
            // VERIFY cookie
            $decrypted_token    = decrypt_str(decrypt_str($_COOKIE['remember_token']));
            list($email, $date) = explode('|', $decrypted_token);

            if($email != $_COOKIE['c_user'])
            {
                $expires    = time() + (86400 * 30);
                $path       = '/';
                setrawcookie('c_user', '', $expires, $path);
                setrawcookie('remember_token', '', $expires, $path);
            }
            else
            {
                $a_cond= array(
                    'relation'  => 'AND',
                    'items'     => array(
                        array(
                            'table'     => 'players',
                            'field'     => 'email',
                            'value'     => $_COOKIE['c_user'],
                            'compare'=> '='
                        ),
                        array(
                            'table'     => 'players',
                            'field'     => 'remember_token',
                            'value'     => decrypt_str($_COOKIE['remember_token']),
                            'compare'=> '='
                        )
                    )
                );
                $a_user = $this->MPlayer->get_player($a_cond);

                if($a_user['status'])
                {
                    unset($a_user['a_data']['password']);
                    unset($a_user['a_data']['secret']);

                    $_SESSION['ss_Public']  = $a_user['a_data'];

                    $token      = encrypt_str($a_user['a_data']['email'].'|'.date('Y-m-d H:i:s'));
                    $expires    = time() + (86400 * 30);
                    $path       = '/';
                    setrawcookie('c_user', $a_user['a_data']['email'], $expires, $path);
                    setrawcookie('remember_token', encrypt_str($token), $expires, $path);

                    // REDIRECT to home
                    $location   = base_url();

                    // STORE game
                    if($_COOKIE['store_game'] == 1)
                    {
                        if($this->_store_game())
                        {
                            $location   = base_url().'game';
                        }
                    }

                    redirect($location);
                }
            }
        }

        if(isset($_POST['hdd_Action']))
        {
            $this->formError    = FALSE;
            $this->formErrorMsg = '';

            $_POST['txt_Email'] = trim($_POST['txt_Email']);
            if(!isset($_POST['txt_Email']) || $_POST['txt_Email'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter name.';
            }

            if(!isset($_POST['txt_Password']) || $_POST['txt_Password'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter password.';
            }

            if(!$this->formError)
            {
                // CLEAN $_POST
                sec_clean_all_post($this->db->conn);
                // VERIFY user
                $a_user     = array(
                    'email'     => $_POST['txt_Email'],
                    'secret'    => encrypt_str($_POST['txt_Password']));
                $a_login    = $this->MPlayer->verify_user($a_user);

                // REMEMBER Me
                if($_POST['chk_RememberMe'] == 1)
                {
                    $token      = encrypt_str($_POST['txt_Email'].'|'.date('Y-m-d H:i:s'));

                    $a_cond = array(
                        'table'     => 'players',
                        'field'     => 'email',
                        'value'     => $_POST['txt_Email'],
                        'compare'=> '='
                    );
                    $a_update   = array(
                        'remember_token'    => $token
                    );
                    $a_update_user = $this->MPlayer->update_player($a_cond, $a_update);

                    $expires    = time() + (86400 * 30);
                    $path       = '/';
                    setrawcookie('c_user', $_POST['txt_Email'], $expires, $path);
                    setrawcookie('remember_token', encrypt_str($token), $expires, $path);
                }

                // ----------------------------------------------------------------------- //
                // FEEDBACK from verification
                // ----------------------------------------------------------------------- //
                // SUCCESS
                if($a_login['status'])
                {
                    unset($a_login['a_data']['password']);
                    unset($a_login['a_data']['secret']);

                    $_SESSION['ss_Public']  = $a_login['a_data'];

                    // REDIRECT to home
                    $location   = base_url();

                    // STORE game
                    if($_COOKIE['store_game'] == 1)
                    {
                        if($this->_store_game())
                        {
                            $location   = base_url().'game';
                        }
                    }

                    redirect($location);
                }
                else
                {
                    // FAILED
                    $_SESSION['ss_Msgbox']['msg']       = $a_login['msg'];
                    $_SESSION['ss_Msgbox']['msgType']   = 'error';
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
        // RESET cookie
        $this->p_reset_cookie();

        session_destroy();
        unset($_SESSION['ss_Public']);

        $expires    = time() + (86400 * 30);
        $path       = '/';
        setrawcookie('c_user', '', $expires, $path);
        setrawcookie('remember_token', '', $expires, $path);

        redirect(base_url());
    }

    function forgot_password()
    {
        

        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('auth/forgot_password');
    }
/*
| ------------------------------------------------------------------------------------------------------------------------------------------
| PRIVATE FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    private function _store_game()
    {
        $this->p_load_model('MSubmission');
        $this->MSubmission  = new MSubmission();

        $score   = str_replace(array('_','x','F','B','E','#'), '', $_COOKIE['_leksxia_x2']);
        if($score != '')
        {
            $cdate  = date('Y-m-d H:i:s');
            $a_insert   = array(
                'player_id'   => $_SESSION['ss_Public']['id'],
                'status'      => 1,
                'ip'          => $_SESSION['ss_Geo']['ip'],
                'score'       => $score,
                'is_hacking'  => 0,
                'created_at'  => $cdate,
                'updated_at'  => $cdate
            );

            $insert = $this->MSubmission->insert_submission($a_insert);
            $location   = base_url().'game';

            // RESET cookie
            $this->p_reset_cookie();

            return TRUE;
        }

        return FALSE;
    }
}