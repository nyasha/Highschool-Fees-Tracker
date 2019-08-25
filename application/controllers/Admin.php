<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {

        parent::__construct();
 		$this->load->database();
        $this->load->library('form_validation');
        $this->load->library('upload');

        // check all payment and grab those that are due
  //       $this->db->where('expiry_date <', date('Y-m-d'));
  //       $this->db->where('expiry_alert', 0);
  //       $query = $this->db->get("all_payments");
		// if ($query->num_rows() > 0) {
		// 	foreach ($query->result() as $row) {
		// 		$this->session->set_flashdata('enroll_id_due', $row->enroll_id);
		// 		$this->session->set_flashdata('due_payment', 'Payment Due');
		// 	}
		// }
    }

	public function index() {
		$this->dashboard();
	}

	public function dashboard() {

		$page_data['page_name'] = 'dashboard';
		$page_data['page_title'] = 'Dashboard';
		$page_data['page_s_name'] = '';

		$this->load->view('admin/dashboard', $page_data);
	}

	function management($name='')
	{
		if ($name=='class') {
			$page_data['page_name'] = 'management';
			$page_data['page_title'] = 'Manage Classes';
			$page_data['page_s_name'] = 'class';

			$this->load->view('admin/class', $page_data);
		}
	}
}
