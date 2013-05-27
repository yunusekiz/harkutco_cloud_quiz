<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class exam extends CI_Controller {

	protected $parser_data;

	protected $exam_questions;

	protected static $last_exam_id;

	function __construct()
	{
		parent::__construct();

		//$this->load->model('event_model');

		$this->parser_data['base'] = base_url();
		$this->load->model('subject_and_question_model');

		$this->parser_data['default_exam_date'] = date("d/m/Y");
		$this->parser_data['default_exam_time'] = 30;
	}

	function index()
	{
		$this->parser_data['title'] = 'Yeni Sınav Oluştur';
		$this->parser_data['subject_and_question'] = $this->subject_and_question_model->readRow();
		//$this->parser_data['']

		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('exam_main_view', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);
	}


	public function addNewExam()
	{
		$exam_questions = $this->input->post('exam_questions');

		$exam_date 	= $this->input->post('exam_date');
		$exam_time	= $this->input->post('exam_time');

		if ($exam_questions!=NULL) 
		{
			$this->load->model('exam_model');

			$insert_new_exam_detail = $this->exam_model->insertNewExam($exam_date,$exam_time);
			if ($insert_new_exam_detail == TRUE) 
			{
				 self::$last_exam_id = $this->exam_model->last_record_id;
				 $insert_new_exam_question = $this->addNewExamQuestion(self::$last_exam_id, $exam_questions);
				 
				 if ($insert_new_exam_question == TRUE) 
				 {
					$message = 'Tebrikler Sinav Kaydedildi :))';
					echo "<script>alert(\"$message\");</script>";
					echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."exam'>";				 	
				 }
				 else
				 {
				 	$message = 'HATA::Sinav Olusturulamadi..!';
					echo "<script>alert(\"$message\");</script>";
					echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."exam'>";
				 }
				
			}
			else
			{
				$message = 'HATA::Sinav Detayi Kaydedilemedi..!';
				echo "<script>alert(\"$message\");</script>";
				echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."exam'>";
			}
		}
		else
		{
			$message = 'Sinav Olusturmak Icin En Az 1 Soru Secmelisiniz..!';
			echo "<script>alert(\"$message\");</script>";
			echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."exam'>";			
		}

	}


	protected function addNewExamQuestion($last_exam_id, $exam_questions)
	{
		$this->load->model('exam_question_model');

		$a=0;
		$c = count($exam_questions);

		foreach ($exam_questions as $exam_question) 
		{
			$insert_new_exam_question = $this->exam_question_model->insertNewExamQuestion($last_exam_id,$exam_question);
			if ($insert_new_exam_question == TRUE) 
			{
				$a = $a+1;
				if ($a == $c)
					return TRUE;
			}
			else
				return FALSE;
		}		
	}


}