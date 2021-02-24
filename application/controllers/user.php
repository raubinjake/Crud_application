<?php 
/**
 * 
 */
class User extends CI_controller
{
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
			$password=$this->input->post('password');
			$checked_value=$this->User_model->check_user($email,$password);
			if($checked_value==1)
				{
					redirect(base_url().'index.php/user/exits');
				}	    
		    	else
		    	{
		    		$this->index();
		    		echo"Username or Password is invalid, Try Again !";
		    	}

		}

		else
		{
			$this->index();
		}
	}

	function exits(){
	        $user=$this->User_model->all();
		    $data=array();
		    $data['users']=$user;
		    $this->load->view('List',$data);  
	}
	function create(){
		$this->load->model('User_model');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		//$this->form_validation->set_rules('userfile','userfile','required');
		        $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|png';
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
			$formArray['password']=$this->input->post('password');
			$formArray['created_date']=date('Y-m-d');
			$userfile=$this->input->post();
			//print_r($userfile) ;
			//die;
			$data=$this->upload->data();
			//echo "<pre>";
			//print_r($data);
			//die();
			$image_path=base_url("upload/".$data['raw_name'].$data['fiel_ext']);
			$formArray['image_path']=$image_path;
			$this->User_model->create($formArray);
			$this->session->set_flashdata('success','Record added successfully');
			redirect(base_url().'index.php/user/exits');
		}
		else
		{		
				$upload_error=$this->upload->display_errors();	
			   $this->load->view('create',compact('upload_error'));
			}

	}
	
	//Update value in database
	function edit($id){
		$this->load->model('User_model');
		$user=$this->User_model->getUser($id);
		$data=array();
		$data['user']=$user;
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','password','required');

		if($this->form_validation->run() == false)
			{			
			   $this->load->view('Edit',$data);
			}
		else{
			//update value 
			$formArray=array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$formArray['password']=$this->input->post('password');
			$this->User_model->updateUser($id,$formArray);
			$this->session->set_flashdata('success','Record Updated successfully');
			redirect(base_url().'index.php/user/exits');
		}
	}
		//for delete the value from database
		function delete($id){
			$this->load->model('User_model');
			$user=$this->User_model->getUser($id);
			if(empty($user)){
				$this->session->set_flashdata('failure','Record not found in database');
			    redirect(base_url().'index.php/user/index');
			}
			$this->User_model->deleteUser($id);
			$this->session->set_flashdata('success','Record Deleted successfully');
			redirect(base_url().'index.php/user/exits');
		}
}
?>