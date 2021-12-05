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

		$data['headerMobile']		= base_url('assets/images/header_mobile.webp');
		$data['headerDesktop']		= base_url('assets/images/header_desktop.webp');

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
		$data['akadDate']			= '19.12.2021';
		$data['akadTime']			= '09.00 - selesai';
		$data['akadPlace']			= 'Notosuman Restaurant';
		$data['akadAddress']		= 'Jl. Raya Ngawi - Solo No.Km4, Gemarang Timur, Watualang, Kec. Ngawi, Kabupaten Ngawi, Jawa Timur 63218';
		$data['akadLoc']			= 'https://www.google.co.id/maps/place/Notosuman+Restaurant/@-7.4031099,111.4112886,17z/';
		$data['resepsiDay']		 	= 'Ahad';
		$data['resepsiDate']		= '19.12.2021';
		$data['resepsiTime']		= '11.00 - 13.00';
		$data['resepsiPlace']		= 'Notosuman Restaurant';
		$data['resepsiAddress']		= 'Jl. Raya Ngawi - Solo No.Km4, Gemarang Timur, Watualang, Kec. Ngawi, Kabupaten Ngawi, Jawa Timur 63218';
		$data['resepsiLoc']			= 'https://www.google.co.id/maps/place/Notosuman+Restaurant/@-7.4031099,111.4112886,17z/';

		$data['recipient']			= 'Regina Ayutiara Anmar';

		$data['Author']				= 'Digital By Ree';
		$data['MetaKeywords']		= '';
		$data['MetaDescription']	= 'You\'re Invited to our wedding ceremony - ' . $data['brideName1'] . ' & ' . $data['brideName2'] . ' Wedding - ' . $data['resepsiDay'] . ', ' . $data['resepsiDate'];
		$data['Url']				= 'https://wedding.reginabusiness.id/';
		$data['PageTitle']			= $data['brideName1'] . ' & ' . $data['brideName2'] . ' | ' . $data['Author'];
		$data['SiteName']			= $data['PageTitle'];
		$data['Image']				= base_url('assets/images/cover_mobile.webp');
		$data['Song']				= base_url('assets/songs/Beautiful-In-White-Sha-auda.mp3');

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
