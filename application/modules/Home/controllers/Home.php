<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	var $apiAddress = '';

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return view('Home/views/index');
	}
}
