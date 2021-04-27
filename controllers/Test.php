<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once(BASEPATH.'/libraries/PHPMailer/src/Exception.php');
require_once(BASEPATH.'/libraries/PHPMailer/src/PHPMailer.php');

Class Test extends Z_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function send_email()
	{
		$this->msg	= '';
		// CHECK if postback
		if(isset($_POST['txt_Email']))
		{
			/*$to			= $_POST['txt_Email'];
			$subject	= 'HAPPY BR DAY to you!!';
			$headers	= "From: Baskin Robbins " . strip_tags($this->config['mail_admin_email']) . "\r\n";
			$headers	.= "Reply-To: Baskin Robbins ". strip_tags($this->config['mail_admin_email']) . "\r\n";
			//$headers	.= "CC: susan@example.com\r\n";
			$headers	.= "MIME-Version: 1.0\r\n";
			$headers	.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			$this->voucherCode				= 'TEST_VOUCHER';
			$this->voucherValidationCode	= 'TEST_VALIDATION';
			
			$message = $this->p_load_view('email_template/submission');
			
			$this->emailStatus	= mail($to, $subject, $message, $headers);
			$this->msg	= ($this->emailStatus)?'Email Sent.':'Email Not Sent!';*/
			
			$to			= $_POST['txt_Email'];
			$subject	= 'HAPPY BR DAY to you!!';
			
			$this->voucherCode				= 'TEST_VOUCHER';
			$this->voucherValidationCode	= 'TEST_VALIDATION';
			
			$mail = new PHPMailer;
			
			$mail->setFrom(strip_tags($this->config['mail_admin_email']), 'Baskin Robbins');
			$mail->AddReplyTo(strip_tags($this->config['mail_admin_email']), 'Baskin Robbins');
			$mail->addAddress($_POST['txt_Email']);
			$mail->Subject = 'HAPPY BR DAY to you!!';
			$mail->IsHTML(TRUE);
			$message = $this->p_load_view('email_template/submission');
			$mail->msgHTML($message);
			
			$this->emailStatus	= $mail->send();
			
			$this->msg	= ($this->emailStatus)?'Email Sent.':'Email Not Sent!';
		}
		
		$this->p_load_view('test/send_email', TRUE);
	}
	
	function test_redeem()
	{
		if(isset($_POST['hdd_VoucherSessionID']))
		{
			$voucherAvailable	= TRUE;
		}
		else
		{
			$_POST['hdd_Age']	= 20;
			$_POST['hdd_Location']	= 'Kedah';
			$sessionID	= 'helven_test_'.uniqid().$_POST['hdd_Age'].strtolower($_POST['hdd_Location']).uniqid();
			// ----------------------------------------------------------------------- //
			// UPDATE voucher status
			// ----------------------------------------------------------------------- //
			$voucherCountry	= ($_POST['hdd_Location'] == 'Singapore')?'sg':'my';
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
			// BEGIN mysql transaction
			$this->db->trans_start();
			// EXECUTE sql query
			$Q	= $this->db->query($sql);
			// END mysql transaction
			$this->db->trans_complete();
			
			if($Q->affected_row() <= 0)
			{
				$this->formError	= TRUE;
				$this->formErrorMsg	= addslashes('Our server is busy at the moment, please try again.<br />Sorry for inconvenience.');
				echo $this->formErrorMsg;
				$voucherAvailable	= FALSE;
			}
			else
			{
				$voucherAvailable	= TRUE;
			}
		}
		if($voucherAvailable)
		{
			echo 'Voucher available for redemption.<br /><br />';
			// ----------------------------------------------------------------------- //
			// GET voucher ID
			// ----------------------------------------------------------------------- //
			// GENERATE sql query
			$sql	= " SELECT *
						FROM `z_voucher`
						WHERE voucher_session_id = '{$sessionID}'";
			// EXECUTE sql query
			$Q		= $this->db->query($sql);
			$a_Voucher = $Q->result();
			
			print_a($a_Voucher);exit;
			
		}
		exit;
	}
	
	function index()
	{
		$this->p_render('test/index');
	}
}