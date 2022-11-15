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
            $tt = "Hoàn tất";
            break;
        default:
            break;
    }
    return $tt;
}

?>
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
        <?php foreach ($data['AllBill'] as $key){ 
            $ttdh = ttdh($key['status']);
        ?>            
        <tr>
        <th scope="row">NON-<?= $key['id']?></th>
        <td ><?= $key['name']?></td>
        <td><?= $key['sl'] ?></td>
        <td><?= number_format($key['total'])?> đ</td>
        <td> <?= $ttdh?> </td>
        <td class="btn_suaxoa p"><button class="btn btn-success"><a class="text-light nav-link" href="/live/admin/donhang/editdonhang&id=<?=$key['id']?>">Sửa</a></button>
                     <button class="btn btn-danger"><a href="/live/admin/donhang/dell&id=<?=$key['id']?>" class="text-light nav-link">Xóa</a></button>
        </td>
        </tr>
        <?php }?>
    </tbody>
    </table>
</div>

<nav class=" w-100 pt-5  ">
    <ul class="d-flex justify-content-center pagination">
        <?php if($data['currentPage']>2){
            $first = 'href="/live/menu/SayHi/1"';
        ?>
        <li class="page-item ">
            <a class="page-link text-dark bg-light" <?= $first?> >FIRST</a>
        </li>
            <?php } ?>

        <?php if($data['currentPage'] > 1){ 
            $prev = $data['currentPage'] -1;?>
            <li class="page-item ">
                <a class="page-link text-dark bg-light" href="/live/menu/SayHi/<?=$first?>"><<</a>
            </li>
        <?php } ?>


        <?php for($i = 1; $i <= $data['countSP']; $i++) {
                if ($i != $data['currentPage'] ){ 
                    if(($i > $data['currentPage'] -3) && ($i<$data['currentPage'] + 3)){
                        $url = $i;
                        if (isset($data['key']) ){
                            echo $data['key'];
                            $url .= "/".$data['key'];
                        }
                        ?> 
                    <li class="page-item ">
                        <a class="page-link text-dark bg-light shadow" href="/live/menu/SayHi/<?= $url?>"><?=$i?></a>
                    </li>
                <?php }
                } else{ ?>
                    <a class="page-link text-light bg-dark " href="/live/menu/SayHi/<?=$i?>"><?=$i?></a>
                <?php }
        } ?>
        <?php if($data['currentPage'] < ($data['countSP']-1)){ 
            $next = $data['currentPage'];?>
            <li class="page-item ">
                <a class="page-link text-dark bg-light" href="/live/menu/SayHi/<?=$next?>">>></a>
            </li>
        <?php } ?>

        <?php if($data['currentPage'] < ($data['countSP']-2)){ 
            $end = $data['countSP'] ;?>
                <li class="page-item">
                    <a class="page-link text-dark bg-light" href="/live/menu/SayHi/<?= $data['countSP'] ?>">LAST</a>
                </li>
            <?php } ?>
    </ul>
</nav>