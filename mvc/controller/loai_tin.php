<?php
class loai_tin extends controller{
        public $loai_tinmodel;
		public $tinmodel;
		function __construct()
		{
			$this->loai_tinmodel = $this->model("loai_tinmodel");
			$this->tinmodel = $this->model("tinmodel");
		}
    public function product(){
        $this->viewadmin("masterlayout",[
            "page" => "loai_tin/index",
            "loai_tin"=>$this->loai_tinmodel->get(),
        ]);
    }

    public function view_insert(){
        $this->viewadmin("masterlayout",[
            "page" => "loai_tin/insert",
        ]);
    }

    public function insert(){
        $result_mess = false;
        if (isset($_POST["submit"])) {
        
            if(empty($_POST["loai_tin"]) || ctype_space($_POST["loai_tin"])){
                $this->viewadmin("masterlayout",[
                    "page" => "loai_tin/insert",
                    "result"=> $result_mess,
                ]);
            }else{
                $ten_loai = $_POST["loai_tin"];
                $kq = $this->loai_tinmodel->insert($ten_loai);
                $this->viewadmin("masterlayout",[
                    "page" => "loai_tin/insert",
                    "result"=> $kq,
                ]);
            }
            
        }
    }
    public function edit($id){
        $this->viewadmin("masterlayout",[
            "page" => "loai_tin/edit",
            "edit" => $this->loai_tinmodel->edit($id),
        ]);
    }

    public function update($id){
        $result_mess = false;
        if (isset($_POST["submit"])) {
        
            if(empty($_POST["loai_tin"]) || ctype_space($_POST["loai_tin"])){
                $this->viewadmin("masterlayout",[
                    "page" => "loai_tin/edit",
                    "result"=> $result_mess,
                    "edit" => $this->loai_tinmodel->edit($id),
                ]);
            }else{
                $loai_tin = $_POST["loai_tin"];
                $kq = $this->loai_tinmodel->update($id,$loai_tin);
                $this->viewadmin("masterlayout",[
                    "page" => "loai_tin/edit",
                    "result"=> $kq,
                    "edit" => $this->loai_tinmodel->edit($id),
                ]);
            }
            
        }
    }

    public function delete($id){
        $kq = $this->loai_tinmodel->delete($id);
        $this->viewadmin("masterlayout",[
            "page" => "loai_tin/index",
            "loai_tin"=>$this->loai_tinmodel->get(),
            "result"=> $kq,
        ]);
    }
} 
?>