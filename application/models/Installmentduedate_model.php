<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Installmentduedate_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->config('ci-blog');
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    public function add($id, $data, $installment_ids = [])
    {
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                // print_r($key);
                // print_r($value);

                $formatted_due_date = date('Y-m-d', strtotime($value));
                $insert_data = array(
                    'student_fees_master_id' => $id,
                    'due_date' => $formatted_due_date,
                    'feetype_installment_id' => $installment_ids[$key]
                );
                // print_r($insert_data);
                $this->db->insert('installment_due_date', $insert_data);
            }
        }
    }
}
