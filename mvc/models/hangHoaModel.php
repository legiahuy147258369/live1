
<?php
class hangHoaModel extends db{
    public function listAllSanPham(){
        $sql = "SELECT * FROM hanghoa";
        return $this->pdo_query($sql);
    }
    public function SelectProductID($id){
        $sql = "SELECT * FROM hanghoa WHERE maHangHoa = ?";
        return $this->pdo_query($sql, $id);
    }
    public function listAllLoai(){
        $sql = "SELECT * FROM loai";
        return $this->pdo_query($sql);
    }
    public function SelectProductbyIDType($id,$keyword,$page){
        $sql = "SELECT * FROM hanghoa WHERE maLoai = ".$id." and  tenHangHoa LIKE '%". $keyword ."%' LIMIT 0,".$page;
        return $this->pdo_query($sql);
    }
    public function listAllCmt(){
        $sql = "SELECT * FROM binhluan";
        return $this->pdo_query($sql);
    }
    public function SelectCmtbyID($id){
        $sql = "SELECT * FROM binhluan WHERE maHangHoa = ?";
        return $this->pdo_query($sql,$id);
    }
    public function listAllKH(){
        $sql = " SELECT * FROM khachhang";
        return $this->pdo_query($sql);
    }
    public function DeleteAllByLoai($maLoai){
        $sql = "DELETE FROM hanghoa WHERE maLoai= ?";
        $this->pdo_execute($sql,$maLoai);
    }
    public function SelectSpByTenSp($tenHangHoa){
        $sql = "SELECT * FROM hanghoa WHERE tenHangHoa = ?";
        return $this->pdo_query($sql, $tenHangHoa);
    }
    public function UpdateSp($tenHangHoa,$gia,$target_file,$moTa,$maLoai,$soLuong,$maHangHoa){
        $sql = "UPDATE hanghoa
        SET tenHangHoa = ?, gia =?, hinhAnh = ?, moTa =?, maLoai = ?, soLuong = ?
        WHERE maHangHoa = ?";
        return $this->pdo_execute($sql,$tenHangHoa,$gia,$target_file,$moTa,$maLoai,$soLuong,$maHangHoa);
    }
    public function UpdateSpNoImg($tenHangHoa,$gia,$moTa,$maLoai,$soLuong,$maHangHoa){
        $sql = "UPDATE hanghoa
        SET tenHangHoa = ?, gia =?, moTa =?, maLoai = ?, soLuong = ?
        WHERE maHangHoa = ?";
        return $this->pdo_execute($sql,$tenHangHoa,$gia,$moTa,$maLoai,$soLuong,$maHangHoa);
    }
    public function DeleteHangHoa($maHangHoa){
        $sql = "DELETE FROM hanghoa WHERE maHangHoa=?";
        $this->pdo_execute($sql,$maHangHoa);
    }
    public function InsertHangHoa($tenHangHoa,$gia,$hinh,$moTa,$maLoai,$soLuong){
        $sql = "INSERT INTO hanghoa(tenHangHoa,gia,hinhAnh,moTa,maLoai,soLuong) VALUES(?,?,?,?,?,?)";
        return $this->pdo_execute($sql,$tenHangHoa,$gia,$hinh,$moTa,$maLoai,$soLuong);
    }
    public function UpdateCountSp($soLuong,$maHangHoa){
        $sql = "UPDATE hanghoa
        SET soLuong= ?
        WHERE maHangHoa = ?";
        return $this->pdo_execute($sql,$soLuong,$maHangHoa);
    }
    public function XemThem($ma,$from,$count){
        $sql = "SELECT * FROM hanghoa WHERE maLoai = ".$ma." LIMIT ".$from.", ".$count;
        $data = $this->pdo_query($sql);
        return $data;
    }
    public function CountLoai($maLoai){
        $sql = "SELECT count(maHangHoa) as dem FROM hanghoa WHERE maLoai= ?";
        $data =$this->pdo_query($sql,$maLoai);
        return $data[0]['dem'];
    }
}
?>