<?php


class user_model extends CI_Model {


	public function getAllUser()
	{
		$query = $this->db->select('*')->from('user')->get();

		if ($query->num_rows()>0) 
		{
			$result = $query->result_array();
			return $result;
		}
		else
			return NULL;
	}


	public function insertNewMessage($sender_id, $receiver_id, $message_content)
	{
		$insert_data = array(
								'sender_id'			=> $sender_id,
								'receiver_id'		=> $receiver_id,
								'message_content'	=> $message_content
							);

		$query = $this->db->insert('message', $insert_data);

		if ($this->db->affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


	public function insertNewUser($user_name, $user_email)
	{
		$insert_data = array(
								'user_name'		=> $user_name,
								'user_email'	=> $user_email
							);

		$query = $this->db->insert('user', $insert_data);

		if ($this->db->affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}



}