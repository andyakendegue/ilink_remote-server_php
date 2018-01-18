<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
        public function _construct()
        {
            parent::_construct();
            
        }
     
       public function index()
	{
           $this->load->helper('url'); 
         $this->load->database(); 
             
         
        // $this->form_validation->set_rules('maill', 'Email', 'required|alpha_numeric');
        // $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');
         
        // if($this->form_validation->run()==FALSE)
         //{
		$this->load->view('login');
       //  }else{
             //$maill=set_value('Email');
           //  $passw=set_value('password');
           //  validate();
        // }
         }
              
                
	
        
      public function validate()
        {
          
           if($this->input->post('maill') && $this->input->post('password'))
	 {
	     $email=$this->input->post('maill');
             $password = $this->input->post('password');
             
            $m=set_value('maill');
            // $p=set_value('password');
      
        
	$query= $this->db->query("SELECT * FROM membres WHERE Email='$email' and password='$password'");
	 
      
	$numrows=$query->num_rows();
	 
	 if($numrows!=0)
	 {
		 foreach($query->result_array() as $row)
		 {
			 $dbemail=$row['Email'];
			$dbpassword=$row['password'];
                        $dbcat=$row['category'];
                        
		 }
		 
		 if($email==$dbemail && $password==$dbpassword  )
		 {
                     $this->session->set_userdata('Email', $m);
                     $simple="simple";
                     $super="super";
                     
                     if($dbcat==$simple)
                     {
			 @$_SESSION['category']=$simple;
			 redirect('Listes_users');
                     }
                   if($dbcat==$super)
                    {
                       
			 @$_SESSION['category']=$super;
			 redirect('Listes_admin');
                    }
		 }
         
		 else
			// echo "email ou password incorrect";
                $this->session->set_flashdata('error', 'email ou password incorrect');
                     redirect('Login');
	 }
         else{
             $this->session->set_flashdata('error', 'email ou password incorrect');
             redirect('Login');
         }
         }
         
	 else
		 die("erreur de connexion ");
         redirect('Login');
 
        }
        
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('Login');
        }
}
     
?>
