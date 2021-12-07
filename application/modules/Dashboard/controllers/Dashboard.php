<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Dashboard extends MY_Controller
{
	var $apiAddress = '';

	public function __construct()
	{
		parent::__construct();

		$this->apiAddress = base_url() . 'api/';
	}

	public function index($c_key = '')
	{

		$data['ckey'] = $c_key;
		$data['apiAddress'] = $this->apiAddress;

		return view('Dashboard.views.index', $data);
	}
}
