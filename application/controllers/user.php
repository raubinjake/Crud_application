<?php 
/**
 * 
 */
class User extends CI_controller
{
	function index()
	{
		$this->load->model('User_model');
		$users=$this->User_model->all();
		$data=array();
		$data['users']=$users;
		$this->load->view('List',$data);
	}
	function create(){
		$this->load->model('User_model');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		if($this->form_validation->run() == false)
			{			
			   $this->load->view('create');
			}
		else
		{
			//save record to database
			$formArray= array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$formArray['created_date']=date('Y-m-d');
			$this->User_model->create($formArray);
			$this->session->set_flashdata('success','Record added successfully');
			redirect(base_url().'index.php/user/index');
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
		if($this->form_validation->run() == false)
			{			
			   $this->load->view('Edit',$data);
			}
		else{
			//update value 
			$formArray=array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$this->User_model->updateUser($id,$formArray);
			$this->session->set_flashdata('success','Record Updated successfully');
			redirect(base_url().'index.php/user/index');
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
			redirect(base_url().'index.php/user/index');
		}
}
 ?>