<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_code_admin extends CI_Controller {


	public function index()
	{


		$data['active'] = "members_code";
		$data['alert'] = "";
		$this->load->view('header', $data);
		$this->load->view('membreCodeAdmin');
		$this->load->view('footer');

							 if(!$this->session->userdata('Email')){
						$this->session->set_flashdata('error', 'log in first');

						$data['alert']="ok";
						$data['message']="Login first!";


						$this->load->view('login',$data);
				}

	}

        function enregist()
        {

            if($this->input->post('enrig'))
            {

              $cod=$this->input->post('cd');
              $categ=$this->input->post('cate');
              $nbrcd=$this->input->post('nbrcod');
              $nbrfone=$this->input->post('nbrphone');
              $Statu=$this->input->post('stat');
              $Stat="encours";


            $data= array( 'code'=>$cod, 'categorie'=>$categ, 'nbrecode'=>$nbrcd, 'phone'=>$nbrfone);

            $this->db->set('Statue', $Statu);
            $this->db->where('Statue', $Stat);
            $rslt=$this->db->update('demande_superviseur');

            $query=$this->db->insert('codemembre', $data);

            if ($query && $rslt){

								$data['active'] = "members_code";
								$data['alert']="ok";
								$data['success'] = "ok";
								$data['message']="The member $id has been updated!";
								$this->load->view('header', $data);
								$this->load->view('membreCodeAdmin');
								$this->load->view('footer');
            } else {

							 $data['active'] = "members_code";
							 $data['alert']="ok";
							 $data['success'] = "ok";
							 $data['message']="The member $id couldn't been updated!";
							 $this->load->view('header', $data);
							 $this->load->view('membreCodeAdmin');
							 $this->load->view('footer');
						 }

            }
        }

      public  function delete()
        {
            if($this->input->get('recordId'))
            {
							$id= "+".$this->input->get('recordId');
							$id = str_replace(' ', '', $id);


               $this->db->where('phone', $id);
               $this->db->delete('demande_superviseur');

							 $data['active'] = "members_code";
							 $data['alert']="ok";
							 $data['success'] = "ok";
							 $data['message']="The member $id has been deleted!";
							 $this->load->view('header', $data);
							 $this->load->view('membreCodeAdmin');
							 $this->load->view('footer');


            } else {
							$data['active'] = "members_code";
							$data['alert']="ok";
							$data['message']="The member $id couldn't been deleted!";
							$this->load->view('header', $data);
							$this->load->view('membreCodeAdmin');
							$this->load->view('footer');
						}
        }

				public  function suppress()
	        {
	            if($this->input->get('recordId'))
	            {
								$id= "+".$this->input->get('recordId');
								$id = str_replace(' ', '', $id);


	               $this->db->where('phone', $id);
	               $this->db->delete('codemembre');
								 $data['active'] = "members_code";
								 $data['alert']="ok";
								 $data['success'] = "ok";
								 $data['message']="The member $id has been deleted!";
								 $this->load->view('header', $data);
								 $this->load->view('membreCodeAdmin');
								 $this->load->view('footer');

	            } else {
								$data['active'] = "members_code";
								$data['alert']="ok";
								$data['message']="The member $id couldn't been deleted!";
								$this->load->view('header', $data);
								$this->load->view('membreCodeAdmin');
								$this->load->view('footer');

							}
	        }




}
