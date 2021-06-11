<?php
class tinmodel extends DB{
    public function get(){
        $sql = "SELECT * FROM tin WHERE trang_thai = 1";
        return mysqli_query($this->con,$sql);
    }

    public function loai_tin($id){
        $sql = "SELECT * FROM tin WHERE loai_tin = $id AND trang_thai = 1";
        return mysqli_query($this->con,$sql);
    }
}
?>