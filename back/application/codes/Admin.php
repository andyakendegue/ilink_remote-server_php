<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin_vue');
                
	}
        
        public function add()
        {
            if($this->input->post('ad'))
            {
              $nom=$this->input->post('nm');
              $phon=$this->input->post('password');
             
            $data= array(
                'nom'=> $nom, 'password'=>MD5($phon),  
                 );

            $query=$this->db->insert('admintable', $data);
            if ($query) 
                {echo "Ajout Reussie!"; 
                 redirect('Admin');
                }
           else {
                echo "Echec ";
                 redirect('Admin');
                }
            }else{
                echo "error db";
                 redirect('Admin');
            }
            }
}


