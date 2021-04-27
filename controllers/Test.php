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
        
    }
    
    function index()
    {
        echo decrypt_str('VEufNd0RfWiVf1Ex5weHIw==');
        echo '<br />';
        echo encrypt_password(decrypt_str('VEufNd0RfWiVf1Ex5weHIw=='));
        echo '<br />';
        echo '<br />';
        echo decrypt_str('p/IlUQo2zSZV447ileDQog==');
        echo '<br />';
        echo encrypt_password(decrypt_str('p/IlUQo2zSZV447ileDQog=='));
        echo '<br />';
        echo '<br />';
        echo decrypt_str('NkJNgQjA8n13y5+nY40/Lw==');
        echo '<br />';
        echo encrypt_password(decrypt_str('NkJNgQjA8n13y5+nY40/Lw=='));
        echo '<br />';
        echo '<br />';
        echo decrypt_str('o/OITj1q6gJptkd+xUemfA==');
        echo '<br />';
        echo encrypt_password(decrypt_str('o/OITj1q6gJptkd+xUemfA=='));
exit;

        $this->p_render('test/index');
    }
}