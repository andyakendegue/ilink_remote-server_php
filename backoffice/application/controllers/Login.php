<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function _construct()
        {
            parent::__construct();


        }

       public function index(){

    $data['alert']='';
		$this->load->view('login',$data);

        }




       public function validate(){

          $this->load->database();

           if($this->input->post('maill') && $this->input->post('password')){
	           $email=$this->input->post('maill');
               $password = $this->input->post('password');
               $m=$email;
               $query= $this->db->query("SELECT * FROM membres WHERE Email='$email' and password='$password'");
	           $numrows=$query->num_rows();

	           if($numrows!=0){

		          foreach($query->result_array() as $row){
			         $dbemail=$row['Email'];
               $dbusername=$row['username'];
			         $dbpassword=$row['password'];
                     $dbcat=$row['category'];
                        }

		          if($email==$dbemail && $password==$dbpassword  ){
                     $this->session->set_userdata('Email', $email);
                     $this->session->set_userdata('username', $dbusername);
                     $simple="simple";
                     $super="super";
                     $admin="admin";

                     if($dbcat==$simple){
			             @$_SESSION['category']=$simple;
			             redirect('Admin_dash');
                 } else if($dbcat==$super){
                       @$_SESSION['category']=$super;
			           redirect('Admin_dash');
               } else if($dbcat==$admin){
                       @$_SESSION['category']=$admin;
			           redirect('Admin_dash');
                     }
		           } else {
			         // echo "email ou password incorrect";
                     $this->session->set_flashdata('error', 'email ou password incorrect');
                     $data['alert']="ok";
                     $data['message']="The Email or the password is incorrect!";

                     //redirect('Login', $data);
                     $this->load->view('login',$data);
                  }
	           } else{
                  $this->session->set_flashdata('error', 'email ou password incorrect');
                  $data['alert']="ok";
                  $data['message']="The Email or the password is incorrect!";

                  //redirect('Login',$data);
                  $this->load->view('login',$data);
                }
         } else {
		      die("erreur de connexion ");
          $data['alert']="ok";
          $data['message']="Connexion error!";

              //redirect('Login',$data);
              $this->load->view('login',$data);
           }

        }

        public function logout()
        {
            $this->session->sess_destroy();
            $data['alert']='';
            redirect('Login',$data);
        }
}

?>
