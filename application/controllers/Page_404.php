<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_404 extends CI_Controller {

	public function index()
	{
		$this->load->view('404_view');
	}

}

/* End of file Page_404.php */
/* Location: ./application/controllers/Page_404.php */