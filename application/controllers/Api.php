<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MY_Controller
{

	public function get_data($u_key = '', $r_key = '')
	{

		if ($this->check_key($u_key) == TRUE && $this->check_recipient($r_key) == TRUE) {

			$sintax = "SELECT c.name AS c_name,
							t.path AS t_path,
							t.song AS t_song,
							event_date AS e_date,
							bride_m,
							bride_w,
							events,
							r.name AS r_name,
							r.phone AS r_phone
							FROM customer c
							JOIN template t ON t.id = c.template_id
							JOIN wedding w ON w.customer_id = c.id
							JOIN recipient r ON r.customer_id = c.id AND r.r_key = '$r_key'
							WHERE c.u_key = '$u_key'";

			$query 		= $this->db->query($sintax);
			$result 	= $query->row_array();

			$bride_w	= json_decode($result['bride_w']);
			$bride_m	= json_decode($result['bride_m']);

			$events 	= json_decode($result['events']);

			$data = [
				'c_name' 			=> $result['c_name'],
				'bride' 			=> [
					'w' => $bride_w,
					'm' => $bride_m
				],
				'template'			=> [
					'path' 			=> $result['t_path'],
					'song'			=> $result['t_song']
				],
				'event'				=> [
					'date'			=> $result['e_date'],
					'date_format'	=> date('d.m.Y', strtotime($result['e_date'])),
					'time_format'	=> date('H:i', strtotime($result['e_date'])),
					'akad'			=> $events->akad,
					'resepsi'		=> $events->resepsi
				],
				'recipient'			=> [
					'name'			=> $result['r_name'],
					'phone'			=> $result['r_phone']
				]
			];

			returnAPI($data, 'Data Available', 200, 1);
		} else {
			returnAPI([], 'Data Empty', 404);
		}
	}

	public function check_key($u_key = '')
	{
		if ($u_key == '') {
			return FALSE;
		}

		$sintax = "SELECT id
						FROM customer
						WHERE u_key = '$u_key'";

		$query = $this->db->query($sintax);

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_recipient($r_key = '')
	{

		if ($r_key == '') {
			return FALSE;
		}

		$sintax = "SELECT id
						FROM recipient
						WHERE r_key = '$r_key'";

		$query = $this->db->query($sintax);

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
