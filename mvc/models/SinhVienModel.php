<?php
class SinhVienModel extends db{
    public function GetSV(){
        return "Nguyen Van Teo";
    }
    public function Tong($a,$b){
        return $a + $b;
    }
    public function SinhVien(){
        $sql = "SELECT * FROM sinhvien";
        return $this->pdo_query($sql);
    }
}
?>