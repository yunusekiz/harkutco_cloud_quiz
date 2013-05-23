<?php

class event_model extends CI_Model {

	public function insertNewEvent($event_date, $event_title, $event_detail, $event_builder_ssn)
	{
		$insert_data = array(
								'event_date' 		=> $event_date,
								'event_title'		=> $event_title,
								'event_detail'		=> $event_detail,
								'event_builder_ssn'	=> $event_builder_ssn
							);

		$query = $this->db->insert('event', $insert_data);

		if ($this->db->affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


	public function getLastEvent()
	{
		$last_insert_id = $this->db->insert_id();

		$query = $this->db->select('event_date, event_title, event_detail')->from('event')->order_by('event_id','desc')->limit(1)->get();

		if ($query->num_rows()>0)
		{
			$result_array = $query->result_array();

			// yukarıdaki sorgu içi içe array halinde sonuç döndürdüğü için array deki ilk elemanı seçerken $result_array[0] diyoruz 
			$result = array(
								'event_date'	=>	$result_array[0]['event_date'],
								'event_title'	=>	$result_array[0]['event_title'],
								'event_detail'	=>	$result_array[0]['event_detail']
						   );

			return $result;
		} 
		else
			return NULL;
	}



}
