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
        $this->page_title   = 'Sharp Shooter';
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
        $this->page_title   = 'Leaderboard';
        
        if(!check_auth())
        {
            redirect(base_url().'game');
        }

        $a_leaderboard_round    = $this->config['leaderboard_round'];

        $round  = 0;
        foreach($a_leaderboard_round as $a_date)
        {
            list($sdate, $edate) = $a_date;
            $sdate  .= ' 00:00:00';
            $edate  .= ' 23:59:59';

            $date   = date('Y-m-d');
            if(strtotime($sdate) <= strtotime($date) && strtotime($edate) >= strtotime($date))
            {
                break;
            }
            if($round < count($a_leaderboard_round) - 1)
            {
                $round++;
            }
        }

        $a_cond     = array(
            'table'     => 'submissions',
            'field'     => 'created_at',
            'value'     => "'{$sdate}' AND '{$edate}'",
            'compare'   => 'between'
        );
        #$group_by   = " GROUP BY submissions.player_id";
        $order      = " ORDER BY submissions.score DESC";
        $this->a_leaderboard  = $this->MSubmission->get_leaderboard_list($a_cond, $order);

        if($this->a_leaderboard['status'])
        {
            if(count($this->a_leaderboard['a_data']) > 10)
            {
                $this->a_leaderboard['a_data']  = array_slice($this->a_leaderboard['a_data'], 0, 10);
            }
        }
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('game/leaderboard');
    }
}