<?php 
require_once "./mvc/core/db.php";
$database = new db();

$trang = isset($_POST['trang'])? $_POST['trang']: 1;
$perPage= 2;
$from = ($trang -1) * $perPage;
$maloai=1;

$sql =" SELECT * FROM hanghoa where maLoai =  order by maHangHoa limit $from ,$perPage";
$data = $database->pdo_query($sql);
echo $data;
?>