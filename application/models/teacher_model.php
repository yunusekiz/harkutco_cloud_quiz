<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('teacher');
        $this->model_killer_library->setNameOfIdColumn('teacher_id');
        $this->model_killer_library->setViewTableName('teacher_brach_view');
    }


	public function insertNewTeacher($teacher_name, $teacher_surname, $teacher_branch_id, $teacher_email, $teacher_password)
	{
		$insert_data = array(
								'teacher_name' 			=> $teacher_name,
								'teacher_surname' 		=> $teacher_surname,
								'teacher_branch_id'		=> $teacher_branch_id,
								'teacher_email'			=> $teacher_email,
								'teacher_password'		=> $teacher_password
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function insertNewTeamMemPhoto($t_mem_big_photo, $t_mem_thumb_photo, $parent_id = NULL)
	{
		if ($parent_id == NULL) 
			$parent_id = $this->last_record_id;
		
		$insert_data = array(
								't_mem_id'			=> $parent_id,
								't_mem_big_photo'	=> $t_mem_big_photo,
								't_mem_thumb_photo'	=> $t_mem_thumb_photo
							);

		$this->model_killer_library->setTableName('team_photo');
		return $this->model_killer_library->insertNewRow($insert_data);
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateTeacher($teacher_id, $teacher_name, $teacher_surname, $teacher_branch_id, $teacher_email, $teacher_password)
	{
		$update_data = array(
								'teacher_name' 			=> $teacher_name,
								'teacher_surname' 		=> $teacher_surname,
								'teacher_branch_id'		=> $teacher_branch_id,
								'teacher_email'			=> $teacher_email,
								'teacher_password'		=> $teacher_password
							);

		return $this->model_killer_library->updateRow($teacher_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}


	public function deleteImageFromDB($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id, 't_mem_photo_id', 'team_photo');
	}

	public function matchRecords($email, $pass)
	{
		$where = array('teacher_email'=>$email, 'teacher_password'=>$pass);

		return $this->model_killer_library->matchRecords($where);
	}


}
