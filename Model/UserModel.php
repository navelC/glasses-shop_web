<?php
class UserModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function signup($username, $pass, $email){
		$sql = "INSERT INTO user(name,password,email,images,role)
					values ('$username','$pass','$email','no-image-icon-md.png','customer')";
		$result = $this->db->conn->query($sql);	
	}
	public function signin($username, $pass){
		$sql = "SELECT * FROM user WHERE name = '$username' AND password = '$pass'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function checkExistsName($username) {
		$sql = "SELECT * FROM user WHERE name = '$username'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function checkExistsEmail($email) {
		$sql = "SELECT * FROM user WHERE email = '$email'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function all()
	{
		$sql = 'SELECT * FROM user';
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function permission($id, $role)
	{
		$sql = "UPDATE user SET role = '$role' where id = $id";
		$result = $this->db->conn->query($sql);
	}
	public function del($id)
	{
		$sql = 'DELETE FROM user WHERE id = $id';
	}
	public function resetPass($id, $pass)
	{
		$sql = "UPDATE user set password = '$pass' WHERE id = $id";
		if($this->db->conn->query($sql))
			return 'true';
		return 'false';
	}
	public function count()
		{
			$sql = "SELECT COUNT(*) as 'count'  FROM user ";
			$result = $this->db->conn->query($sql);
			$data = $result->fetch_array();
			return $data['count'];
		}
} 
?>