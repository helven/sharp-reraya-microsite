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
        $a_Data = array();
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
        $Q      = $this->db->query($sql);

        if($Q->num_rows() > 0)
        {
            $a_data                 = $Q->result();
            $a_rtn_data['a_data']   = $a_Data[0];
            $a_rtn_data['status']   = TRUE;
        }
        else
        {
            $a_data	= $Q->result();
            $a_rtn_data['status']   = FALSE;
            $a_rtn_data['msg']	    = 'We\'re sorry, the user you\'re looking for cannot be found.';
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
            $a_data	= $Q->result();
            $a_rtn_data['status']   = FALSE;
            $a_rtn_data['msg']	    = 'Invalid Email or Password';
        }

        $Q->free_result();
        
        return $a_rtn_data;
    }
}