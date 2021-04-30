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
        $this->page_title   = 'Sign Up';

        // CHECK user login status
        if(check_auth())
        {
            // REDIRECT to dashboard
            $location   = base_url();

            if(isset($_SESSION['ss_LoginRedirect']) && $_SESSION['ss_LoginRedirect'] != '')
            {
                $location   = $_SESSION['ss_LoginRedirect'];
            }

            $_SESSION['ss_LoginRedirect']   = '';
            unset($_SESSION['ss_LoginRedirect']);

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
                $this->formErrorMsg .= 'Please enter email.';
            }

            $_POST['txt_Phone'] = trim($_POST['txt_Phone']);
            if(!isset($_POST['txt_Phone']) || $_POST['txt_Phone'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter mobile no.';
            }

            $_POST['txt_Address'] = trim($_POST['txt_Address']);
            if(!isset($_POST['txt_Address']) || $_POST['txt_Address'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter address.';
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

            if(!isset($_POST['chk_AgreeTnC']) || $_POST['chk_AgreeTnC'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please agree Terms and Conditions.';
            }

            if(!isset($_POST['chk_AgreePrivacyPolicy']) || $_POST['chk_AgreePrivacyPolicy'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please agree Privacy Policy.';
            }

            // CLEAN $_POST
            sec_clean_all_post($this->db->conn);

            // CHECK email
            $a_cond = array(
                'table'     => 'players',
                'field'     => 'email',
                'value'     => $_POST['txt_Email'],
                'compare'   => '='
            );
            
            $a_cond= array(
                'relation'  => 'OR',
                'items'     => array(
                    array(
                        'table'     => 'players',
                        'field'     => 'email',
                        'value'     => $_POST['txt_Email'],
                        'compare'   => '='
                    ),
                    array(
                        'table'     => 'players',
                        'field'     => 'phone',
                        'value'     => $_POST['txt_Phone'],
                        'compare'   => '='
                    )
                )
            );

            $a_user = $this->MPlayer->get_player($a_cond);

            if($a_user['status'])
            {
                $a_user = $a_user['a_data'];

                if($a_user['email'] == $_POST['txt_Email'])
                {
                    $this->formError    = TRUE;
                    $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                    $this->formErrorMsg .= 'The email already exists.';
                }
                if($a_user['phone'] == $_POST['txt_Phone'])
                {
                    $this->formError    = TRUE;
                    $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                    $this->formErrorMsg .= 'The mobile no. already exists.';
                }
            }

            if(!$this->formError)
            {
                // INSERT player
                $cdate  = date('Y-m-d H:i:s');
                $a_insert   = array(
                    'status'        => 2,
                    'name'          => strip_tags($_POST['txt_Name']),
                    'email'         => strip_tags($_POST['txt_Email']),
                    'phone'         => strip_tags($_POST['txt_Phone']),
                    'address'       => nl2br(strip_tags($_POST['txt_Address'])),
                    'password'      => password_hash($_POST['txt_Password'], PASSWORD_DEFAULT), // Laravel password hashing
                    'secret'        => encrypt_password($_POST['txt_Password']),
                    'remember_token'=> '',
                    'created_at'  => $cdate,
                    'updated_at'  => $cdate
                );
                $insert = $this->MPlayer->insert_player($a_insert);

                if($insert['status'])
                {
                    // AUTO login after Sign Up
                    // $a_cond= array(
                    //     'table'     => 'players',
                    //     'field'     => 'id',
                    //     'value'     => $insert['player_id'],
                    //     'compare'   => '='
                    // );
                    // $a_user = $this->MPlayer->get_player($a_cond);

                    // if($a_user['status'])
                    // {
                    //     unset($a_user['a_data']['password']);
                    //     unset($a_user['a_data']['secret']);
    
                    //     $_SESSION['ss_Public']  = $a_user['a_data'];

                    //     // $token      = encrypt_str($a_user['a_data']['email'].'|'.date('Y-m-d H:i:s'));
                    //     // $expires    = time() + (86400 * 30);
                    //     // $path       = '/';
                    //     // setrawcookie('c_user', '', $expires, $path);
                    //     // setrawcookie('remember_token', '', $expires, $path);
                    // }

                    // REDIRECT to home
                    $location   = base_url();

                    // STORE game
                    if($_COOKIE['store_game'] == 1)
                    {
                        $game_stored    = $this->_store_game();
                        if($game_stored)
                        {
                            $location   = base_url().'game';
                        }
                    }

                    // ----------------------------------------------------------------------- //
                    // SEND email (PHPMailer)
                    // ----------------------------------------------------------------------- //
                    $to                 = $_POST['txt_Email'];
                    $subject            = 'Sharp Re-Raya Email Verification';
                    $key                = urlencode(encrypt_str($_POST['txt_Email'].'|'.$cdate));
                    $login              = urlencode(encrypt_str($_POST['txt_Email']));
                    $this->verify_link  = base_url().'auth/verify-email?action=ve&key='.$key.'&login='.$login;

                    $message = $this->p_load_view('email_template/verify_email');
                    
                    $mail = new PHPMailer;
                    $mail->setFrom(strip_tags($this->config['mail_admin_email']), 'Sharp Re-Raya');
                    $mail->AddReplyTo(strip_tags($this->config['mail_admin_email']), 'Sharp Re-Raya');
                    $mail->addAddress($to);
                    $mail->Subject = $subject;
                    $mail->IsHTML(TRUE);
                    $mail->msgHTML($message);
                    
                    $email_status   = $mail->send();
                    
                    $_SESSION['ss_Msgbox']['title']		= 'Success!';
                    $_SESSION['ss_Msgbox']['message']	= 'Thank you for signing up!<br /><br />';
                    $_SESSION['ss_Msgbox']['message']   .= ($game_stored)?'Your game score is recorded!<br />':'';
                    $_SESSION['ss_Msgbox']['message']   .= 'You will receive a verification email shortly. Please check your email and verify to proceed.';
                    $_SESSION['ss_Msgbox']['type']		= 'Success';

                    redirect($location);
                }
                else
                {
                    $this->formError    = TRUE;
                    $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                    $this->formErrorMsg .= 'Failed sign up, please try again.';
                }
            }
        }

        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('auth/sign_up');
    }

    function verify_email()
    {
        $this->page_title   = 'Verify Email';

        if(
            (!isset($_GET['action']) || $_GET['action'] == '' || $_GET['action'] != 've')
            || (!isset($_GET['key']) || $_GET['key'] == '')
            || (!isset($_GET['login']) || $_GET['login'] == '')
        )
        {
            $_SESSION['ss_Msgbox']['title']		= 'Oops!';
            $_SESSION['ss_Msgbox']['message']	= 'Invalid email verification.';
            $_SESSION['ss_Msgbox']['type']		= 'error';

            redirect(base_url().'auth/login');
            exit;
        }

        sec_clean_all_get($this->db->conn);

        $key    = decrypt_str($_GET['key']);
        list($email, $date)  = explode('|', $key);
        $login    = decrypt_str($_GET['login']);

        if($email != $login)
        {
            $_SESSION['ss_Msgbox']['title']		= 'Oops!';
            $_SESSION['ss_Msgbox']['message']	= 'Invalid email verification.';
            $_SESSION['ss_Msgbox']['type']		= 'error';

            redirect(base_url().'auth/login');
            exit;
        }
        
        $a_cond = array(
            'table'     => 'players',
            'field'     => 'email',
            'value'     => $login,
            'compare'   => '='
        );
        $a_update   = array(
            'status'            => 1,
            'email_verified_at' => date('Y-m-d H:i:s')
        );
        $a_update_user = $this->MPlayer->update_player($a_cond, $a_update);

        $_SESSION['ss_Msgbox']['title']		= 'Success!';
        $_SESSION['ss_Msgbox']['message']	= 'Your account has been successfully verified!<br />Please login to proceed.';
        $_SESSION['ss_Msgbox']['type']		= 'success';

        redirect(base_url().'auth/login');
        exit;
    }

    function login()
    {
        $this->page_title   = 'Login';

        $location   = base_url();

        if(isset($_SESSION['ss_LoginRedirect']) && $_SESSION['ss_LoginRedirect'] != '')
        {
            $location   = $_SESSION['ss_LoginRedirect'];
        }

        // CHECK user login status
        if(isset($_SESSION['ss_Public']))
        {
            $_SESSION['ss_LoginRedirect']   = '';
            unset($_SESSION['ss_LoginRedirect']);
            
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
                            'compare'   => '='
                        ),
                        array(
                            'table'     => 'players',
                            'field'     => 'remember_token',
                            'value'     => decrypt_str($_COOKIE['remember_token']),
                            'compare'   => '='
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

                    // STORE game
                    if($_COOKIE['store_game'] == 1)
                    {
                        if($this->_store_game())
                        {
                            $location   = base_url().'game/leaderboard';
                        }
                    }

                    if(isset($_SESSION['ss_LoginRedirect']) && $_SESSION['ss_LoginRedirect'] != '')
                    {
                        $location   = $_SESSION['ss_LoginRedirect'];
                    }

                    $_SESSION['ss_LoginRedirect']   = '';
                    unset($_SESSION['ss_LoginRedirect']);

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
                $this->formErrorMsg .= 'Please enter email.';
            }

            if(!isset($_POST['txt_Password']) || $_POST['txt_Password'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter password.';
            }

            if(!$this->formError)
            {
                $location   = base_url().'auth/login';

                // CLEAN $_POST
                sec_clean_all_post($this->db->conn);

                $a_cond= array(
                    'relation'  => 'AND',
                    'items'     => array(
                        array(
                            'table'     => 'players',
                            'field'     => 'email',
                            'value'     => $_POST['txt_Email'],
                            'compare'   => '='
                        )
                    )
                );
                $a_login = $this->MPlayer->get_player($a_cond);

                if(!$a_login['status'])
                {
                    // email not found
                    $_SESSION['ss_Msgbox']['title']     = 'Oops!';
                    $_SESSION['ss_Msgbox']['message']   = 'We\'re sorry. The User ID is not found.';
                    $_SESSION['ss_Msgbox']['type']      = 'error';

                    redirect(base_url().'auth/login');
                }

                $a_login    = $a_login['a_data'];

                if($a_login['secret'] != encrypt_password($_POST['txt_Password']))
                {
                    // wrong password
                    $_SESSION['ss_Msgbox']['title']     = 'Oops!';
                    $_SESSION['ss_Msgbox']['message']   = 'The User ID/Password entered is invalid. Please try again.';
                    $_SESSION['ss_Msgbox']['type']      = 'error';

                    redirect(base_url().'auth/login');
                }

                // STORE game
                if($_COOKIE['store_game'] == 1)
                {
                    $game_stored    = $this->_store_game();
                    if($game_stored)
                    {
                        $_SESSION['ss_Msgbox']['title']     = 'Yay!';
                        $_SESSION['ss_Msgbox']['message']   = 'Your game score is recorded!<br />';
                        $_SESSION['ss_Msgbox']['type']      = 'success';

                        $location   = base_url().'game/leaderboard';
                    }
                }

                // CHECK if account is verified
                if($a_login['status'] == 2)
                {
                    $_SESSION['ss_Msgbox']['title']     = 'Oops!';
                    $_SESSION['ss_Msgbox']['message']   = ($game_stored)?'Your game score is recorded!<br />':'';
                    $_SESSION['ss_Msgbox']['message']   .= 'Account is not verified<br />Please check your email and verify to proceed.';
                    $_SESSION['ss_Msgbox']['type']      = 'error';

                    redirect($location);
                }

                // REMEMBER Me
                if($_POST['chk_RememberMe'] == 1)
                {
                    $token      = encrypt_str($_POST['txt_Email'].'|'.date('Y-m-d H:i:s'));

                    $a_cond = array(
                        'table'     => 'players',
                        'field'     => 'email',
                        'value'     => $_POST['txt_Email'],
                        'compare'   => '='
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

                unset($a_login['password']);
                unset($a_login['secret']);

                $_SESSION['ss_Public']  = $a_login;

                if(isset($_SESSION['ss_LoginRedirect']) && $_SESSION['ss_LoginRedirect'] != '')
                {
                    $location   = $_SESSION['ss_LoginRedirect'];
                }

                $_SESSION['ss_LoginRedirect']   = '';
                unset($_SESSION['ss_LoginRedirect']);

                redirect($location);
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

        $this->p_render('auth/logout');

        redirect(base_url());
    }

    function forgot_password()
    {
        $this->page_title   = 'Forgot Password';

        if(isset($_POST['hdd_Action']))
        {
            if(!isset($_POST['txt_Email']) || $_POST['txt_Email'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter email.';
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
                    'compare'   => '='
                );
                $player_exist   = $this->MPlayer->check_player_exist($a_cond);

                if(!$player_exist)
                {
                    $_SESSION['ss_Msgbox']['title']		= 'Oops!';
                    $_SESSION['ss_Msgbox']['message']	= 'Invalid Reset Password link.';
                    $_SESSION['ss_Msgbox']['type']		= 'error';

                    redirect(base_url().'auth/forgot-password');
                    exit;
                }
                else
                {
                    // ----------------------------------------------------------------------- //
                    // SEND email (PHPMailer)
                    // ----------------------------------------------------------------------- //
                    $to                 = $_POST['txt_Email'];
                    $subject            = 'Sharp Re-Raya Reset Password';
                    $key                = urlencode(encrypt_str($_POST['txt_Email'].'|'.date('Y-m-d', strtotime('+3 days'))));
                    $login              = urlencode(encrypt_str($_POST['txt_Email']));
                    $this->reset_link   = base_url().'auth/reset-password?action=rp&key='.$key.'&login='.$login;

                    $message = $this->p_load_view('email_template/reset_password');
                    
                    $mail = new PHPMailer;
                    $mail->setFrom(strip_tags($this->config['mail_admin_email']), 'Sharp Re-Raya');
                    $mail->AddReplyTo(strip_tags($this->config['mail_admin_email']), 'Sharp Re-Raya');
                    $mail->addAddress($to);
                    $mail->Subject = $subject;
                    $mail->IsHTML(TRUE);
                    $mail->msgHTML($message);
                    
                    $email_status   = $mail->send();

                    $_SESSION['ss_Msgbox']['title']		= 'Success!';
                    $_SESSION['ss_Msgbox']['message']	= 'An email has been sent to '.$_POST['txt_Email'].'<br /><br />Please check your email and follow the instructions provided to reset your password.';
                    $_SESSION['ss_Msgbox']['type']		= 'success';
                }
            }
        }
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('auth/forgot_password');
    }

    function reset_password()
    {
        $this->page_title   = 'Reset Password';

        if(isset($_POST['hdd_Action']))
        {
            $this->formError    = FALSE;
            $this->formErrorMsg = '';

            if(!isset($_SESSION['ss_ResetPwd']) || $_SESSION['ss_ResetPwd'] == '')
            {
                $_SESSION['ss_Msgbox']['title']		= 'Oops!';
                $_SESSION['ss_Msgbox']['message']	= 'Unidentified error occured.';
                $_SESSION['ss_Msgbox']['type']		= 'error';

                redirect(base_url());
                exit;
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

                $a_cond = array(
                    'table'     => 'players',
                    'field'     => 'id',
                    'value'     => $_SESSION['ss_ResetPwd']['id'],
                    'compare'   => '='
                );
                $a_update   = array(
                    'password'  => password_hash($_POST['txt_Password'], PASSWORD_DEFAULT),
                    'secret'    => encrypt_password($_POST['txt_Password'])
                );
                $a_update_user = $this->MPlayer->update_player($a_cond, $a_update);

                $_SESSION['ss_Msgbox']['title']		= 'Success!';
                $_SESSION['ss_Msgbox']['message']	= 'Password Successfully reset.';
                $_SESSION['ss_Msgbox']['type']		= 'Success';

                redirect(base_url().'auth/login');
                exit;
            }
        }
        else
        {
            if(
                (!isset($_GET['action']) || $_GET['action'] == '' || $_GET['action'] != 'rp')
                || (!isset($_GET['key']) || $_GET['key'] == '')
                || (!isset($_GET['login']) || $_GET['login'] == '')
            )
            {
                $_SESSION['ss_Msgbox']['title']		= 'Oops!';
                $_SESSION['ss_Msgbox']['message']	= 'Invalid Reset Password link.';
                $_SESSION['ss_Msgbox']['type']		= 'error';

                redirect(base_url().'auth/login');
                exit;
            }

            sec_clean_all_get($this->db->conn);

            $key    = decrypt_str($_GET['key']);
            list($email, $expires)  = explode('|', $key);
            $login    = decrypt_str($_GET['login']);

            if($email != $login)
            {
                $_SESSION['ss_Msgbox']['title']		= 'Oops!';
                $_SESSION['ss_Msgbox']['message']	= 'Invalid Reset Password link.';
                $_SESSION['ss_Msgbox']['type']		= 'error';

                redirect(base_url().'auth/login');
                exit;
            }


            $day_difference = day_difference(date('Y-m-d'), $expires);

            if($day_difference < 0)
            {
                $_SESSION['ss_Msgbox']['title']		= 'Oops!';
                $_SESSION['ss_Msgbox']['message']	= 'Reset Password link has expired.';
                $_SESSION['ss_Msgbox']['type']		= 'error';

                redirect(base_url().'auth/forgot-password');
                exit;
            }

            $a_cond= array(
                'table'     => 'players',
                'field'     => 'email',
                'value'     => $email,
                'compare'   => '='
            );
            $a_user = $this->MPlayer->get_player($a_cond);
            
            if(!$a_user['status'])
            {
                $_SESSION['ss_Msgbox']['title']		= 'Oops!';
                $_SESSION['ss_Msgbox']['message']	= 'Account does not exists.';
                $_SESSION['ss_Msgbox']['type']		= 'error';

                redirect(base_url().'auth/forgot-password');
                exit;
            }
            
            $_SESSION['ss_ResetPwd']    = $a_user['a_data'];
        }
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('auth/reset_password');
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