<?php 
function ttdh($n){
    switch ($n){
        case '0':
            $tt = "Đang xử lí";
            break;
        case '1':
            $tt = "Đang giao hàng";
            break;
        case '2':
            $tt = "Giao hàng thành công";
            break;
        default:
            break;
    }
    return $tt;
}

?>
<div class="content">
    <div class="container slide">
        <div class="col-md-8 col-ms-12">
            <div class="title my-2 text-white fs-6">HOME</div>
            <div class="headline-sm text-white fw-bolder lh-sm my-2 text-uppercase"><?=$data['Pages']?></div>
            <div class="line"></div>
            <div class="subtitle text-white fs-5 my-2">Capitalise on low hanging fruit to identify a ballpark value added activity to beta performance test. Override the digital divide.</div>
        </div>
    </div>
</div>



<div class="container">
<h2 class="py-3 text-uppercase text-center">Danh sách đơn hàng</h2>
    <table class="table">
    
    <thead>
        <tr>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Khách hàng</th>
        <th scope="col">Số lượng hàng</th>
        <th scope="col">Giá trị đơn hàng</th>
        <th scope="col">Tình trạng đơn hàng</th>
        <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody class="centerBill">
        <?php foreach ($data['billKH'] as $key){ 
            
            $ttdh = ttdh($key['status']);
            
        ?>            
        <tr>
            <th scope="row"><a class="text-dark bg-light" href="/live/billKH/SayHi&id=<?= $key['id']?>">NON-<?= $key['id']?></a>           
        </th>
            <td ><?= $key['name']?></td>
            <td><?= $key['sl'] ?></td>
            <td><?= number_format($key['total'])?> đ</td>
            <td> <?=$ttdh?> </td>
            <td class="btn_suaxoa p">
                <button class="btn btn-danger"><a href="/live/billKH/dell&id=<?=$key['id']?>" class="text-light nav-link">Hủy Đơn Hàng</a></button>
            </td>
        </tr>
        <?php }?>
    </tbody>
    </table>
</div>








<!-- <?php
                if(isset($data['chitietbill']) && $data['chitietbill'] != ''){
                    $i = 0; 
                    foreach($data['chitietbill'] as $kq){ 
                        echo '<div class="card-body p-0">
                                <div class="d-flex border text-center align-items-center">
                                    <div class="p-2 fs-5 col-lg-1 col-2 text-center">'.($i+1).'</div>
                                    <div class="p-2 fs-5 col-lg-3 col-4 text-center"><img style="width: 25px;" src="'.$kq['hinhHangHoa'].'"></div>
                                    <div class="p-2 fs-5 col-lg-2 col-2 text-center">'.$kq['tenHangHoa'].'</div>
                                    <div class="p-2 fs-5 col-lg-1 col-2 text-center">'.$kq['gia'].'</div>
                                    <div class="p-2 fs-5 col-lg-3 col-2 text-center">'.$kq['soLuong'].'</div>
                                </div>
                            </div> ';
                        $i++;
                    }
                }
            ?> -->


