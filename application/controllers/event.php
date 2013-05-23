<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class event extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('event_model');
	}

	function index()
	{
		$this->load->view('event_view');
	}

	public function eventCreate()
	{
		
		$event_date			= $this->input->post('event_date');
		$event_title		= $this->input->post('event_title');
		$event_detail		= $this->input->post('event_detail');
		$event_builder_ssn	= $this->input->post('event_builder_ssn');



		$event_create = $this->event_model->insertNewEvent($event_date, $event_title, $event_detail, $event_builder_ssn);

		if ($event_create == TRUE) 
		{
			echo 'event success';
		}
		else
		{
			echo 'event FAIL....!!';
		}
	}


	public function getLastEvent()
	{
		 $data = $this->event_model->getLastEvent();

	}

	public function insertMessage()
	{
		$this->load->model('message_model');

		$insert = $this->message_model->insertNewMessage(1, 3, 'ornek mesaj ornegi');

		if ($insert == TRUE) 
		{
			echo 'insert success';
		}
		else
			echo 'insert fail';
	}
}

