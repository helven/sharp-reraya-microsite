<?php
Class Lucky_Draw extends Z_Controller
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
        $this->p_load_model('MLuckyDraw');
        // ----------------------------------------------------------------------- //
        // INIT variable
        // ----------------------------------------------------------------------- //
        $this->MLuckyDraw   = new MLuckyDraw();
    }
/*
| ------------------------------------------------------------------------------------------------------------------------------------------
| VIEW FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function index()
    {
        $a_allowed_invoice_ext  = array('jpg', 'jpeg', 'bmp', 'png', 'gif', 'pdf');

        // CHECK user login status
        if(!check_auth())
        {
            // REDIRECT to dashboard
            $location   = base_url().'auth/login';
            $_SESSION['ss_LoginRedirect']   = base_url().'lucky-draw';
            redirect($location);
        }

        if(isset($_POST['hdd_Action']))
        {
            $this->formError    = FALSE;
            $this->formErrorMsg = '';

            $_POST['txt_PuchaseDate'] = trim($_POST['txt_PuchaseDate']);
            if(!isset($_POST['txt_PuchaseDate']) || $_POST['txt_PuchaseDate'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter Purchase Date.';
            }

            $_POST['opt_Dealer'] = trim($_POST['opt_Dealer']);
            if(!isset($_POST['opt_Dealer']) || $_POST['opt_Dealer'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please select Dealer.';
            }

            $_POST['txt_InvoiceNo'] = trim($_POST['txt_InvoiceNo']);
            if(!isset($_POST['txt_InvoiceNo']) || $_POST['txt_InvoiceNo'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter Invoice No.';
            }

            $_POST['txt_InvoiceAmount'] = trim($_POST['txt_InvoiceAmount']);
            if(!isset($_POST['txt_InvoiceAmount']) || $_POST['txt_InvoiceAmount'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please enter Invoice Amount.';
            }

            if(!is_numeric($_POST['txt_InvoiceAmount']))
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Invalid Invoice Amount.';
            }

            if(!isset($_FILES['file_Receipt']['name']) || $_FILES['file_Receipt']['name'] == '')
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Please upload Invoice/Receipt.';
            }
            
            // CLEAN $_POST
            sec_clean_all_post($this->db->conn);
            $name   = get_file_name($_FILES['file_Receipt']['name']);
            $ext    = get_file_ext($_FILES['file_Receipt']['name']);

            if(!in_array($ext, $a_allowed_invoice_ext))
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Invalid Invoice/Receipt file.';
            }

            if(filesize($_FILES['file_Receipt']['tmp_name']) > 10485760) // Larger than 10mb
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Invoice/Receipt filesize cannot be larger than 10MB.';
            }

            // CHECK invoice no
            /*$a_cond = array(
                'table'     => 'lucky_draws',
                'field'     => 'invoice_no',
                'value'     => $_POST['txt_InvoiceNo'],
                'compare'=> '='
            );
            $a_lucky_draws = $this->MLuckyDraw->get_lucky_draw($a_cond);

            if($a_lucky_draws['status'])
            {
                $this->formError    = TRUE;
                $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                $this->formErrorMsg .= 'Invoice No is already submitted for lucky draw.';
            }*/

            if(!$this->formError)
            {
                $newFilename    = $_POST['txt_InvoiceNo'].'-'.uniqid().'.'.$ext;
                $target         = $this->config['storage_path'].'lucky_draw/'.$newFilename;
                if(!file_exists($this->config['storage_path'].'lucky_draw/'))
                {
                    mkdir($this->config['storage_path'].'lucky_draw', 0777);
                }
                
                if(move_uploaded_file($_FILES['file_Receipt']['tmp_name'], $target))
                {
                    $cdate  = date('Y-m-d H:i:s');
                    $a_insert   = array(
                        'player_id'         => $_SESSION['ss_Public']['id'],
                        'status'            => 1,
                        'purchase_date'     => $_POST['txt_PuchaseDate'],
                        'dealer'            => $_POST['opt_Dealer'],
                        'invoice_no'        => $_POST['txt_InvoiceNo'],
                        'invoice_amount'    => $_POST['txt_InvoiceAmount'],
                        'receipt'           => $newFilename,
                        'created_at'        => $cdate,
                        'updated_at'        => $cdate
                    );

                    $insert = $this->MLuckyDraw->insert_lucky_draw($a_insert);

                    if($insert['status'])
                    {
                        redirect(base_url().'lucky_draw');
                    }
                    else
                    {
                        $this->formError    = TRUE;
                        $this->formErrorMsg .= ($this->formErrorMsg != '')?'<br />':'';
                        $this->formErrorMsg .= 'Failed to submit Lucky Draw, please try again.';
                    }
                }
            }
        }
        
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('lucky_draw/index');
    }
}