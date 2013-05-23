<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	protected $parser_data;

	function __construct()
	{
		parent::__construct();

		//$this->load->model('event_model');

		$this->parser_data['base'] = base_url();
		$this->load->model('teacher_branch_model');

	}

	function index()
	{
		$this->parser_data['teacher_branches'] = $this->teacher_branch_model->readRow(); 
		$this->parser->parse('login_view', $this->parser_data);
		
	}

}

