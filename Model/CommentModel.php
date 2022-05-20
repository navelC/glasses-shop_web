<?php  
Class CommentModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function getComments($id)
	{
		$sql = "select comment.content,comment.date,user.*,rating.rate from comment left join user on comment.iduser = user.id right join rating on comment.iduser = rating.iduser and comment.idproduct = rating.idproduct where comment.idproduct = $id";
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function insert($content, $iduser, $idproduct)
	{
		$sql = "INSERT into comment(content, iduser, idproduct) Values('$content',$iduser,$idproduct)";
		$this->db->conn->query($sql);
	}
	public function list()
	{
		$sql = "SELECT * from comment";
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function count()
		{
			$sql = "SELECT COUNT(*) as 'count'  FROM comment ";
			$result = $this->db->conn->query($sql);
			$data = $result->fetch_array();
			return $data['count'];
		}
}
?>