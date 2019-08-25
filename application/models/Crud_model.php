<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model { 
  
	function __construct() 
    { 
        parent::__construct(); 
    }

    function add_class()
    {
    	$fees = str_replace(',', '', $this->input->post('cfees'));
        $class_data = array(
            'NAME' => $this->input->post('cname'),
            'FEES' => $fees,
        );

        $this->db->insert('class_tbl', $class_data);
        $class_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'class_id' => $class_id
        );
    }

    function edit_class($class_id)
    {
    	$fees = str_replace(',', '', $this->input->post('cfees'));
        $class_data = array(
            'NAME' => $this->input->post('cname'),
            'FEES' => $fees,
        );

        $this->db->where('ID', $class_id);
		$this->db->update('class_tbl', $class_data);

        return array(
            'edited' => 'done',
        );
    }
}