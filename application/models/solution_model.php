<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class solution_model extends CI_Model {

	public $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('solution');
        $this->model_killer_library->setNameOfIdColumn('solution_id');
        //$this->model_killer_library->setViewTableName('question_and_answer');
    }


	public function insertNewSolution($question_id,$answer_id)
	{
		$insert_data = array(
								'question_id' 	=> $question_id,
								'answer_id'		=> $answer_id
							);

		$this->model_killer_library->insertNewRow($insert_data);
	 	return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}


	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateSolution($solution_id, $question_id, $answer_id)
	{
		$update_data = array(
								'question_id' 	=> $question_id,
								'answer_id'		=> $answer_id
							);

		return $this->model_killer_library->updateRow($solution_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}


}
