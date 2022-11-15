<?php
class billModel extends db{

        public function CreateCart($use,$maHH,$hinhAnh,$ten,$gia,$sl,$tt,$last){
            $sql = "INSERT INTO giohang (maKH,maHangHoa,hinhHangHoa,tenHangHoa,gia,soLuong,thanhTien,idBill)  VALUES (?,?,?,?,?,?,?,?)";
            return $this->pdo_execute($sql,$use,$maHH,$hinhAnh,$ten,$gia,$sl,$tt,$last);
            
        }

        public function CreateBill($name,$use,$dc,$sdt,$email,$pttt,$ngay,$sumqty,$tt){
            $sql = "INSERT INTO bill (name,maKH, diaChi,sdt,email,pttt,ngay,sl,total)  VALUES (?,?,?,?,?,?,?,?,?)";
            return $this->pdo_query_id($sql,$name,$use,$dc,$sdt,$email,$pttt,$ngay,$sumqty,$tt);
        }
        
        public function ShowBill($last){
            $sql = "SELECT * FROM bill where id= $last";
            return $this->pdo_query($sql);
        }
        public function count($get){
            $sql = "SELECT SUM(soLuong) as dem FROM giohang where idBill= '$get'";
            $row = $this->pdo_query($sql);
            return $row[0]['dem']; 
        }
        
        public function ShowAllBill(){
            $sql = "SELECT * FROM bill ORDER BY id DESC;";
            return $this->pdo_query($sql);
        }

        public function dellIdBill($id){
            $sql = "SET FOREIGN_KEY_CHECKS=0;";
            $sql .= " DELETE FROM bill WHERE id = ? ;";
            $sql .= " SET FOREIGN_KEY_CHECKS=1;";
            return $this->pdo_execute($sql,$id);
        }
        public function ShowID($id){
            $sql = "SELECT * FROM bill where id= $id";
            return $this->pdo_query($sql);
        }
        public function UpdateBill($status,$n){
                $sql = "UPDATE bill SET status = ? WHERE id = ?";
                return $this->pdo_execute($sql,$status,$n);
        }
        public function selectKH($u){
            $sql = "SELECT * FROM bill WHERE maKH = ? ORDER BY id DESC ";
            return $this->pdo_query($sql,$u);
        }
        public function chitietbill($i){
            $sql = "SELECT * FROM giohang where idbill= $i";
            return $this->pdo_query($sql);
        }  
        public function CountBill(){
            $sql = "SELECT count(id) as dem FROM bill";
            $count = $this->pdo_query($sql);
            return $count[0]['dem'];
        }  
        public function PhanTrang($perPage,$offset){
            $sql = "SELECT * FROM bill ORDER BY id asc LIMIT ".$perPage." OFFSET ".$offset ;
            $data = $this->pdo_query($sql);
            return $data;
        }
    }
?>