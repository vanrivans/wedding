<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MY_Controller
{

	public function get_data($u_key = '', $r_key = '')
	{

		if ($this->check_key($u_key) == TRUE && $this->check_recipient($r_key) == TRUE) {

			$sintax = "SELECT c.id AS c_id,
							c.name AS c_name,
							t.path AS t_path,
							t.song AS t_song,
							event_date AS e_date,
							event_end AS e_end,
							bride_m,
							bride_w,
							events,
							r.name AS r_name,
							r.phone AS r_phone,
							r.id AS r_id
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
				'c_id'				=> $result['c_id'],
				'c_name' 			=> $result['c_name'],
				'bride' 			=> [
					'w' => $bride_w,
					'm' => $bride_m
				],
				'template'			=> [
					'path' 			=> $result['t_path'],
					'song'			=> $result['t_song']
				],
				'events'			=> [
					'date'				=> $result['e_date'],
					'day'				=> date('l', strtotime($result['e_date'])),
					'date_format'		=> date('d.m.Y', strtotime($result['e_date'])),
					'date_format_id' 	=> date('d M Y', strtotime($result['e_date'])),
					'time_format'		=> date('H:i', strtotime($result['e_date'])),
					'datetime_format' 	=> date('Ymd', strtotime($result['e_date'])) . 'T' . date('His', strtotime($result['e_date'])),
					'end_format' 		=> date('Ymd', strtotime($result['e_end'])) . 'T' . date('His', strtotime($result['e_end'])),
					'akad'				=> $events->akad,
					'resepsi'			=> $events->resepsi
				],
				'recipient'			=> [
					'id'			=> $result['r_id'],
					'name'			=> $result['r_name'],
					'phone'			=> $result['r_phone']
				]
			];

			returnAPI($data, 'Data Available', 200, 1);
		} else {
			returnAPI([], 'Data Empty', 404);
		}
	}

	public function submit_absent()
	{
		$r_id 			= $this->input->post('r_id');
		$total_person 	= $this->input->post('total_person');
		$status 		= $this->input->post('absent');

		$absent = $this->db->query("SELECT id FROM absent WHERE recipient_id = $r_id")->num_rows();

		$data = [
			'recipient_id' 	=> $r_id,
			'total_person' 	=> $total_person,
			'status'		=> $status
		];

		if ($absent > 0) {
			$data['updated_at'] = date('Y-m-d H:i:s');

			$this->db->where('recipient_id', $r_id);
			$this->db->update('absent', $data);
		} else {
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_at'] = date('Y-m-d H:i:s');

			$this->db->insert('absent', $data);
		}

		returnAPI($data, 'Data save successfully', 200, 1);
	}

	public function submit_comment()
	{
		$r_id 		= $this->input->post('r_id');
		$c_id 		= $this->input->post('c_id');
		$comment 	= $this->input->post('comment');

		$data = [
			'customer_id'	=> $c_id,
			'recipient_id' 	=> $r_id,
			'comment_text'	=> $comment,
			'created_at'	=> date('Y-m-d H:i:s')
		];

		$this->db->insert('comment', $data);

		returnAPI($data, 'Data save successfully', 200, 1);
	}

	public function get_comment($c_id = '', $page = 1)
	{
		$per_page = 10;

		$total_count = $this->db->query("SELECT id FROM comment WHERE comment.customer_id = $c_id")->num_rows();
		$total_page = ceil($total_count / $per_page);

		if ($page < $total_page) {
			$next_page = $page + 1;
		} else {
			$next_page = $total_page;
		}

		$sintax = "SELECT r.name AS name,
						comment_text AS comment
						FROM comment c
						JOIN recipient r ON r.id = c.recipient_id
						WHERE c.customer_id = $c_id
						ORDER BY c.created_at DESC";

		$result = $this->db->query($sintax)->result();

		$data = [
			'current_page' 	=> $page,
			'next_page'		=> $next_page,
			'total_page'	=> $total_page,
			'total_data'	=> $total_count,
			'data' 			=> $result
		];

		returnAPI($data, 'Data save successfully', 200, 1);
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
