<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	var $apiAddress = '';
	var $device		= 0;
	var $igLink		= 'https://instagram.com/';

	public function __construct()
	{
		parent::__construct();

		if ($this->agent->is_mobile()) {
			$this->device = 1;
		}
	}

	public function index()
	{
		$data['device']				= $this->device;

		$data['brideFullName1'] 	= 'Tasia Wardantika';
		$data['brideFullName2'] 	= 'Amanda Budi Ksatria';
		$data['brideName1'] 		= 'Tika';
		$data['brideName2'] 		= 'Satria';
		$data['brideIg1']			= 'tikatasia';
		$data['brideIg2']			= 'amandaksatria';
		$data['ig1']				= $this->igLink . $data['brideIg1'];
		$data['ig2']				= $this->igLink . $data['brideIg2'];
		$data['parent1']			= '';
		$data['parent2']			= '';
		$data['akadDate']			= '';
		$data['akadTime']			= '';
		$data['akadPlace']			= '';
		$data['akadAddress']		= '';
		$data['akadLoc']			= '';
		$data['resepsiDate']		= '';
		$data['resepsiTime']		= '';
		$data['resepsiPlace']		= '';
		$data['resepsiAddress']		= '';
		$data['resepsiLoc']			= '';

		$data['recipient']			= 'Regina Ayutiara Anmar';

		return view('Home/views/index', $data);
	}
}
