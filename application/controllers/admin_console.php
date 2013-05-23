<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_console extends CI_Controller {

	protected $parser_data;

	protected $last_question_id;


	function __construct()
	{
		parent::__construct();

		$this->load->library('session');// session ın nimetlerinden faydalanabilmek için 'session' isimli library yi yükler.
		$admin = $this->session->userdata('teacher'); // $admin diye bi değişken set edilir, değer olarak ise
															// şu aşamada olup olmadığı bilinmeyen admin_session değişkeni atanır
		if( empty($admin) ) // eğer $admin değişkenini değeri boş ise, kullanıcı login formuna geri gönderilir
		{
			echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."login'>";
			die();
		}		

		$this->parser_data['base'] = base_url();
	}

	public function index()
	{
		$this->parser_data['title'] = 'Anasayfa';

		// admin panelinin view lerini yükler
		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);
	}

	public function addNewSubjectForm()
	{
		$this->load->model('lecture_model');
		$lectures = $this->lecture_model->readRow();

		$this->parser_data['title'] = 'Yeni Konu Oluştur';
		$this->parser_data['lectures'] = $lectures;

		// admin panelinin view lerini yükler
		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('add_new_subject_view', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);
	}


	public function addNewSubject()
	{
		$this->parser_data['title'] = 'Yeni Konu Oluştur';
		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);

		$lecture_id = $this->input->post('lecture_id');

		$subjects = $this->input->post('subjects');
		$subjects = array_values(array_filter($subjects)); // bu fonksiyon subjects içerisindeki boş elemanları filtreler,temizler		
		
		if (($lecture_id!=0)&&(count($subjects)!=0)) 
		{
			$c = count($subjects);
			$a = 0;
			foreach ($subjects as $subject) 
			{
				$insert_new_subject = $this->subject_model->insertNewSubject($subject,$lecture_id);
				if ($insert_new_subject==TRUE) 
				{
					$a = $a+1;
					if ($a == $c) 
					{
						$message = 'Konu Ekleme Basarili..!';
						echo "<script>alert(\"$message\");</script>";
						echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewSubjectForm'>";
					}
				}
				else
				{
					$message = 'HATA:: Konu Ekleme Basarisiz Oldu..!';
					echo "<script>alert(\"$message\");</script>";
					echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewSubjectForm'>";					
				}
			}
		}
		elseif(count($subjects)==0) 
		{
			$message = "Konu Ekleyebilmek Icin Lutfen Konu Detayini Girin...";

			echo "<script>alert(\"$message\");</script>";
			echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewSubjectForm'>";			
		}
		else
		{
			$message = "Konu Ekleyebilmek Icin Lutfen Bir Ders Secin...";
			echo "<script>alert(\"$message\");</script>";
			echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewSubjectForm'>";			
		}

	}


	public function addNewQuestionForm()
	{
		$this->load->model('subject_model');
		$subjects = $this->subject_model->readRow();

		$this->parser_data['title'] = 'Yeni Soru Oluştur';
		$this->parser_data['subjects'] = $subjects;

		// admin panelinin view lerini yükler
		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('add_new_question_view', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);
	}

	public function addNewQuestion()
	{
		$subject_id = $this->input->post('subject_id');
		$question 	= $this->input->post('question');

		if ( ($subject_id!=0) && ($question!='') ) 
		{
			$this->load->model('question_model');
			
			$insert_new_question = $this->question_model->insertNewQuestion($question,$subject_id);
			if ($insert_new_question == TRUE) 
			{
				$this->last_question_id = $this->question_model->getLastRecordId();
				$message = 'Soru Ekleme Basarili..!';
				echo "<script>alert(\"$message\");</script>";
				echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewAnswerForm'>";				
			}

		}
		else
		{
			$message = 'Lutfen Bos Alan Birakmayiniz..!';
			echo "<script>alert(\"$message\");</script>";
			echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewQuestionForm'>";
		}

	}


	public function addNewAnswerForm()
	{
		$this->load->model('question_model');
		$last_question = $this->question_model->readRow($this->last_question_id);

		$this->parser_data['title'] = 'Yeni CevapOluştur';
		$this->parser_data['last_question'] = $last_question;		

		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('add_new_answer_view', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);		
	}


	public function addNewAnswer()
	{
		$option_a = $this->input->post('option_a');
		$option_b = $this->input->post('option_b');
		$option_c = $this->input->post('option_c');
		$option_d = $this->input->post('option_d');

	
	}	




}
