<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{
  public $data = array(
    'WebsiteTitle'        => 'Green Growers',
    'PageTitle'           => 'Green Growers',
    'LinkRecov'           => '',
    'TextData'            => '',
    'PictureForbid'       => 'nopict.jpg',
    'TextFull'            => FALSE,
    'Development'         => FALSE,
    'DatePicker'          => FALSE,
    'ServerOnline'        => TRUE,
    'FullMapElement'      => FALSE,
    'VersionWebApp'       => 'production',
    'BannerPrimaryHead'   => TRUE,
    'WhiteBackgroundSide' => FALSE,
    'LoadingLogo'         => FALSE
  );

  public function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Tokyo');
    // Call model processing
    // $this->load->model('M_prosesing', 'proses', TRUE);
  }
}
