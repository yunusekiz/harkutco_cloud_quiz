<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lecture_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('lecture');
        $this->model_killer_library->setNameOfIdColumn('lecture_id');
        //$this->model_killer_library->setViewTableName('teacher_brach_view');
    }


	public function insertNewLecture($lecture_name)
	{
		$insert_data = array(
								'lecture_name' 	=> $lecture_name
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}


	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateLecture($lecture_id, $lecture_name)
	{
		$update_data = array(
								'lecture_name' 	=> $lecture_name
							);

		return $this->model_killer_library->updateRow($lecture_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}






}
