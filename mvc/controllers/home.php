<?php
class home extends controller{
    //model
    public $loaiModel;
    public $hangHoaModel;

    public function __construct()
    {
        $this->loaiModel = $this->model("loaiModel");
    }

    function SayHi(){
        $this->view(
            "layout",
            [
            "Pages"=>"banner",
            "loai"=>$this->loaiModel->listAll(),
            ],
        );
    }

    function Show(){
        $this->view(
            "layout",
            [
            "Pages"=>"blog",
            "loai"=>$this->loaiModel->listAll(),
            ],
        );
    }
}

?>