<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_console extends CI_Controller {

	protected $parser_data;

	public $last_question_id;


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
			$this->load->model('subject_model');
			
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
		$this->parser_data['title'] = 'Yeni Soru Oluştur';
		$this->parser_data['subjects'] = $this->subject_model->readRow();
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
				$this->last_question_id = $this->question_model->last_record_id;

				//var_dump($this->last_question_id);
				//$this->addNewAnswerForm();
				echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewAnswerForm/".$this->last_question_id."'>";
			}

		}
		else
		{
			$message = 'Lutfen Bos Alan Birakmayiniz..!';
			echo "<script>alert(\"$message\");</script>";
			echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewQuestionForm'>";
		}

	}

	public function addNewAnswerForm($id)
	{
		$this->load->model('question_model');
		$last_question = $this->question_model->readRow($id);

		//var_dump($this->last_question_id);

		$this->parser_data['title'] = 'Yeni Cevap Oluştur';
		$this->parser_data['last_question'] = $last_question;		

		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('add_new_answer_view', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);		
	}


	public function addNewAnswer()
	{
		$question_id = $this->input->post('question_id');
		$this->last_question_id = $question_id;

		$answers = $this->input->post('answers');
		$answers = @array_values(array_filter($answers)); // bu fonksiyon answers içerisindeki boş elemanları filtreler,temizler

		if (count($answers)!=0) 
		{
			$c = count($answers);
			$a = 0;

			$this->load->model('answer_model');

			foreach ($answers as  $answer) 
			{
				$insert_new_answer = $this->answer_model->insertNewAnswer($answer,$question_id);
				if ($insert_new_answer == TRUE) 
				{
					$a = $a+1;
					if ($a == $c) 
					{
						$message = "Tebrikler..! Cevap ekleme de basarili";
						echo "<script>alert(\"$message\");</script>";
						echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console/addNewSolutionForm/".$question_id."'>";

					}

				}
				else
				{
					$message = "HATA:: Cevap Ekleme İslemi Basarisiz Oldu :(";
					echo "<script>alert(\"$message\");</script>";
					$this->addNewAnswerForm($question_id);

				}
			}
		}
		else
		{
			$message = "Hic Olmassa Bir Tanecik Cevap Ekleyin :(";
			echo "<script>alert(\"$message\");</script>";
			$this->addNewAnswerForm($question_id);

		}	

	}


	public function addNewSolutionForm($id)
	{
		$question_model = $this->load->model('question_model');
		$this->parser_data['last_question'] = $this->question_model->readRow($id);
		
		$this->load->model('question_and_answer_model');
		$this->parser_data['last_answers'] = $this->question_and_answer_model->readRow($id);

		$this->parser_data['title'] = 'Yeni Çözüm Ekle';

		//print_r($ci->question_model->readRow());

		//var_dump($this->answer_model->readRow($this->last_question_id));

		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('add_new_solution_view', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);

	}

	public function addNewSolution()
	{
		$question_id	= $this->input->post('question_id');
		$answer_id		= $this->input->post('answer_id');

		if ($answer_id!='') 
		{
			$this->load->model('solution_model');
			$add_new_solution = $this->solution_model->insertNewSolution($question_id,$answer_id);
			if ($add_new_solution==TRUE) 
			{
				$message = "Tebrikler..! Dogru cevap ta eklendi :))";
				echo "<script>alert(\"$message\");</script>";
				echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console'>";
			}
			else
			{
				$message = "Dogru cevap eklenemedi :(";
				echo "<script>alert(\"$message\");</script>";
				$this->addNewSolutionForm($question_id);
			}
		}
		else
		{
			$message = "Lutfen dogru cevabi secin :(";
			echo "<script>alert(\"$message\");</script>";
			$this->addNewSolutionForm($question_id);			
		}
	}


	public function deneme()
	{
		$this->parser->parse('admin_view_header', $this->parser_data);
		$this->parser->parse('deneme_view', $this->parser_data);
		$this->parser->parse('admin_view_footer', $this->parser_data);
	}



}
