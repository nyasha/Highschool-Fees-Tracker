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
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');

		$check = $this->checklogin($username, $pwd);
		if ($check == 'active_admin') {
			redirect(base_url() . 'aftrack','refresh');
		} else{
			$this->session->set_flashdata('invalid_cred', 'Invalid Credentials');
			redirect(base_url(),'refresh');
		}
	}

	function checklogin($username, $pwd)
	{
		$this->db->where('password', sha1( $this->config->item('salt') . $pwd ));
        $this->db->where('username', $username);
        $query = $this->db->get('authen_tbl');
        if ($query->num_rows() > 0) {
        	$row = $query->row();
            $this->session->set_userdata('l_id', $row->id);
            $this->session->set_userdata('l_username', $row->username);
            $this->session->set_userdata('l_name', $row->name);
            $this->session->set_userdata('l_phone', $row->phone);
            $this->session->set_userdata('l_priv', $row->priv);
            $this->session->set_userdata('l_check', 'go@yes');
            return 'active_admin';
        }
        return 'inactive';
	}

	function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'Logged Out Of The System');
        redirect(base_url(),'refresh');
    }
}
