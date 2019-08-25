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

    function add_term()
    {
    	$fees = str_replace(',', '', $this->input->post('tfees'));
        $term_data = array(
        	'CLASS_ID' => $this->input->post('class'),
            'NAME' => $this->input->post('tname'),
            'FEES' => $fees,
        );

        $this->db->insert('term_tbl', $term_data);
        $term_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'term_id' => $term_id
        );
    }

    // Edit functionalities
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

    function edit_term($term_id)
    {
    	$fees = str_replace(',', '', $this->input->post('tfees'));
        $term_data = array(
        	'CLASS_ID' => $this->input->post('class'),
            'NAME' => $this->input->post('tname'),
            'FEES' => $fees,
        );

        $this->db->where('ID', $term_id);
		$this->db->update('term_tbl', $term_data);

        return array(
            'edited' => 'done',
        );
    }
}