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

	function enrollment($param1='',$param2='',$param3=''){
		$page_data['page_name'] = 'enrollment';
		$page_data['class_id'] = $param2;
		$page_data['page_title'] = 'Class';
		$page_data['page_s_name'] = $param2;

		$this->load->view('admin/enrollment', $page_data);
	}

	function parent(){
		$page_data['page_name'] = 'parent';
		$page_data['page_title'] = 'Manage Parents';
		$page_data['page_s_name'] = '';

		$this->load->view('admin/parent', $page_data);
	}

	function management($name='')
	{
		$page_data['page_name'] = 'management';
		if ($name=='class') {
			$page_data['page_title'] = 'Manage Classes';
			$page_data['page_s_name'] = 'class';

			$this->load->view('admin/class', $page_data);
		}

		if ($name=='term') {
			$page_data['page_title'] = 'Manage Term';
			$page_data['page_s_name'] = 'term';

			$this->load->view('admin/term', $page_data);
		}

		if ($name=='users') {
			$page_data['page_title'] = 'Manage Users';
			$page_data['page_s_name'] = 'users';

			$this->load->view('admin/users', $page_data);
		}

		if ($name=='settings') {
			$page_data['page_title'] = 'General Settings';
			$page_data['page_s_name'] = 'settings';

			$this->load->view('admin/settings', $page_data);
		}
	}

	function action($spec='')
	{
		if ($spec=='new_class') {
			$add_class = $this->Crud_model->add_class(); 
        	if($add_class['inserted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/class','refresh');
        	}
		}

		if ($spec=='new_term') {
			$add_term = $this->Crud_model->add_term(); 
        	if($add_term['inserted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/term','refresh');
        	}
		}

		if ($spec=='new_user') {
			$add_user = $this->Crud_model->add_user(); 
        	if($add_user['inserted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/users','refresh');
        	} else{
        		$this->session->set_flashdata('user_exist', 'A user with that same email already exist.');
        		redirect(base_url() . 'admin/management/users','refresh');
        	}
		}

		if ($spec == 'main_settings') {
			$main_settings = $this->Crud_model->main_settings(); 
        	if($main_settings['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/settings','refresh');
        	}
		}

		if ($spec=='add_new_parent') {
			$add_parent = $this->Crud_model->add_parent(); 
        	if($add_parent['inserted']=='done'){
        		move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/parents/'. $add_parent['parent_id'] .'.png');
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/parent','refresh');
        	} else{
        		$this->session->set_flashdata('user_exist', 'A user with that same email already exist.');
        		redirect(base_url() . 'admin/parent','refresh');
        	}
		}
	}

	public function options($param1='', $param2='')
	{
		// if ($this->session->userdata('l_check') != 'go@yes')
  //           redirect(base_url(), 'refresh'); 

		if ($param1=="edit_class") {
			$page_data['class_id'] = $param2;
			$page_data['page_name'] = 'management';
			$page_data['page_title'] = 'Edit Class';
			$page_data['page_s_name'] = 'class';

			$this->load->view('admin/edit-class', $page_data);
		}

		if ($param1=="edit_term") {
			$page_data['term_id'] = $param2;
			$page_data['page_name'] = 'management';
			$page_data['page_title'] = 'Edit Term';
			$page_data['page_s_name'] = 'term';

			$this->load->view('admin/edit_term', $page_data);
		}
	}

	function sub_action($action='', $param2='')
	{
		if ($action == 'edit_class') {
			$edit_class = $this->Crud_model->edit_class($param2); 
        	if($edit_class['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/class','refresh');
        	}
		}
		if ($action == 'edit_term') {
			$edit_term = $this->Crud_model->edit_term($param2); 
        	if($edit_term['edited']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/term','refresh');
        	}
		}
		if ($action == 'del_user') {
			$del_user = $this->Crud_model->del_user($param2); 
        	if($del_user['deleted']=='done'){
        		$this->session->set_flashdata('completed', 'Action Completed Successfully');
        		redirect(base_url() . 'admin/management/users','refresh');
        	}
		}
		if ($action=='update_logo') {
			move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/logo.png');
			
			$this->session->set_flashdata('completed', 'Action Completed Successfully');
        	redirect(base_url() . 'admin/management/settings','refresh');
		}
	}
}
