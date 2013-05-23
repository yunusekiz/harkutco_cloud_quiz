<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class subject_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('subject');
        $this->model_killer_library->setNameOfIdColumn('subject_id');
        //$this->model_killer_library->setViewTableName('teacher_brach_view');
    }


	public function insertNewSubject($subject_name,$lecture_id)
	{
		$insert_data = array(
								'subject_name' 	=> $subject_name,
								'lecture_id'	=> $lecture_id
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}


	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateSubject($lecture_id, $subject_name, $lecture_id)
	{
		$update_data = array(
								'subject_name' 	=> $subject_name,
								'lecture_id'	=> $lecture_id
							);

		return $this->model_killer_library->updateRow($lecture_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}


}
