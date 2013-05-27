<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class question_and_answer_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('question_and_answer');
        $this->model_killer_library->setNameOfIdColumn('question_id');
        //$this->model_killer_library->setViewTableName('question_and_answer');
    }

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function getLastRecordId()
	{
		return $this->last_record_id;
	}


}
