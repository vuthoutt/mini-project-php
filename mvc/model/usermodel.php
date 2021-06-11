<?php 

	class usermodel extends DB {

		public function get(){

			$sql ="SELECT *FROM user";
			return mysqli_query($this->con,$sql);
		}

        public function insert($username,$password){
            $sql = "INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')";
            $result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_decode($result);
        }

        public function delete($id){
			$sql = "DELETE FROM `user` WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_decode($result);
		}
		public function max($username){
			$sql = "SELECT * FROM user WHERE username='{$username}'";
			return mysqli_query($this->con,$sql);
		}

		public function login($username){
			$sql = "SELECT * FROM user WHERE username = '{$username}'";
			return mysqli_query($this->con,$sql);
		}
	
    }
 ?>