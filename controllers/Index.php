<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once(BASEPATH.'/libraries/PHPMailer/src/Exception.php');
require_once(BASEPATH.'/libraries/PHPMailer/src/PHPMailer.php');

Class Index extends Z_Controller
{
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| MAGIC FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function __construct()
    {
        parent::__construct();
    }
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| PUBLIC function
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function index()
    {
        if($this->config['environment'] == 'live' && date('Y-m-d H:i:s') >= '2020-03-31 12:00:00')
        {
            redirect(base_url().'index/campaign-end/');
        }
        // ----------------------------------------------------------------------- //
        // INIT
        // ----------------------------------------------------------------------- //
        
        $cond	= '';
        // CHECK if postback
        if(isset($_POST['hdd_Action']))
        {
            $this->formError	= FALSE;
            $this->formErrorMsg	= '';

            $_POST['txt_Name']	= trim($_POST['txt_Name']);
            if(!isset($_POST['txt_Name']) || $_POST['txt_Name'] == '')
            {
                $this->formError	= TRUE;
                $this->formErrorMsg	.= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg	.= 'Please fill in your name.';
            }
            
            $_POST['txt_Phone']	= trim($_POST['txt_Phone']);
            if(!isset($_POST['txt_Phone']) || $_POST['txt_Phone'] == '')
            {
                $this->formError	= TRUE;
                $this->formErrorMsg	.= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg	.= 'Please fill in your phone no.';
            }
            $_POST['txt_IMEI']	= trim($_POST['txt_IMEI']);
            if(!isset($_POST['txt_IMEI']) || $_POST['txt_IMEI'] == '')
            {
                $this->formError	= TRUE;
                $this->formErrorMsg	.= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg	.= 'Please fill in IMEI.';
            }
            if(!isset($_POST['hdd_Location']) || $_POST['hdd_Location'] == '')
            {
                $this->formError	= TRUE;
                $this->formErrorMsg	.= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg	.= 'Please select your location.';
            }
            if(!isset($_POST['hdd_AgreeTnC']) || $_POST['hdd_AgreeTnC'] == '' || $_POST['hdd_AgreeTnC'] == 0)
            {
                $this->formError	= TRUE;
                $this->formErrorMsg	.= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg	.= 'Please agree to Terms and Conditions &amp; Privacy Policy.';
            }
            
            if(!$this->formError)
            {
                // ----------------------------------------------------------------------- //
                // CHECK if IMEI still available
                // ----------------------------------------------------------------------- //
                // GENERATE sql query
                $sql	= " SELECT *
                            FROM `imeis`
                            WHERE imeis.imei = '".sec_db_clean($this->db->conn, $_POST['txt_IMEI'])."'
                                AND status = 1
                            LIMIT 0,1";
                // EXECUTE sql query
                $Q  = $this->db->query($sql);
                if($Q->num_rows() <= 0) // GET submission info if IMEI redeemed to spin
                {
                    // GENERATE sql query
                    $sql	= " SELECT *
                                FROM `submissions`
                                WHERE submissions.imei = '".sec_db_clean($this->db->conn, $_POST['txt_IMEI'])."'
                                    AND status = 1
                                    AND spin_status = 0
                                LIMIT 0,1";
                    // EXECUTE sql query
                    $Q  = $this->db->query($sql);
                    if($Q->num_rows() <= 0)
                    {
                        redirect(base_url());
                    }
                    
                    $a_Submission = $Q->result();

                    $_SESSION['ss_Submission']	= $a_Submission;
                    
                    redirect(base_url().'index/spin-prize');

                    //$this->formError	= TRUE;
                    //$this->formErrorMsg	= addslashes('IMEI redeemed.');
                }
                else // ADD new submission
                {
                    $a_Imei = $Q->result();
                    // ----------------------------------------------------------------------- //
                    // CHECK if IMEI still available
                    // ----------------------------------------------------------------------- //
                    $sql    = " SELECT COUNT(*) AS redemption_count
                                FROM submissions
                                WHERE area = '{$_POST['hdd_Location']}'
                                    AND created_at BETWEEN '".date('Y-m-d 00:00:00')."' AND '".date('Y-m-d 23:59:59')."'";
                    // EXECUTE sql query
                    $Q  = $this->db->query($sql);

                    $redemptionCount    = $Q->result();
                    $redemptionCount    = $redemptionCount['redemption_count'];
                    // ----------------------------------------------------------------------- //
                    // DETERMINE prize
                    // ----------------------------------------------------------------------- //
                    if($redemptionCount > $this->config['area_prize'][$_POST['hdd_Location']]) // no prize
                    {
                        $prize  = 0;
                    }
                    else // random prize
                    {
                        $prize  = rand(0, 7);
                    }
                    // ----------------------------------------------------------------------- //
                    // UPDATE IMEI status
                    // ----------------------------------------------------------------------- //
                    $sql	= "	UPDATE imeis SET status = 19 WHERE id = {$a_Imei['id']}";
                    // BEGIN mysql transaction
                    $this->db->trans_start();
                    // EXECUTE sql query
                    $Q	= $this->db->query($sql);
                    // END mysql transaction
                    $this->db->trans_complete();
                    
                    $a_Insert	= array(
                        'ip'            => $_SESSION['ss_Geo']['ip'],
                        'name'          => $_POST['txt_Name'],
                        'phone'         => $_POST['txt_Phone'],
                        'imei'          => $_POST['txt_IMEI'],
                        'area'          => $_POST['hdd_Location'],
                        'spin_status'   => 0,
                        'spin_prize'    => $prize,
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s')
                    );
                    
                    // CLEAN data before insert
                    foreach($a_Insert as &$insert)
                    {
                        $insert	= sec_db_clean($this->db->conn, $insert);
                    }
                    
                    // ----------------------------------------------------------------------- //
                    // INSERT submission to database
                    // ----------------------------------------------------------------------- //
                    $sql    = " INSERT INTO `submissions` SET 
                                    ip          = '{$a_Insert['ip']}',
                                    name        = '{$a_Insert['name']}',
                                    phone       = '{$a_Insert['phone']}',
                                    area        = {$a_Insert['area']},
                                    imei        = {$a_Insert['imei']},
                                    spin_status = {$a_Insert['spin_status']},
                                    spin_prize  = {$a_Insert['spin_prize']},
                                    created_at  = '{$a_Insert['created_at']}',
                                    updated_at  = '{$a_Insert['updated_at']}'";
                    // BEGIN mysql transaction
                    $this->db->trans_start();
                    // EXECUTE sql query
                    $Q	= $this->db->query($sql);
                    $submissionID   = $Q->insert_id();
                    // END mysql transaction
                    $this->db->trans_complete();
                    $_SESSION['ss_Submission']	= $a_Insert;
                    $_SESSION['ss_Submission']['submission_id']	= $submissionID;
                    
                    redirect(base_url().'index/spin-prize');
                }
            }
        }
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('index/index');
    }

    function spin_prize()
    {
        if($this->config['environment'] == 'live' && date('Y-m-d H:i:s') >= '2020-03-31 12:00:00')
        {
            redirect(base_url().'index/campaign-end/');
        }
        if(!isset($_SESSION['ss_Submission']))
        {
            redirect(base_url());
        }
        
        $cond	= '';
        // CHECK if postback
        if(isset($_POST['hdd_Action']))
        {
            // ----------------------------------------------------------------------- //
            // UPDATE submission spin status
            // ----------------------------------------------------------------------- //
            $sql	= "	UPDATE submission SET spin_status = 1 WHERE id = {$_SESSION['ss_Submission']['id']}";
            // BEGIN mysql transaction
            $this->db->trans_start();
            // EXECUTE sql query
            $Q	= $this->db->query($sql);
            // END mysql transaction
            $this->db->trans_complete();

            redirect(base_url().'thank-you');
        }
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('index/spin_prize');
    }
    
    function campaign_end()
    {
        // ----------------------------------------------------------------------- //
        // INIT
        // ----------------------------------------------------------------------- //
        $a_Geo	= $this->_get_geo();
        $_SESSION['ss_Geo']	= $a_Geo;
        
        $this->geoCountryCode	= (in_array(strtolower($_SESSION['ss_Geo']['country_code']), array('my', 'sg')))?$_SESSION['ss_Geo']['country_code']:'MY';
        $this->a_HomeLink		= array(
            'my'	=> 'https://baskinrobbins.com.my/content/baskinrobbins/en.html',
            'sg'	=> 'http://baskinrobbins.com.sg/content/baskinrobbins/en.html'
        );
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('index/campaign_end');
    }
    
    function thank_you()
    {
        $a_Geo	= $this->_get_geo();
        $_SESSION['ss_Geo']	= $a_Geo;
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('index/thank_you');
    }
    
    function ajax_get_session_id()
    {
        if(!$this->db)
        {
            $a_Rtn	= array(
                'status'	=> FALSE,
                'message'	=> 'D failed.'
            );
            
            echo json_encode($a_Rtn);
            exit;
        }
        $geoCountryCode	= (in_array(strtolower($_SESSION['ss_Geo']['country_code']), array('my', 'sg')))?$_SESSION['ss_Geo']['country_code']:'MY';
        $sessionID	= uniqid().uniqid().uniqid();
        $sessionID	= sec_db_clean($this->db->conn, $sessionID);
        try
        {
            // ----------------------------------------------------------------------- //
            // UPDATE voucher status
            // ----------------------------------------------------------------------- //
            // SLOW query (safe, possible deadlock, requires strong server if highload)
            $voucherCountry	= strtolower($geoCountryCode);
            $sql	= "	UPDATE z_voucher_1 SET
                            voucher_status_id = 19,
                            voucher_session_id = '{$sessionID}'
                        WHERE voucher_id = (
                            SELECT voucher_id
                            FROM `z_voucher`
                            WHERE voucher_country = '".sec_db_clean($this->db->conn, $voucherCountry)."'
                                AND voucher_status_id = 1
                            LIMIT 0,1
                        )";
            // FAST query
            $sql	= "	UPDATE z_voucher_1 SET
                            voucher_status_id = 19,
                            voucher_session_id = '{$sessionID}'
                        WHERE voucher_status_id = 1 
                            AND voucher_country = '".sec_db_clean($this->db->conn, $voucherCountry)."'
                            LIMIT 1";
            // BEGIN mysql transaction
            $this->db->trans_start();
            // EXECUTE sql query
            $Q	= $this->db->query($sql);
            // END mysql transaction
            $this->db->trans_complete();
            
            if($Q->affected_row() > 0)
            {
                $a_Rtn	= array(
                    'status'	=> TRUE,
                    'session_id'=> $sessionID,
                    'message'	=> ''
                );
                
                echo json_encode($a_Rtn);
                exit;
            }
            
            $a_Rtn	= array(
                'status'	=> FALSE,
                'message'	=> 'Session failed.'
            );
            
            echo json_encode($a_Rtn);
            exit;
        }
        catch(Exception $e)
        {
            $a_Rtn	= array(
                'status'	=> FALSE,
                'message'	=> 'EX failed.'
            );
            
            echo json_encode($a_Rtn);
            exit;
        }
    }
/* 
| ------------------------------------------------------------------------------------------------------------------------------------------
| PRIVATE function
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    private function _get_client_ip() {
        global $config;

        $ip = '';
        if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $config['environment'] != 'dev')
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        else
        {
            $ip = '121.121.16.77'; // 1Techpark ip
        }

        $_SESSION['ss_Geo']['ip']   = $ip;

        return $ip;
    }
}