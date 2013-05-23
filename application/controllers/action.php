<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class action extends CI_Controller {

	protected $parser_data;

	function __construct()
	{
		parent::__construct();

		//$this->load->model('event_model');

		$this->parser_data['base'] = base_url();
		$this->load->model('teacher_model');
	}

	function index()
	{
		return NULL;
	}

	public function login_control()
	{
		$email		= 	$this->input->post('email');
		$password	= 	$this->input->post('password');


		if (($email!='') && ($password!='')) 
		{
			if (($this->teacher_model->matchRecords($email, $password)==TRUE)) 
			{
				$this->load->library('session'); // session başlatmak için ilk olarak session library si load edilir.
				$this->session->set_userdata('teacher','teacher_session_data'); // session başlatılır
				
				$message = "Oturum acildi, yonlendiriliyorsunuz...";

				echo "<script>alert(\"$message\");</script>";
				echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."admin_console'>";

			}
			else
			{
				$message = "Yanlis sifre ve/veya kullanici adi";

				echo "<script>alert(\"$message\");</script>";
				echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."login'>";
			}
		}
		else
		{
			$message = "Lutfen bos alan birakmayin";

			echo "<script>alert(\"$message\");</script>";
			echo "<meta http-equiv='refresh' content='0.1; URL=".base_url()."login'>";
		}
	}


	public function addNewTeacher()
	{
		
		$name			= $this->input->post('name');
		$surname		= $this->input->post('surname');
		$branch			= $this->input->post('branch');
		$email			= $this->input->post('email');
		$password		= $this->input->post('password');

		if (($name!='') && ($surname!='') && ($branch!=0) && ($email!='') && ($password!='')) 
		{
			$insert_new_item = $this->teacher_model->insertNewTeacher( $name, 
																	   $surname,
																	   $branch,
																	   $email,
																	   $password
																	 );
			if ($insert_new_item == TRUE) 
			{
				echo 'kayit basarili';
			}
			else
			{
				echo 'hata:: kayit basarisiz';
			}
		}
		else
		{
			echo 'lutfen bos alan birakmayin';
		}	


	}

}

