<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Ajay kumar
 * @version : 1.1
 * @since : 01 March 2020
 */
class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	protected $lastLogin = '';
	
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
    }
    
    /**
     * This function used to load front views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
    {
        $this->load->view('common/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('common/footer', $footerInfo);
    }
	
    
    /**
     * This function used to load admin views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadAdminViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
    {
        $this->load->view('admin/common/header', $headerInfo);
        $this->load->view('admin/common/sidebar');
        $this->load->view($viewName, $pageInfo);
        $this->load->view('admin/common/footer', $footerInfo);
    }
}