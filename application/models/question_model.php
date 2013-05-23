<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class question_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('question');
        $this->model_killer_library->setNameOfIdColumn('question_id');
        //$this->model_killer_library->setViewTableName('teacher_brach_view');
    }


	public function insertNewQuestion($question_detail,$subject_id)
	{
		$insert_data = array(
								'question_detail' 	=> $question_detail,
								'subject_id'		=> $subject_id
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}


	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateSubject($question_id, $question_detail, $subject_id)
	{
		$update_data = array(
								'question_detail' 	=> $question_detail,
								'subject_id'		=> $subject_id
							);

		return $this->model_killer_library->updateRow($question_id, $update_data);

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
