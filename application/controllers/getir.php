<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$user = file_get_contents('http://localhost/www/phil_abicim/index.php/api/example/user/id/2/format/json');
		$user = json_decode($user);
		echo $user->email;
	}

	public function gotur($id)
	{
		$user = file_get_contents('http://localhost/www/phil_abicim/index.php/api/example/user/id/'.$id.'/format/json');
		$user = json_decode($user);

		$user_email = $user->email;
		$user_email = json_encode($user_email);
		var_dump($user_email);
	}

	public function yaz()
	{
		$sender_id = '1';
		$receiver_id = '3';
		$message_content = 'merhaba cagri kardesim ben yunus nasilsin';

		$this->load->model('user_model');

		$insert = $this->user_model->insertNewMessage($sender_id,$receiver_id,$message_content);

		if ($insert == TRUE)
			echo "tebrikler kayit girildi";
		else
			echo 'kayit basarisiz';
	}


	public function ciz()
	{
		$user_name = 'mahmut hudaverdi';
		$user_email = 'mahmut@verdi.com';

		$this->load->model('user_model');

		$insert = $this->user_model->insertNewUser($user_name,$user_email);

		if ($insert == TRUE)
			echo "tebrikler kayit girildi";
		else
			echo 'kayit basarisiz';		
	}


}
