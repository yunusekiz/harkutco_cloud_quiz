<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class deneme_model extends CI_Model {

	public $last_record_id;


	public function __construct()
    {
        parent::__construct();

        //$this->load->library('model_killer_library');
        //$this->model_killer_library->setTableName('answer');
        //$this->model_killer_library->setNameOfIdColumn('answer_id');
        //$this->model_killer_library->setViewTableName('question_and_answer');
    }


	public function getSpecificColumns()
	{
		$query = $this->db->select('question_and_answer.question_detail, question_and_answer.answer_detail, question_and_answer.question_id')->from('question_and_answer')->join('question', "question.question_id = question_and_answer.question_id")->get();
		
		if ($query->num_rows()>0)
		{
			$result_array = $query->result_array();
			$one_more_array = array('last_exam' => array('questions' => $result_array));
			return $one_more_array;			
		}
		else
			return NULL;
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
