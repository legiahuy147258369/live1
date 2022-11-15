<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
class login extends controller{
    //model
    public $userModel;
    public $billModel;
    public function __construct()
    {   
        $this->billModel = $this->model("billModel");
        $this->userModel = $this->model("userModel");
    }
    function SayHi(){
        if(isset($_SESSION['login'])){
            $this->view(
                "layout",
                [
                "Pages"=>"account",
                "khachHang"=>$this->userModel->SelectUserByMaKH($_SESSION['login']['maKH']),
                "billKH"=>$this->billModel->selectKH($_SESSION['login']['maKH']),
                ],
            );
        }else{
            $this->view(
                "layout",
                [
                "Pages"=>"login",
                ],
            );
        }
        
    }
    function KhachHangDangKy(){
        if(isset($_POST['btnSignin'])){
            $dem =0;
            $loi = "";
            if(strlen($_POST['user'])==0 || strlen($_POST['pw'])==0 ||strlen($_POST['pw'])==0||strlen($_POST['email'])==0||strlen($_POST['name'])==0 || strlen($_POST['address'])==0 ||strlen($_POST['number'])==0) {
                $loi = "Chưa điền đủ thông tin !";
            }else {
                $user = $_POST['user'];
                foreach($this->userModel->SelectUser($user) as $key){
                    if($key['user']==$user){
                        $loi =" Tài khoản đã có người sử dụng !";
                        $dem =1;
                    }
                }
                if($dem==0){
                    $pass = $_POST['pw'];
                    $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
                    $email = $_POST['email'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $number = $_POST['number'];
                    if($this->userModel->InsertNewUser($user,$pass_hash,$email,$name,$address,$number)==null){
                        $loi ="Đăng ký thành công !";
                    }
                }
            }
            if(isset($loi) && $loi !=""){
                echo "
                <div class='alert alert-success p-4 w-25 rounded text-center my-5 mx-auto'>".$loi."
                <div><a href='../home' class='btn btn-info text-white mt-3'>Trang chủ</a></div>
                </div>
                ";
            }
        }
    }
    function KhachHangDangNhap(){
        if(isset($_POST['btnLogin'])){
            $loi = "";
            if(strlen($_POST['user'])==0 || strlen($_POST['pw'])==0) {
                $loi = "Chưa điền đủ thông tin !";
            }else {
                $user = $_POST['user'];
                $pass = $_POST['pw'];
                if($this->userModel->SelectUser($user)){
                    foreach($this->userModel->SelectUser($user) as $key){
                            if(password_verify($pass,$key['matKhau'])){
                                echo "
                                <div class='alert alert-success p-2 w-25 rounded text-center my-5 mx-auto'>Đăng nhập thành công !
                                <div><a href='../home' class='btn btn-info text-dark my-2'>Trang chủ</a></div>
                                </div>
                                ";
                                $_SESSION['login']=$key;
                                $_SESSION['login']['user']=$key['user'];
                                $_SESSION['login']['pass']=$key['matKhau'];
                                $_SESSION['login']['hoTen']=$key['tenKH'];
                                $_SESSION['login']['vaiTro']=$key['vaiTro'];
                                $_SESSION['login']['maKH']=$key['maKH'];
                            }else echo "Sai";
                    }
                }else $loi ="Sai tài khoản";
            }
            if(isset($loi) && $loi !=""){
                echo "
                <div class='alert alert-danger p-2 w-25 rounded text-center my-5 mx-auto'>".$loi."
                <div><a onclick='history.back();' class='btn btn-danger text-white my-2'>Trở lại</a></div>
                </div>
                ";
            }
        }
    }
    function KhachHangDangXuat(){
        unset($_SESSION['login']);
        header("location: ../home");
    }
}
?>