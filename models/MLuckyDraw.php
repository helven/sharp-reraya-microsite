<?php
class MLuckyDraw extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_lucky_draw($a_cond='', $mode='FULL')
    {
        $a_rtn_data = array();
        $a_data = array();
        // ----------------------------------------------------------------------- //
        // BUILD sql query
        // ----------------------------------------------------------------------- //
        $select = " SELECT
                        lucky_draws.*, 
                        attr_status.value AS status_value,
                        players.name AS player_name,
                        players.email AS player_email";
        $from   = " FROM lucky_draws
                        LEFT JOIN attr_status ON lucky_draws.status = attr_status.id
                        LEFT JOIN players ON lucky_draws.player_id = players.id";
        $where  = " WHERE 1 = 1";
        $cond   = set_condition($a_cond);
        $sql    = $select.$from.$where.$cond;

        // EXECUTE sql query
        $Q      = $this->db->query($sql);

        if($Q->num_rows() > 0)
        {
            $a_data                 = $Q->result();
            $a_rtn_data['a_data']   = $a_data[0];
            $a_rtn_data['status']   = TRUE;
        }
        else
        {
            $a_rtn_data['status']   = FALSE;
            $a_rtn_data['msg']      = 'We\'re sorry, the Lucky Draw you\'re looking for cannot be found.';
        }
        
        $Q->free_result();
        
        return $a_rtn_data;
    }

    function insert_lucky_draw($a_insert)
    {
        // ----------------------------------------------------------------------- //
        // INSERT lucky draw to database
        // ----------------------------------------------------------------------- //
        $sql    = " INSERT INTO `lucky_draws` SET
                        player_id       = {$a_insert['player_id']},
                        status          = {$a_insert['status']},
                        is_winner       = {$a_insert['is_winner']},
                        is_winner_status    = {$a_insert['is_winner_status']},
                        is_winner_remark    = '{$a_insert['is_winner_remark']}',
                        name            = '{$a_insert['name']}',
                        phone           = '{$a_insert['phone']}',
                        purchase_date   = '{$a_insert['purchase_date']}',
                        dealer          = '{$a_insert['dealer']}',
                        invoice_no      = '{$a_insert['invoice_no']}',
                        invoice_amount  = {$a_insert['invoice_amount']},
                        serial_no       = '{$a_insert['serial_no']}',
                        warranty_card   = '{$a_insert['warranty_card']}',
                        receipt         = '{$a_insert['receipt']}',
                        created_at      = '{$a_insert['created_at']}',
                        updated_at      = '{$a_insert['updated_at']}'";
        // BEGIN mysql transaction
        $this->db->trans_start();
        // EXECUTE sql query
        $Q  = $this->db->query($sql);
        $lucky_draw = $Q->insert_id();
        // END mysql transaction
        $this->db->trans_complete();

        if($this->db->affected_row() > 0)
        {
            $a_rtn  = array(
                'status'        => TRUE,
                'msg'           => 'Lucky Draw is successfully inserted.',
                'lucky_draw'    => $lucky_draw
            );
        }
        else
        {
            $a_rtn  = array(
                'status'        => FALSE,
                'msg'           => 'Lucky Draw insert failed.',
            );
        }

        return $a_rtn;
    }
}