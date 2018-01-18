<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dash extends CI_Controller {

	public function index()
	{
		$data['active'] = "dash";
		$this->load->view('header', $data);
		$this->load->view('admin_dash');
		$this->load->view('footer');

		if(!$this->session->userdata('Email')){
 $this->session->set_flashdata('error', 'log in first');

 $data['alert']="ok";
 $data['message']="Login first!";


 redirect('Login',$data);
}

	}

}
