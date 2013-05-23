<?php

class message_model extends CI_Model {

	public function insertNewMessage($sender_id, $receiver_id, $message_content)
	{
		$insert_data = array(
								'sender_id' 		=> $sender_id,
								'receiver_id'		=> $receiver_id,
								'message_content'	=> $message_content
							);

		$query = $this->db->insert('message', $insert_data);

		if ($this->db->affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


}