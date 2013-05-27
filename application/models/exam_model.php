<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class exam_model extends CI_Model {

	public $last_record_id;

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('exam');
        $this->model_killer_library->setNameOfIdColumn('exam_id');
        //$this->model_killer_library->setViewTableName('teacher_brach_view');
    }


	public function insertNewExam($exam_date,$exam_time)
	{
		$insert_data = array(
								'exam_date' => $exam_date,
								'exam_time'	=> $exam_time
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}


	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}


	public function updateExam($exam_id, $exam_date, $exam_time)
	{
		$update_data = array(
								'exam_date' => $exam_date,
								'exam_time'	=> $exam_time
							);

		return $this->model_killer_library->updateRow($exam_id, $update_data);
	}


	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}

}
