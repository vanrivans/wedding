<?php
defined('BASEPATH') or exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Home extends MY_Controller
{
	var $apiAddress 	= '';
	var $device			= 0;
	var $igBaseUrl		= 'https://instagram.com/';
	var $assetsPath 	= '';
	var $songPath 		= '';
	var $imagesPath 	= '';
	var $galleriesPath 	= '';

	public function __construct()
	{
		parent::__construct();

		if ($this->agent->is_mobile()) {
			$this->device = 1;
		}

		$this->apiAddress 	= base_url() . 'api/';
		// $this->apiAddress	= 'https://wedding.reginabusiness.id/wedding/api/';
		$this->assetsPath 	= base_url() . 'assets/';
		$this->imagesPath 	= base_url() . 'assets/images/';
		$this->songPath 	= base_url() . 'assets/songs/';
	}

	function indesx()
	{
		$uKey = '7d1dd26b';
		$rKey = '4959a4';

		$result  = json_decode(file_get_contents($this->apiAddress . 'get_data/' . $uKey . '/' . $rKey), TRUE);
		var_dump($result);
	}

	public function index()
	{
		$uKey = $this->input->get('u_key');
		$rKey = $this->input->get('r_key');

		$result  = json_decode(file_get_contents($this->apiAddress . 'get_data/' . $uKey . '/' . $rKey), TRUE);

		if ($result['Status'] != 200) {
			redirect('404_override');
		}

		// var_dump($result);
		// return false;

		$result = $result['data'];

		$template 					= $result['template']['path'];
		$song						= $this->songPath . $result['template']['song'];

		$data['apiAddress']			= $this->apiAddress;

		$data['c_id']				= $result['c_id'];
		$data['r_id']				= $result['recipient']['id'];
		$data['templatePath']		= $this->assetsPath . $template . '/';
		$data['imagesPath']			= $this->imagesPath . $uKey . '/';
		$data['galleriesPath']		= $this->imagesPath . $uKey . '/galleries/';

		$data['device']				= $this->device;

		$data['headerMobile']		= 'url(' . base_url() . 'assets/images/' . $uKey . '/header_mobile.webp)';
		$data['headerDesktop']		= 'url(' . base_url() . 'assets/images/' . $uKey . '/header_desktop.jpg)';

		$data['brideFullName1'] 	= $result['bride']['w']['fullname'];
		$data['brideName1'] 		= $result['bride']['w']['nickname'];
		$data['brideIg1']			= $result['bride']['w']['ig'];
		$data['ig1']				= $this->igBaseUrl . $data['brideIg1'];
		$data['parent1']			= $result['bride']['w']['parent'];

		$data['brideFullName2'] 	= $result['bride']['m']['fullname'];
		$data['brideName2'] 		= $result['bride']['m']['nickname'];
		$data['brideIg2']			= $result['bride']['m']['ig'];
		$data['ig2']				= $this->igBaseUrl . $data['brideIg1'];
		$data['parent2']			= $result['bride']['m']['parent'];

		$data['eventDate']			= date('M d, Y H:i:s', strtotime($result['events']['date']));

		$data['akadDay']			= $result['events']['akad']['day'];
		$data['akadDate']			= date('d.m.Y', strtotime($result['events']['akad']['date']));
		$data['akadTime']			= $result['events']['akad']['time'];
		$data['akadPlace']			= $result['events']['akad']['place'];
		$data['akadAddress']		= $result['events']['akad']['address'];
		$data['akadLoc']			= $result['events']['akad']['loc'];

		$data['resepsiDay']			= $result['events']['resepsi']['day'];
		$data['resepsiDate']		= date('d.m.Y', strtotime($result['events']['resepsi']['date']));
		$data['resepsiTime']		= $result['events']['resepsi']['time'];
		$data['resepsiPlace']		= $result['events']['resepsi']['place'];
		$data['resepsiAddress']		= $result['events']['resepsi']['address'];
		$data['resepsiLoc']			= $result['events']['resepsi']['loc'];

		$data['addToCalendar']		= 'https://www.google.com/calendar/render?action=TEMPLATE&text=' . $data['brideName1'] . '+%26+' . $data['brideName2'] . '+Wedding&dates=' . $result['events']['datetime_format'] . '/' . $result['events']['end_format'] . '&details=You%27re+Invited+to+our+wedding+ceremony+%7C+' . $data['brideName2'] . '+%26+' . $data['brideName1'] . '+Wedding+%7C+' . $result['events']['day'] . '%2C+' . str_replace(' ', '+', $result['events']['date_format_id']);

		/* Recipient */
		$data['recipient']			= $result['recipient']['name'];

		/* Meta Setting */
		$data['Author']				= 'Digital By Ree';
		$data['MetaKeywords']		= '';
		$data['MetaDescription']	= 'You\'re Invited to our wedding ceremony - ' . $data['brideName1'] . ' & ' . $data['brideName2'] . ' Wedding - ' . $data['resepsiDay'] . ', ' . $data['resepsiDate'];
		$data['Url']				= 'https://wedding.reginabusiness.id/';
		$data['PageTitle']			= $data['brideName1'] . ' & ' . $data['brideName2'] . ' | ' . $data['Author'];
		$data['SiteName']			= $data['PageTitle'];
		$data['Image']				= $data['imagesPath'] . 'cover_mobile.webp';
		$data['Song']				= $song;

		// var_dump($data);
		return view('Home/views/index', $data);
	}

	public function test()
	{
		$nomor = '+6281331326173';
		$nama = 'Regina Ayu Tiara';
		$spasi = '+';
		$titikdua = '%3A';
		$enter = '%0A';
		$koma = '%2C';
		$amp = '%26';
		$bride = 'Amanda Budi Ksatria dan Tasia Wardantika';
		$date = 'Ahad, 19 Desember 2021';
		$place = 'Notosuman Restaurant, Ngawi';
		$jam = '11.00 - 13.00';
		$link = 'https://wedding.reginabusiness.id/';

		$text = "Bismillahirahmanirrahim" . $enter . $enter . "Dear Regina Ayu T A" . $enter . $enter . "Assalamu’alaikum wr.wb" . $enter . "Dengan memohon rahmat dan ridho Allah subhanahu wa ta'ala, izinkan kami mengundang Saudara/i untuk hadir dan memberikan doa restu pada acara pernikahan kami," . $enter . $enter . $bride . $enter . "Yang akan diselenggarakan pada : " . $date . " di " . $place . $enter . "Pukul : " . $jam . $enter . "Detail acara: " . $link . $enter . $enter . "Kami memohon kehadiran dan doa restunya agar pernikahan kami mendapatkan ridho dari Allah subhanahu wa ta'ala serta menjadi keluarga yang sakinah, mawaddah, warahmah..." . $enter . "Aamiin Yaa Rabbal'aalamiin" . $enter . "Terima kasih..." . $enter . $enter . "Wassalamu’alaikum wr.wb";

		$data['chat'] = "https://api.whatsapp.com/send/?phone=" . $nomor . "&text=" . $text;

		return view('Home.views.test', $data);
	}
}
