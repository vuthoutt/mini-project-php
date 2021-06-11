<?php 
class login extends controller{
        public $usermodel;
		function __construct()
		{
            $this->usermodel = $this->model("usermodel");
		}
    public function product(){
        $this->viewadmin("login",[
            // "page" => "loai_tin/index",
            // "loai_tin"=>$this->loai_tinmodel->get(),
        ]);
    }
    public function login(){
        $result_mess = false;
        $nameError = null;
        if (isset($_POST["submit"])) {
            $username= $_POST["username"];
            $password_input= $_POST["password"];
            if(empty($_POST["username"])||empty($_POST["password"])){
                $nameError = 'vui lòng nhập tên và mật khẩu';
                $this->viewadmin("login",[
                    "result"=>$result_mess,
                    "nameError" => $nameError,
                ]);
            }
            $result = $this->usermodel->login($username);
            if(mysqli_num_rows($result)>0){
                if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $username = $row["username"];
                    $password = $row["password"];
                   
                }

                if(password_verify($password_input,$password)){
                    if(isset($_POST['remember'])){
                        setcookie('username',$username,time()+3600);
                        setcookie('password',$password_input,time()+3600);
                    }
                    // $_SESSION["id"] = $id;
                    // $this->viewadmin("masterlayout",[
                    //     "page"=>"dash/index",
                    //     "result"=>$result_mess=true,
                    // ]);
                    setcookie("id",$id,time()+3600,"/","",0);
                    header("Location:http://localhost/websitemvc/loai_tin");
                }else {
                    $nameError = 'Tài Khoản hoặc mật khẩu không đúng';
                    $this->viewadmin("login",[
                        "result"=>$result_mess,
                        "nameError" => $nameError,
                    ]);

                }
            }
        }
        else {
            $nameError = 'Tài Khoản hoặc mật khẩu không đúng';
            $this->viewadmin("login",[
                "result"=>$result_mess,
                "nameError" => $nameError,
            ]);

        }
    }
    }

    public function logout(){
        // unset($_SESSION["id"]);
        // session_destroy();
        // if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
        //     $username = $_COOKIE['username'];
        //    $password_input = $_COOKIE['password'];
        //    setcookie('username',$username,time()-1);
        //     setcookie('password',$password_input,time()-1);
        // }
        setcookie('id',true,time()- 3600,'/');
        $this->viewadmin("login",[
          
        ]);
    }

}

?>