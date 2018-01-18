<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_code extends CI_Controller {


	public function index()
	{
                $this->load->helper('url');
                 $this->load->database();
		$this->load->view('membreCode');
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
                echo "Ajout Reussie!";
                redirect('Member_code');
            } else { echo "Echec "; }

            }
        }

      public  function dell()
        {
            if($this->input->get('recordId'))
            {
                $id= $this->input->get('recordId');

               $this->db->where('phone', $id);
               $this->db->delete('codemembre');
                redirect("Member_code");
                exit();

            }
        }




}
