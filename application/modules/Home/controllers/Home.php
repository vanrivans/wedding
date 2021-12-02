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
		$data['parent1']			= 'Bapak Warsito dan Ibu Atik Kusmiati';
		$data['parent2']			= 'Bapak Budiarjo (Alm) dan Ibu Ninik Mursini';
		$data['akadDy']				= 'Ahad';
		$data['akadDate']			= '19 Desember 2021';
		$data['akadTime']			= '09.00 - selesai';
		$data['akadPlace']			= 'Notosuman Restaurant';
		$data['akadAddress']		= 'Jl. Raya Ngawi - Solo No.Km4, Gemarang Timur, Watualang, Kec. Ngawi, Kabupaten Ngawi, Jawa Timur 63218';
		$data['akadLoc']			= 'https://www.google.co.id/maps/place/Notosuman+Restaurant/@-7.4031099,111.4112886,17z/';
		$data['resepsiDay']		 	= 'Ahad';
		$data['resepsiDate']		= '19 Desember 2021';
		$data['resepsiTime']		= '11.00 - 13.00';
		$data['resepsiPlace']		= 'Notosuman Restaurant';
		$data['resepsiAddress']		= 'Jl. Raya Ngawi - Solo No.Km4, Gemarang Timur, Watualang, Kec. Ngawi, Kabupaten Ngawi, Jawa Timur 63218';
		$data['resepsiLoc']			= 'https://www.google.co.id/maps/place/Notosuman+Restaurant/@-7.4031099,111.4112886,17z/';

		$data['recipient']			= 'Regina Ayutiara Anmar';

		return view('Home/views/index', $data);
	}
}
