<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class answer_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('answer');
        $this->model_killer_library->setNameOfIdColumn('answer_id');
        $this->model_killer_library->setViewTableName('question_and_answer');
    }


	public function insertNewAnswer($answer_detail,$question_id)
	{
		$insert_data = array(
								'answer_detail' 	=> $answer_detail,
								'question_id'		=> $question_id
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}


	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateAnswer($answer_id, $answer_detail, $question_id)
	{
		$update_data = array(
								'answer_detail' 	=> $answer_detail,
								'question_id'		=> $question_id
							);

		return $this->model_killer_library->updateRow($answer_id, $update_data);
	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}

	public function getLastRecordId()
	{
		return $this->last_record_id;
	}


}
