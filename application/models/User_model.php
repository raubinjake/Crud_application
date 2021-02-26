<?php
/**
 * 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_model
{
	// Insert data in to database
	
	function create($formArray){
		$this->db->insert("users",$formArray); //insert into users 
	}
	//fetch all data from database for display
	function all()
	{
		return $users=$this->db->get('users')->result_array();
	}


	function check_user($email,$password)
	{
		$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result=$this->db->query($sql)->result_array();
		if(empty($result))
		{
			return 0;
		}
		else{
			return 1;
		}
	}
	// fetch single row for update a single row value
	function getUser($id){

		$this->db->where('id',$id);
		return $user = $this->db->get('users')->row_array();
	}
	// insert updated row in database
	function updateUser($id,$formArray){
		$this->db->where('id',$id);
		$this->db->update('users',$formArray);
	}

	// delete user from database
	function deleteUser($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('users');
	}
}


?>