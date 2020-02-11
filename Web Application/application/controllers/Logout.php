<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		session_destroy();
		redirect('Ctr_geral');
	}
	

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */