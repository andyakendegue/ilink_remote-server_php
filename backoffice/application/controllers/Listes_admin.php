<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listes_admin extends CI_Controller {

    public function _contruct()
    {
        parent::_contruct();

    }

	public function index()
	{
    $data['active'] = "members";
    $data['alert'] = "";
		$this->load->view('header', $data);
		$this->load->view('listeadmin');
    $this->load->view('footer');

               if(!$this->session->userdata('Email')){
            $this->session->set_flashdata('error', 'log in first');

            $data['alert']="ok";
            $data['message']="Login first!";


            $this->load->view('login',$data);
        }
	}

     public function ajoutbtn(){
            if($this->input->post('ajbtn'))
            {
              $nom=$this->input->post('nm');
              $prenom=$this->input->post('prnm');
              $Cpays=$this->input->post('cdpays');
              $Reso=$this->input->post('reso');
              $Cmbre=$this->input->post('cmbre');
              $emaill=$this->input->post('maill');
              $Catgry=$this->input->post('cat');
              $phoneNm=$this->input->post('tel');


            $data= array(
                'firstname'=> $nom, 'lastname'=>$prenom, 'country_code'=>$Cpays, 'network'=>$Reso,
                'membre_code'=>$Cmbre, 'emaill'=>$emaill, 'category'=>$Catgry, 'phone'=>$phoneNm

                        );


            $query=$this->db->insert('users', $data);
            if ($query)
                {

                  $data['alert']="ok";
                  $data['success'] = "ok";
                  $data['active'] = "members";
                  $data['message']="The member $phoneNm has been added!";


                  $this->load->view('header', $data);
                  $this->load->view('listeadmin');
                  $this->load->view('footer');
                } else {

                $data['alert']="ok";
                $data['active'] = "members";
                $data['message']="The member $phoneNm couldn't been added!";


                $this->load->view('header', $data);
                $this->load->view('listeadmin');
                $this->load->view('footer');

                }
            }else{

                $data['alert']="ok";
                $data['active'] = "members";
                $data['message']="Database error!";


                $this->load->view('header', $data);
                $this->load->view('listeadmin');
                $this->load->view('footer');
            }
        }

        function suppr()
        {
            if($this->input->get('recordId')){
                $id= "+".$this->input->get('recordId');
                $id = str_replace(' ', '', $id);

               /*$this->db->where('phone', $id);
               $query = $this->db->delete('users');
               */
               $query = $this->db->delete('users', array('phone' => $id));

               if($query){
                 $data['alert']="ok";
                 $data['success'] = "ok";
                 $data['active'] = "members";
                 $data['message']="The member $id has been deleted!";


                 $this->load->view('header', $data);
                 $this->load->view('listeadmin');
                  $this->load->view('footer');
               } else {
                 $data['alert']="ok";
                 $data['active'] = "members";
                 $data['message']="The member $id couldn't been deleted!";


                 $this->load->view('header', $data);
                 $this->load->view('listeadmin');
                  $this->load->view('footer');
               }





            } else {
              $data['alert']="ok";
              $data['active'] = "members";
              $data['message']="The member $id couldn't been deleted! No data sent";


              $this->load->view('header', $data);
              $this->load->view('listeadmin');
              $this->load->view('footer');
            }

        }

        public function modif()
        {
            if($this->input->post('modifbtn'))
                {
                  $nom=$this->input->post('nm');
                  $prenom=$this->input->post('prnm');
                  $Cpays=$this->input->post('cdpays');
                  $Reso=$this->input->post('reso');
                  $Cmbre=$this->input->post('cmbre');
                  $emaill=$this->input->post('maill');
                  $Catgry=$this->input->post('cat');
                  $phoneNm=$this->input->post('tel');


                  $data=array(
                      'firstname'=>$nom, 'lastname'=>$prenom, 'country_code'=>$Cpays, 'network'=>$Reso, 'member_code'=>$Cmbre,
                      'email'=>$emaill, 'category'=>$Catgry
                  );

                  $this->db->where('phone', $phoneNm);

                $query=$this->db->update('users', $data);
                if ($query) {

                    $data['alert']="ok";
                    $data['success'] = "ok";
                    $data['active'] = "members";
                    $data['message']="The member $phoneNm has been updated!";


                    $this->load->view('header', $data);
                    $this->load->view('listeadmin');
                    $this->load->view('footer');

                    //redirect('Listes_admin');
                } else {

                    $data['alert']="ok";
                    $data['active'] = "members";
                    $data['message']="The member $phoneNm couldn't been updated!";


                    $this->load->view('header', $data);
                    $this->load->view('listeadmin');
                    $this->load->view('footer');
                }
                }
                else{
                  $data['alert']="ok";
                  $data['active'] = "members";
                  $data['message']="The record couldn't been updated! No data sent.";


                  $this->load->view('header', $data);
                  $this->load->view('listeadmin');
                  $this->load->view('footer');
                }
           }


}
 ?>
