<?php
class user extends controller{
		public $usermodel;
		function __construct()
		{
            $this->usermodel = $this->model("usermodel");
		}
    public function product(){
        $this->viewadmin("masterlayout",[
            "page" => "user/index",
            "user"=>$this->usermodel->get(),
        ]);
    }

    public function view_insert(){
        $this->viewadmin("masterlayout",[
            "page" => "user/insert",
        ]);
    }

    public function insert(){
        $result_mess = false;
        $nameError = null;
        if (isset($_POST["submit"])) {
        
            if(empty($_POST["username"]) || empty($_POST["password"]) || ctype_space($_POST["username"])){
                $nameError = 'Please enter Name or Please enter password';
                
                $this->viewadmin("masterlayout",[
                    "page" => "user/insert",
                    "result"=> $result_mess,
                    "nameError" => $nameError,
                ]);
            }else{
                $username = $_POST["username"];
                $password = $_POST["password"];
                $password = password_hash($password,PASSWORD_DEFAULT);

                $result2= $this->usermodel->max($username);
                if(mysqli_num_rows($result2)>0){
                    $nameError = 'Tài khoản đã tồn tại';
                    $this->viewadmin("masterlayout",[
                        "page" => "user/insert",
                        "result"=> $result2,
                        "result"=> $result_mess,
                        "nameError" => $nameError,
                    ]);
                }else{
                    $kq = $this->usermodel->insert($username,$password);
                    $this->viewadmin("masterlayout",[
                        "page" => "user/insert",
                        "result"=> $kq,
                    ]);
                }

               
            }
            
        }
    }

    public function delete($id){
        $kq = $this->usermodel->delete($id);
        $this->viewadmin("masterlayout",[
            "page" => "user/index",
            "user"=>$this->usermodel->get(),
            "result"=> $kq,
        ]);
    }


} 
?>