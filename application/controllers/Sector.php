<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Sector extends BaseController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data['sectors'] = $this->db->from('category')->order_by('created_at', 'DESC')->get()->result();
        $this->loadAdminViews('admin/sector/list', $this->global, $data , NULL);
    }
    
    public function addForm()
    {
        $this->loadAdminViews('admin/sector/addNewForm', $this->global, NULL, NULL);
    }
	
	public function addNewSector()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required',
				array('required' => 'You must provide a %s.')
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Login failed due to incorrect login credential.');
			redirect('/admin/login');
		} else {

			$login_found = $this->db->from('admin')->where(array(
				'username' => $this->input->post('username'),
				'password' => base64_encode($this->input->post('password'))
			))->count_all_results();

			if($login_found > 0) {
				$login_data = $this->db->from('admin')->where(array(
					'username' => $this->input->post('username'),
					'password' => base64_encode($this->input->post('password'))
				))->get()->row();

				$this->session->set_userdata('user_id', $login_data->id);
				$this->session->set_userdata('name', $login_data->name);
				$this->session->set_userdata('username', $login_data->username);

				redirect('/admin/dashboard');
			} else {
				$this->session->set_flashdata('error', 'Login failed due to incorrect login credential.');
				redirect('/admin/login');
			}
		}
	}
}
