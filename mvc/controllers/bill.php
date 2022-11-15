<?php

class bill extends controller
{
    public $billModel;
    public function __construct()
    {
        $this->billModel = $this->model("billModel");
    }
    public function SayHi()
    {
        $this->view(
            "layout",
            [
            "Pages"=>"bill",
            "Cart"=>$this->bill(),

            ],
        );
    }
    
    public function bill()
    {
        if (isset($_SESSION['login'])) {
            if (isset($_POST['dathang'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $dc = $_POST['dc'];
                $tt = $_POST['tongtien'];
                $sumqty = $_POST['sumqty'];
                $pttt = $_POST['pttt'];
                if (isset($_SESSION['login'])) {
                    $use = $_SESSION['login']['maKH'];
                }

                $ngay = date("d/m/Y");

                $last = $this->billModel->CreateBill($name, $use, $dc, $sdt, $email, $pttt, $ngay, $sumqty, $tt);

                for ($i=0 ; $i < sizeof($_SESSION['vohang']) ;$i++) {
                    $maHH = (int)$_SESSION['vohang'][$i][0];
                    $hinhAnh = $_SESSION['vohang'][$i][2];
                    $ten = $_SESSION['vohang'][$i][1];
                    $gia = (int)$_SESSION['vohang'][$i][3];
                    $sl = $_SESSION['vohang'][$i][4];
                    $tt = $_SESSION['vohang'][$i][4] * $_SESSION['vohang'][$i][3];
                    $this->billModel->CreateCart($use, $maHH, $hinhAnh, $ten, $gia, $sl, $tt, $last);
                }
                $show = $this->billModel->ShowBill($last);
                header('Location: /live/mybill&lastid='.$last);
            }
        } else{
            header('Location: /live/login');
        }
    }

}


?>