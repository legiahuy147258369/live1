<?php

class menu extends controller{
    public $sanpham;
    public $xemthem;
    public function __construct()
    {
        $this->sanpham = $this->model("hangHoaModel");
    }

    
    function SayHi($a){  
            $keyword = isset($_POST['keyword']) ? $_POST['keyword'] :''; 

            if(isset($_GET['page'])){
                $page = $_GET['page'] * 4;
            } else{
                $page = 4;
            }
            $data = $this->sanpham->SelectProductbyIDType($a,$keyword,$page);    
            
            $this->view(
            "layout",
            [
            "Pages"=>"menu",
            "AllType"=>$this->sanpham->listAllLoai(),
            "ProductbyIDType"=>$data,
            "idLoai"=>$a,
            ],
        ); 
    }
    
    function detailsproduct($a){
        $this->view(
            "layout",
            [
            "Pages"=>"detailsproduct",
            "AllType"=>$this->sanpham->listAllLoai(),
            "ProductID"=>$this->sanpham->SelectProductID($a),
            "CmtID"=>$this->sanpham->SelectCmtbyID($a),
            "KhachHang"=>$this->sanpham->listAllKH(),
            ],
        );
    }
}

?>