<?php

class billKH extends controller
{
    public $billModel;
    public function __construct()
    {
        $this->billModel = $this->model("billModel");
    }
    // function chitietbill($id){
    //     $kh =$this->billModel->chitietbill($id);
    //     return $kh;
    // }

    public function SayHi()
    {   
        if (isset($_SESSION['login'])) {
            if(isset($_GET['id'])) {
                $chitiet =$this->billModel->chitietbill($_GET['id']);
            }{
                $chitiet = '';
            }
            $kh =$this->billModel->selectKH($_SESSION['login']['maKH']);
            $this->view(
            "layout",
            [
            "Pages"=>"billKH",
            "billKH"=>$kh,
            "chitietbill"=>$chitiet,
            ],
        );

        } else{
            header('Location: /live/login');
        }
        
    }
    
    function dell(){
        $id = $_GET['id'];
        $this->billModel->dellIdBill($id);
        header('Location: /live/billKH');
    }

}


?>