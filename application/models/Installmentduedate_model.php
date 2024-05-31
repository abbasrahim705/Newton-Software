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

    public function add($id,$data)
    {

            foreach ($data as $due_date) {
                // Convert date to MySQL date format (Y-m-d) if not already in this format
                $formatted_due_date = date('Y-m-d', strtotime($due_date));
    
                // Prepare data array for insertion
                $data = array(
                    'student_fees_master_id' => $id,
                    'due_date' => $formatted_due_date
                );
    
                // Insert data into the database
                $this->db->insert('installment_due_date', $data);
            }
        }
}
