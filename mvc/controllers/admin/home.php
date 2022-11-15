<?php
class home extends controller{
    public $userModel;
    public $binhLuanModel;
    public $loaiModel;
    public $hangHoaModel;
    public $newsModel;
    public function __construct()
    {
        $this->loaiModel = $this->model("loaiModel");
        $this->userModel = $this->model("userModel");
        $this->binhLuanModel = $this->model("binhLuanModel");
        $this->hangHoaModel = $this->model("hangHoaModel");
        $this->newsModel = $this->model("newsModel");
    }
    public function SayHi(){
        $this->view(
            "layout1",
            [
            "Pages"=> "dashboard",
            "listAllSp"=>$this->hangHoaModel->listAllSanPham(),
            "listAllKh"=>$this->userModel->listAll(),
            "listAllLoai"=>$this->loaiModel->listAll(),
            "listAllBl"=>$this->binhLuanModel->listAll(),
            "listAllNews"=>$this->newsModel->SelectAllNews(),
            "tk"=> $this->loaiModel->thongke(),
            ],
        );
    }
}
?>