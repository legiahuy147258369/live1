<?php
class userModel extends db{
    public function listAll(){
        $sql = "SELECT * FROM khachhang";
        return $this->pdo_query($sql);
    }
    public function InsertNewUser($user,$pass,$email,$name,$address,$number){
        $sql = "INSERT INTO khachhang(user,matKhau,email,tenKH,diaChi,soDienThoai) VALUES(?,?,?,?,?,?)";
        return $this->pdo_execute($sql,$user,$pass,$email,$name,$address,$number);
    }
    public function SelectUser($user){
        $sql = "SELECT * FROM khachhang WHERE user = ?";
        return $this->pdo_query($sql,$user);
    }
    public function SelectUserByMaKH($maKH){
        $sql = "SELECT * FROM khachhang WHERE maKH = ?";
        return $this->pdo_query($sql,$maKH);
    }
    public function UpdateKH($tenKH,$email,$matKhau,$vaiTro,$diaChi,$hinh,$maKH){
        $sql = "UPDATE khachhang
        SET tenKH = ?, email = ?, matKhau = ?, vaiTro =?,diaChi=?,hinh=?
        WHERE maKH = ?";
        return $this->pdo_execute($sql,$tenKH,$email,$matKhau,$vaiTro,$diaChi,$hinh,$maKH);
    }
    public function UpdateKHNoImg($tenKH,$email,$matKhau,$vaiTro,$diaChi,$maKH){
        $sql = "UPDATE khachhang
        SET tenKH = ?, email = ?, matKhau = ?, vaiTro =?,diaChi=?
        WHERE maKH = ?";
        return $this->pdo_execute($sql,$tenKH,$email,$matKhau,$vaiTro,$diaChi,$maKH);
    }
    public function DeleteKH($maKH){
        $sql = "DELETE FROM khachhang WHERE maKH= ?";
        $this->pdo_execute($sql,$maKH);
    }
    public function InsertKH($tenKH,$email,$user,$matKhau,$hinh,$vaiTro,$diaChi){
        $sql = "INSERT INTO khachhang(tenKH,email,user,matKhau,hinh,vaiTro,diaChi) VALUES(?,?,?,?,?,?,?)";
        return $this->pdo_execute($sql,$tenKH,$email,$user,$matKhau,$hinh,$vaiTro,$diaChi);
    }
}
?>