<?php 
	
	class home extends controller {

		public $loai_tinmodel;
		public $tinmodel;
		function __construct()
		{
			$this->loai_tinmodel = $this->model("loai_tinmodel");
			$this->tinmodel = $this->model("tinmodel");
		}
		public function product(){
			$this->view("masterlayout",[
				"page" => "home/blog",
			"loai_tin"=>$this->loai_tinmodel->get(),
			"tin"=> $this->tinmodel->get(),
			]);
		}
		public function loai_tin($id)
		{
			$this->view("masterlayout",[
				"page" => "home/items",
				"loai_tin"=>$this->loai_tinmodel->get(),
				"tin"=> $this->tinmodel->loai_tin($id),
			]);
		}

	}

 ?>