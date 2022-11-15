<?php
class donhang extends controller{
    public $billModel;
    public function __construct()
    {
        $this->billModel = $this->model("billModel");
    }
    
    function SayHi(){

        $countBill = $this->billModel->CountBill();
        $perPage = 5;
        // function __construct($page){
        //     return $page;
            
        // }
        
        $pageCount = (int) ceil($countBill / $perPage); 
        $currentPage = isset($page) ? (int) $page : 1;
        $offset =  ($currentPage - 1) * $perPage; 
        $this->view(
            "layout1",
            [
            "Pages"=>"donhang",
            "currentPage"=>$currentPage,
            "AllBill"=>$this->billModel->PhanTrang($perPage,$offset),
            "countSP"=> $pageCount,     
            ],
        );

        
    }
    function editdonhang(){
        $id = $_GET['id'];
        $this->view(
            "layout1",
            [
            "Pages"=>"editdonhang",
            // "AllBill"=>$this->billModel->ShowAllBill(),
            "idbill"=>$this->billModel->ShowId($id),
            ],
        );
        
    }
    function update(){
        if(isset($_POST['status'])){
            $status = $_POST['status'];
            $id = $_POST['id'];
            $this->billModel->UpdateBill($status,$id);
            header('Location: /live/admin/donhang/');
        } 
    }

    function dell(){
        $id = $_GET['id'];
        $this->billModel->dellIdBill($id);
        header('Location: /live/admin/donhang/');
    }
}

?>