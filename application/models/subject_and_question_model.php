<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class subject_and_question_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('subject_and_question_detail');
        //$this->model_killer_library->setNameOfIdColumn('solution_id');
        //$this->model_killer_library->setViewTableName('question_and_answer');
    }

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}
}
