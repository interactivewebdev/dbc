<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Faq extends BaseController 
{

	/**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('faq_model');
        $this->isLoggedIn();   
    }

	public function index()
	{
		$data['faqs'] = $this->faq_model->getFaqs();
		$this->loadAdminViews('admin/faq/list', $this->global, $data , NULL);
    }
    
    public function addForm()
    {
		$this->loadAdminViews('admin/faq/addNewForm', $this->global, NULL, NULL);
    }
	
	public function addNewFaq()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Title is not given.');
			redirect('/admin/faq/new');
		} else {
            if($this->input->post('faq_id') == '') {
                $data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description')
                    );
                $this->faq_model->addfaq($data);
            }else{
                $data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description')
                    );
                $this->faq_model->updatefaq($data, $this->input->post('faq_id'));

            }
                
			redirect('/admin/faq');			
		}
	}

	public function update($faq_id) {
		$data['faq'] = $this->faq_model->getFaq($faq_id);
		// echo "<pre>";
		// print_r($data); die;
        $this->loadAdminViews('admin/faq/addNewForm', $this->global, $data, NULL);
	}

	public function delete($faq_id) {
		$data['faq'] = $this->faq_model->deleteFaqs([$faq_id]);
		redirect('/admin/faq');
	}

	public function deleteSelected() {
		$data['faq'] = $this->faq_model->deleteFaqs($this->input->post('chk'));
		redirect('/admin/faq');
	}

	public function changeStatus($faq_id, $status) {
		$this->faq_model->changeFaqStatus($faq_id, $status);
		redirect('/admin/faq');
	}
}
