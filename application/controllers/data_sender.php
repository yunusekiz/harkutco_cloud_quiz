<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_sender extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		
	}

	function index()
	{
		
  
/*		$this->curl->create('http://localhost/www/phil_abicim/index.php/api/example/user');  
  
		$this->curl->post(array('user_name' => 'denek',  'user_email' => 'denek@hotmail.com'));  
  
		$result = json_decode($this->curl->execute());  
  
		if(isset($result->status) && $result->status == 'success')  
		{  
    		echo 'User has been updated.';  
		}  
  
		else  
		{  
    		echo 'Something has gone wrong';  
		}*/

	}

	public function sendMessagePost()
	{
/*		$this->load->library('curl');
		$this->curl->create('http://localhost/www/phil_abicim/index.php/api/example/msg');

		$this->curl->post(array('sender_id' => 1, 'receiver_id' => 3, 'message_content' => 'selam ben yunus, osman nuri kardesim nasilsin?'));

		$result = json_decode($this->curl->execute());

		if(isset($result->status) && $result->status == 'success')  
		{  
    		echo 'message  sended.';  
		}  
  
		else  
		{  
    		echo 'message send fail';
    		echo '<br>';
    		var_dump($result->status);
		}	*/

		$this->load->library('rest');

		$method = 'post';
		$params = array('sender_id' => 1, 'receiver_id' => 3, 'message_content' => 'selam ben yunus, osman nuri kardesim nasilsin?');
		
		$uri = 'api/example/msg';

		$this->rest->format('application/json');

		$result = $this->rest->{$method}($uri, $params);


/*		if(isset($result->status) && $result->status == 'success')  
		{  
    		$data['message'] ='News has been updated.';  
    		echo $data['message'];
		}     
		else  
		{  
    		$data['message'] ='Something has gone wrong';  
    		echo $data['message'];
		} */			

	}
}