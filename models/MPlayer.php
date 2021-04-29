<?php
class MPlayer extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_player($a_cond='', $mode='FULL')
    {
        $a_rtn_data = array();
        $a_data = array();
        // ----------------------------------------------------------------------- //
        // BUILD sql query
        // ----------------------------------------------------------------------- //
        $select = " SELECT
                        players.*, 
                        attr_status.value AS status_value";
        $from   = " FROM players
                        LEFT JOIN attr_status ON players.status = attr_status.id";
        $where  = " WHERE 1 = 1";
        $cond   = set_condition($a_cond);
        $sql    = $select.$from.$where.$cond;

        // EXECUTE sql query
        $Q          = $this->db->query($sql);

        if($Q->num_rows() > 0)
        {
            $a_data                 = $Q->result();
            $a_rtn_data['a_data']   = $a_data;
            $a_rtn_data['status']   = TRUE;
        }
        else
        {
            $a_rtn_data['status']   = FALSE;
            $a_rtn_data['msg']      = 'We\'re sorry, the User you\'re looking for cannot be found.';
        }
        
        $Q->free_result();
        
        return $a_rtn_data;
    }

    function verify_user($a_user)
    {
        // ----------------------------------------------------------------------- //
        // BUILD sql query
        // ----------------------------------------------------------------------- //
        $select = " SELECT
                        players.*, 
                        attr_status.value AS status_value";
        $from   = " FROM players
                        LEFT JOIN attr_status ON players.status = attr_status.id";
        $where  = " WHERE email     = '{$a_user['email']}'
                        AND secret  = '{$a_user['secret']}'
                        AND status  IN ('1','7')";
        $sql    = $select.$from.$where;

        // EXECUTE sql query
        $Q          = $this->db->query($sql);

        if($Q->num_rows() > 0)
        {
            $a_data                 = $Q->result();
            $a_rtn_data['a_data']   = $a_data;
            $a_rtn_data['status']   = TRUE;
        }
        else
        {
            $a_rtn_data['status']   = FALSE;
            $a_rtn_data['msg']      = 'Invalid Email or Password';
        }

        $Q->free_result();
        
        return $a_rtn_data;
    }

    function check_player_exist($a_cond='')
    {
        // ----------------------------------------------------------------------- //
        // BUILD sql query
        // ----------------------------------------------------------------------- //
        $select = " SELECT players.email";
        $from   = " FROM players";
        $where  = " WHERE 1 = 1";

        if($a_cond == '')
        {
            return TRUE;
        }

        $cond   = set_condition($a_cond);
        $sql    = $select.$from.$where.$cond;

        // EXECUTE sql query
        $Q  = $this->db->query($sql);

        if($Q->num_rows() > 0)
        {
            $rtn    = TRUE;
        }
        else
        {
            $rtn    = FALSE;
        }
        
        $Q->free_result();
        
        return $rtn;
    }

    function insert_player($a_insert)
    {
        // ----------------------------------------------------------------------- //
        // INSERT submission to database
        // ----------------------------------------------------------------------- //
        $sql    = " INSERT INTO `players` SET
                        status          = {$a_insert['status']},
                        name            = '{$a_insert['name']}',
                        email           = '{$a_insert['email']}',
                        phone           = '{$a_insert['phone']}',
                        address         = '{$a_insert['address']}',
                        password        = '{$a_insert['password']}',
                        secret          = '{$a_insert['secret']}',
                        remember_token  = '{$a_insert['remember_token']}',
                        created_at      = '{$a_insert['created_at']}',
                        updated_at      = '{$a_insert['updated_at']}'";
        // BEGIN mysql transaction
        $this->db->trans_start();
        // EXECUTE sql query
        $Q  = $this->db->query($sql);
        $player_id  = $Q->insert_id();
        // END mysql transaction
        $this->db->trans_complete();

        if($this->db->affected_row() > 0)
        {
            $a_rtn  = array(
                'status'        => TRUE,
                'msg'           => 'User is successfully inserted.',
                'player_id'     => $player_id
            );
        }
        else
        {
            $a_rtn  = array(
                'status'        => FALSE,
                'msg'           => 'User insert failed.',
            );
        }

        return $a_rtn;
    }

    function update_player($a_cond, $a_update=NULL)
    {
        if(!isset($a_update))
        {
            $a_rtn  = array(
                'status'=> FALSE,
                'msg'   => 'User failed to be updated.'
            );
            return $a_rtn;
        }
        $a_rtn  = array();
        // ----------------------------------------------------------------------- //
        // BUILD sql query
        // ----------------------------------------------------------------------- //
        $update = " UPDATE players SET ";
        $update_value    = "";
        foreach($a_update as $key => $value)
        {
            if($update_value != '')
            {
                $update_value   .= ',';
            }
            $update_value       .= "{$key} = '{$value}'";
        }
        $cond   = set_condition($a_cond);
        $where  = " WHERE 1 = 1 {$cond}";
        $sql    = $update.$update_value.$where;
        // ----------------------------------------------------------------------- //
        // SQL transaction
        // ----------------------------------------------------------------------- //
        // BEGIN mysql transaction
        $this->db->trans_start();
        // EXECUTE sql query
        $Q	= $this->db->query($sql);
        // END mysql transaction
        $this->db->trans_complete();

        if($this->db->affected_row() > 0)
        {
            $a_rtn  = array(
                'status'    => TRUE,
                'msg'       => 'User is successfully updated.'
            );
        }
        else
        {
            $a_rtn  = array(
                'status'    => FALSE,
                'msg'       => 'Update user failed.',
            );
        }
        
        return $a_rtn;
    }
}