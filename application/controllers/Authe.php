<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authe extends CI_Controller {

	function index()
	{
		$this->login();
	}

	function login()
	{
		$this->load->view('login');
	}

	function valafclog()
	{
		$email = $this->input->post('email');
		$pwd = $this->input->post('pwd');

		$check = $this->checklogin($email, $pwd);
		if ($check == 'active_staff') {
			redirect(base_url() . 'admin','refresh');
		} elseif ($check == 'active_parent') {
			redirect(base_url() . 'allparent','refresh');
		} else{
			$this->session->set_flashdata('invalid_cred', 'Invalid Credentials');
			redirect(base_url(),'refresh');
		}
	}

	function checklogin($email, $pwd)
	{
		$this->db->where('PASSWORD', sha1( $this->config->item('salt') . $pwd ));
        $this->db->where('EMAIL', $email);
        $query = $this->db->get('users_tbl');
        if ($query->num_rows() > 0) {
        	$row = $query->row();
            $this->session->set_userdata('login_id', $row->ID);
            $this->session->set_userdata('login_email', $row->EMAIL);
            $this->session->set_userdata('login_name', $row->NAME);
            $this->session->set_userdata('login_priv', $row->PRIV);
            $this->session->set_userdata('login_check', 'go@yes');
            return 'active_staff';
        }

        $this->db->where('PASSWORD', sha1( $this->config->item('salt') . $pwd ));
        $this->db->where('EMAIL', $email);
        $query = $this->db->get('parent_tbl');
        if ($query->num_rows() > 0) {
        	$row = $query->row();
            $this->session->set_userdata('login_id', $row->ID);
            $this->session->set_userdata('login_email', $row->EMAIL);
            $this->session->set_userdata('login_name', $row->NAME);
            $this->session->set_userdata('login_phone', $row->PHONE);
            $this->session->set_userdata('login_check', 'go@parent');
            return 'active_parent';
        }

        return 'inactive';
	}

	function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'Logged Out Of The System');
        redirect(base_url(),'refresh');
    }
}
