<?php 
/**
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_controller
{
	/*public function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('id') )
			$this->check_login();
		//else
		//	$this->check_login();
	}*/

	function index()
	{  	
		
		$this->load->view('Login');          		
			    
	}

	function check_login()
	{
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run()) 
		{
				//
			$email=$this->input->post('email');
			$password=sha1($this->input->post('password'));
			$checked_value=$this->User_model->check_user($email,$password);
			if($checked_value==1)
				{
					$this->session->set_userdata('id',$checked_value);
					return redirect(base_url().'index.php/user/exits');
				}	    
		    	else
		    	{
		    		
		    		$this->session->set_flashdata('login_failed','Username or Password is invalid, Try Again !');
		    		
		    		$this->index();
		    	}

		}


	}

	function exits(){
			if( ! $this->session->userdata('id'))
		        {
		        $this->index();
		     }
		    else
		    {
		    	$user=$this->User_model->all();
		    	$data=array();
		    	$data['users']=$user;
		    	$this->load->view('List',$data);
		    }
	}

	function logout()
	{
		$this->session->sess_destroy();
		return redirect (base_url().'index.php/user/');
	}
	function create(){

		if( ! $this->session->userdata('id'))
		        {
		        $this->index();
		     }
		     else{
		$this->load->model('User_model');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		//$this->form_validation->set_rules('userfile','userfile','required');
		        $config['upload_path'] = './upload/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;	
                //$this->load->library('upload', $config);
                $this->upload->initialize($config);
		
		if($this->form_validation->run() && $this->upload->do_upload())
		{
			//save record to database

               

			$formArray= array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$password = $this->input->post('password');
			//$this->load->library('password');
			$formArray['password'] = sha1($this->input->post('password'));
			$formArray['created_date']=date('Y-m-d');
			$userfile=$this->input->post();
			//print_r($userfile) ;
			//die;
			$data=$this->upload->data();
			//echo "<pre>";
			//print_r($data);
			//die();
			$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
			$formArray['image_path']=$image_path;
			$this->User_model->create($formArray);
			$this->session->set_flashdata('success','Record added successfully');
			return redirect (base_url().'index.php/user/exits');
		}
		else
		{		
				$upload_error=$this->upload->display_errors();	
			   $this->load->view('create',compact('upload_error'));
			}
	}		

	}
	
	//Update value in database
	function edit(){

       

		if( ! $this->session->userdata('id') || $this->uri->segment(3)=='')
		        {
		        $this->index();
		        }
		else{

			$id =$this->uri->segment(3); 

		$this->load->model('User_model');
		$user=$this->User_model->getUser($id);
		$data=array();
		$data['user']=$user;
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','password','required');
		$config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->upload->initialize($config);

		if($this->form_validation->run() && $this->upload->do_upload())
			
		{
			//update value 
			$formArray=array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$formArray['password']=sha1($this->input->post('password'));
			$userfile=$this->input->post();
			$data=$this->upload->data();
			//echo "<pre>";
			//print_r($data);
			//die();
			$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
			$formArray['image_path']=$image_path;
			$this->User_model->updateUser($id,$formArray);
			$this->session->set_flashdata('success','Record Updated successfully');
			return redirect (base_url().'index.php/user/exits');
		}
		else
		{			
			$this->load->view('Edit',$data);
		}

	}	
	}
		//for delete the value from database
		function delete(){


			if( ! $this->session->userdata('id') || $this->uri->segment(3)=='')
		        {
		        $this->index();
		     }

		    else{
		    	$id =$this->uri->segment(3);

			$this->load->model('User_model');
			$user=$this->User_model->getUser($id);
			if(empty($user)){
				$this->session->set_flashdata('failure','Record not found in database');
			    return redirect(base_url().'index.php/user/index');
			}
			$this->User_model->deleteUser($id);
			$this->session->set_flashdata('success','Record Deleted successfully');
			return redirect (base_url().'index.php/user/exits');
		}

	}
}
?>