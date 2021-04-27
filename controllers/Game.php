<?php
Class Game extends Z_Controller
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
        $this->p_load_model('MSubmission');
        // ----------------------------------------------------------------------- //
        // INIT variable
        // ----------------------------------------------------------------------- //
        $this->MSubmission	= new MSubmission();
    }
/*
| ------------------------------------------------------------------------------------------------------------------------------------------
| VIEW FUNCTIONS
| ------------------------------------------------------------------------------------------------------------------------------------------
*/
    function index()
    {
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('game/index');
    }

    function ajax_store()
    {
        $posted_score   = $_POST['score'];

        $is_hacking     = FALSE;
        $posted_score   = sec_db_clean($this->db->conn, $posted_score);
        $cookie_score   = str_replace(array('_','x','F','B','E','#'), '', $_COOKIE['_leksxia_x2']);

        if($posted_score != $cookie_score)
        {
            $logfile   = BASEPATH.'/log/score_hacking.log';
            if(!file_exists($logfile))
            {
                file_put_contents($logfile, '');
            }

            ;

            $str    = file_get_contents($logfile).date('Y-m-d H:i:s').'|'.$_SESSION['ss_Geo']['ip'].'|'.$_SESSION['ss_Public']['id']."\n";
            file_put_contents($logfile, $str);

            $is_hacking = TRUE;
        }
        
        $score  = ($cookie_score)?$cookie_score:$posted_score;

        if(!check_auth())
        {
            $a_rtn  = array(
                'status'        => FALSE,
                'is_hacking'    => $is_hacking,
                'msg'           => 'Not logged in.'
            );
            
            echo json_encode($a_rtn);
            
            exit;
        }

        if(!is_numeric($score))
        {
            $a_rtn  = array(
                'status'        => FALSE,
                'is_hacking'    => $is_hacking,
                'msg'           => 'Invalid score.'
            );
            
            echo json_encode($a_rtn);
            
            exit;
        }
        
        $cdate  = date('Y-m-d H:i:s');
        $a_insert   = array(
            'player_id'   => $_SESSION['ss_Public']['id'],
            'status'      => 1,
            'ip'          => $_SESSION['ss_Geo']['ip'],
            'score'       => $score,
            'is_hacking'  => $is_hacking?1:0,
            'created_at'  => $cdate,
            'updated_at'  => $cdate
        );

        $insert = $this->MSubmission->insert_submission($a_insert);

        if(!$insert)
        {
            $a_rtn  = array(
                'status'        => FALSE,
                'is_hacking'    => $is_hacking,
                'msg'           => 'Store failed.'
            );
        }
        
        // RESET cookie
        $this->p_reset_cookie();

        $a_rtn  = array(
            'status'        => TRUE,
            'is_hacking'    => $is_hacking,
            'msg'           => 'Store Success.'
        );
        
        echo json_encode($a_rtn);
    }

    function iframe_game()
    {
        $this->p_render_empty('game/iframe_game', TRUE);
    }

    function leaderboard()
    {
        if(!check_auth())
        {
            redirect(base_url().'game');
        }

        $a_cond     = array();
        $group_by   = " GROUP BY submissions.player_id";
        $order      = " ORDER BY submissions.score DESC";
        $a_limit    = array(0, 10);
        $this->a_leaderboard  = $this->MSubmission->get_submission_list($a_cond, $group_by, $order, $a_limit);

        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('game/leaderboard');
    }
}