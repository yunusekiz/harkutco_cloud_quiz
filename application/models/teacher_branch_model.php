<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher_branch_model extends CI_Model {

	protected $last_record_id;

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('teacher_branch');
        $this->model_killer_library->setNameOfIdColumn('teacher_branch_id');
        //$this->model_killer_library->setViewTableName('teacher_brach_view');
    }


	public function insertNewTeacherBranch($teacher_branch_name)
	{
		$insert_data = array(
								'teacher_branch_name' => $teacher_branch_name
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updatetNewTeacherBranch($teacher_branch_id, $teacher_branch_name)
	{
		$update_data = array(
								'teacher_branch_name' 	=> $teacher_branch_name,
							);

		return $this->model_killer_library->updateRow($teacher_branch_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}


}

	