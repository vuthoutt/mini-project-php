<?php 

	class loai_tinmodel extends DB {

		public function get(){

			$sql ="SELECT *FROM loai_tin";
			return mysqli_query($this->con,$sql);
		}
		public function insert($ten_loai){
			$sql = "INSERT INTO `loai_tin`(`ten_loai`) VALUES ('$ten_loai')";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_decode($result);
		}
		public function edit($id){
			$sql="SELECT * FROM loai_tin WHERE id = $id";
			return mysqli_query($this->con,$sql);
		}

		public function update($id,$loai_tin){
			$sql = "UPDATE `loai_tin` SET `ten_loai`='$loai_tin' WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_decode($result);
		}

		public function delete($id){
			$sql = "DELETE FROM `loai_tin` WHERE id = $id";
			$result = false;
			if (mysqli_query($this->con,$sql)) {
				$result = true;
			}
			return json_decode($result);
		}
	}

 ?>