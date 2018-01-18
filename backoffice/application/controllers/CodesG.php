<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodesG extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['active'] = "codes";
		$data['alert'] = "";
		$this->load->view('header', $data);
		$this->load->view('codeg');
		$this->load->view('footer');
		if(!$this->session->userdata('Email')){
 		$this->session->set_flashdata('error', 'log in first');

 		$data['alert']="ok";
 		$data['message']="Login first!";


 $this->load->view('login',$data);
}
	}

	public function generateCode() {

		if($this->input->post('c') && $this->input->post('a')){

			$number = intval($this->input->post('c'));
			$member_code = $this->input->post('a');
			for ($i = 0; $i < $number; $i++) {



			$code = $this->randomString();

			$data = array('CodeID'=>$member_code, 'CodeAssoc'=>$code, 'statut'=>0);

			$query=$this->db->insert('codeGenerer', $data);

			}

			$data['alert']="ok";
			$data['success'] = "ok";
			$data['active'] = "members";
			$data['message']="$number codes have been added!";


			$this->load->view('header', $data);
			$this->load->view('codeg');
			$this->load->view('footer');

		} else {
			$data['alert']="ok";
			$data['active'] = "members";
			$data['message']="Can't add codes!";


			$this->load->view('header', $data);
			$this->load->view('codeg');
			$this->load->view('footer');
		}

	}

	private function randomString($length=10 )
	        {
	                $str = "";
	                $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	                $max = count($characters) - 1;
	                for ($i = 0; $i < $length; $i++) {
	                        $rand = mt_rand(0, $max);
	                        $str .= $characters[$rand];
	                }
	                return $str;

	        }
}
