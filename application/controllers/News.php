<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Sector extends BaseController 
{

	/**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->isLoggedIn();   
    }

	public function index()
	{
		$data['sectors'] = $this->category_model->getCategories();
		$this->loadAdminViews('admin/sector/list', $this->global, $data , NULL);
    }
    
    public function addForm()
    {
		$data['parent_categories'] = $this->category_model->getParentCategories();
        $this->loadAdminViews('admin/sector/addNewForm', $this->global, $data, NULL);
    }
	
	public function addNewSector()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Title is not given.');
			redirect('/admin/sectors/new');
		} else {
			$filename = '';
			
			if($_FILES['image']['name'] != '') {
				$files = pathinfo($_FILES['image']['name']);
				$filename = time().".".$files['extension'];
			}

			$config['upload_path']      = 'uploads/';
			$config['allowed_types']    = 'gif|jpg|png';
			$config['max_size']         = 100;
			$config['file_name'] 		= $filename;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;

			$this->upload->initialize($config);

			$post_image = '';
			if ($this->upload->do_upload('image'))
			{
				$data = array('upload_data' => $this->upload->data());
				$post_image = base_url('uploads/'.$data['upload_data']['file_name']);			
			}

			if($this->input->post('category_id') == '') {
				$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'image' => $post_image,
					'parent_id' => $this->input->post('parent')
				);

				$this->category_model->addcategory($data);
			}else{
				if($post_image == ''){
					$data = array(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'parent_id' => $this->input->post('parent')
					);
				}else{
					$data = array(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'image' => $post_image,
						'parent_id' => $this->input->post('parent')
					);
				}
				

				$this->category_model->updatecategory($data, $this->input->post('category_id'));
			}
	
			redirect('/admin/sectors');			
		}
	}

	public function update($category_id) {
		$data['sectors'] = $this->category_model->getCategory($category_id);
		$data['parent_categories'] = $this->category_model->getParentCategories();
		// echo "<pre>";
		// print_r($data); die;
        $this->loadAdminViews('admin/sector/addNewForm', $this->global, $data, NULL);
	}

	public function delete($category_id) {
		$data['sectors'] = $this->category_model->deleteCategories([$category_id]);
		redirect('/admin/sectors');
	}

	public function deleteSelected() {
		$data['sectors'] = $this->category_model->deleteCategories($this->input->post('chk'));
		redirect('/admin/sectors');
	}

	public function changeStatus($category_id, $status) {
		$this->category_model->changeCategoriesStatus($category_id, $status);
		redirect('/admin/sectors');
	}
}
