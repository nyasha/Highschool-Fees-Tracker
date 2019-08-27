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

    function add_user()
    {
    	$email = $this->input->post("email");
    	if ($email != ''){
	        if ($this->check_email($email)) {
	            return FALSE;
	            die();
	        }
    	}

        $pwd = sha1( $this->config->item('salt').$this->input->post("pwd"));
        $user_data = array(
            'NAME' => $this->input->post("name"),
            'EMAIL' => $email,
            'PASSWORD' => $pwd,
            'PRIV' => $this->input->post("priv"),
        );

        $this->db->insert('users_tbl', $user_data);
        $user_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'user_id' => $user_id
        );
    }

    function add_parent()
    {
        $email = $this->input->post("email");
        if ($email != ''){
            if ($this->check_email($email)) {
                return FALSE;
                die();
            }
        }

        $pwd = sha1( $this->config->item('salt').$this->input->post("password"));
        $parent_data = array(
            'NAME' => $this->input->post("name"),
            'PHONE' => $this->input->post("phone"),
            'ADDRESS' => $this->input->post("address"),
            'EMAIL' => $email,
            'PASSWORD' => $pwd,
        );

        $this->db->insert('parent_tbl', $parent_data);
        $parent_id = $this->db->insert_id();

        return array(
            'inserted' => 'done',
            'parent_id' => $parent_id
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

    function main_settings($id=1)
    {
    	$settings_data = array(
        	'NAME' => $this->input->post('name'),
        	'ADDRESS' => $this->input->post('address'),
        	'PHONE' => $this->input->post('phone'),
        	'SESSION' => $this->input->post('session'),
        	'ACC_NAME' => $this->input->post('acc_name'),
        	'ACC_NUMBER' => $this->input->post('acc_number'),
        );

        $this->db->where('ID', $id);
		$this->db->update('settings_tbl', $settings_data);

        return array(
            'edited' => 'done',
        );
    }

    // Delete Functionalities
    function del_user($user_id)
    {
        $this->db->where('ID', $user_id);
		$this->db->delete('users_tbl');

        return array(
            'deleted' => 'done',
        );
    }

    //check if email exist
    function check_email($email='')
    {
    	$email1 = $this->db->get_where('users_tbl', array('EMAIL' => $email));
        $email2 = $this->db->get_where('parent_tbl', array('EMAIL' => $email));

        if ($email1->num_rows() > 0 || $email2->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}