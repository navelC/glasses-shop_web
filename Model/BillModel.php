<?php  
	class BillModel extends Database
	{
		protected $db;
		function __construct()
		{
			$this->db = new Database();
			$this->db->connect();
		}
		public function insertBill($total,$time,$iduser,$name,$phone,$address)
		{
			$sql="INSERT INTO bill(total_price,order_date,iduser,status,name,address,phone) values($total,'$time',$iduser,'chờ xác nhận','$name','$address',$phone)";
			echo $sql;
			if ($this->db->conn->query($sql)) 
				$id = $this->db->conn->insert_id;
			return $id;
		}
		public function insertDetailBill($id, $array)
		{
			$values = '';
			$count = 0;
			foreach ($array as $key => $value) {
				if($count == 0) $values.="($key, $value, $id)";
				else $values.=",($key, $value, $id)";
				$count++;
			}
			$sql="INSERT INTO detail_bill(idproduct, quantity, idbill) values $values";
			$this->db->conn->query($sql);
		}
		public function all()
		{
			$sql = "SELECT * FROM bill";
			$result = $this->db->conn->query($sql);
			while ($data = $result->fetch_array()) {
				$list[] = $data;
			}
			return $list;
		}
		public function listByStatus($status)
		{
			$sql = "SELECT * FROM bill where status = '$status'";
			$result = $this->db->conn->query($sql);
			while ($data = $result->fetch_array()) {
				$list[] = $data;
			}
			return $list;
		}
		public function changeStatus($id, $status, $time)
		{
			$sql = "UPDATE bill SET status = '$status', delivery_date = '$time' WHERE id = $id";
			$result = $this->db->conn->query($sql);
		}
		public function listByUser($id)
		{
			$sql = "SELECT * FROM bill where iduser = $id";
			$result = $this->db->conn->query($sql);
			while ($data = $result->fetch_array()) {
				$list[] = $data;
			}
			return $list;
		}
		public function count()
		{
			$sql = "SELECT COUNT(*) as 'count'  FROM bill ";
			$result = $this->db->conn->query($sql);
			$data = $result->fetch_array();
			return $data['count'];
		}
		public function sum()
		{
			$sql = "SELECT SUM(total_price) as sum FROM bill";
			$result = $this->db->conn->query($sql);
			$data = $result->fetch_array();
			return $data['sum'];
		}
		// public function sumBy($columnname, $val)
		// {
		// 	$sql = "SELECT SUM(total_price) as sum FROM bill Where $columnname = $val";
		// 	$result = $this->db->conn->query($sql);
		// 	$data = $result->fetch_array();
		// 	return $data['sum'];
		// }

	}
?>