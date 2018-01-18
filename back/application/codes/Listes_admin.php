<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listes_admin extends CI_Controller {
    
    public function _contruct()
    {
        parent::_contruct();
        
    }

	public function index()
	{
                $this->load->helper('url');
                 $this->load->database();
		$this->load->view('listeAdmin');
                
               if(!$this->session->userdata('Email')){
            $this->session->set_flashdata('error', 'log in first');
                    redirect('Login');
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


            $query=$this->db->insert('userstabl', $data);
            if ($query) 
                {echo "Ajout Reussie!"; 
            redirect('Listes_admin');
                } else {
                echo "Echec ";
                 redirect('Listes_admin');
                
                }
            }else{
                echo "error db";
                 redirect('Listes_admin');
            }
        }
        
        function suppr()
        {
            if($this->input->get('recordId'))
            {
                $id= $this->input->get('recordId');
              
               $this->db->where('phone', $id);
               $this->db->delete('userstabl');
                redirect("Listes_admin");
                exit();

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
                      'firstname'=>$nom, 'lastname'=>$prenom, 'country_code'=>$Cpays, 'network'=>$Reso, 'membre_code'=>$Cmbre,
                      'emaill'=>$emaill, 'category'=>$Catgry
                  );
                 
                  $this->db->where('phone', $phoneNm);
                
                $query=$this->db->update('userstabl', $data);
                if ($query) {
                    echo "updated!"; 
                    redirect('Listes_admin');
                } else {
                    echo "Echec ";
                }
                }
                else{
                    echo "aucune modif";
                    redirect('Listes_admin');
                }
           }
           
 
}