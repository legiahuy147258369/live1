

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
<div class="w-100 container">
    <div class="container mt-5 table-reponsive">
            <div class="card-body p-0">
                <div class="d-flex border text-center align-items-center flex-wrap">
                <div class="p-2 fs-5 col-lg-1 d-lg-block d-none"><span class="fs-5 fw-bolder">Hình ảnh</span></div>
                <div class="p-2 fs-5 col-lg-3 col-3 text-center"><span class="fs-5 fw-bolder">Tên</span></div>
                <div class="p-2 fs-5 col-lg-2 col-2 text-center"><span class="fs-5 fw-bolder">Giá</span></div>
                <div class="p-2 fs-5 col-lg-1 col-2 text-center"><span class="fs-5 fw-bolder">Số lượng</span></div>
                <div class="p-2 fs-5 col-lg-3 col-2 text-center"><span class="fs-5 fw-bolder">Tạm tính</span></div>
                <div class="p-2 fs-5 col-lg-2 col-3 text-center"><a href="" class="cart text-decoration-none bg-transparent"><span class="text-dark fw-bolder fs-5"><a class="text-dart nav-link bg-light" href="/live/cart/dellcart">Xóa tất cả</a></span></a>
                </div>
            </div>
            
        <?php if (isset($_SESSION['vohang']) ) { ?>
            <?php
                $tong = 0; 
                $i=0;
                $sumqty= 0;
                foreach ($_SESSION['vohang'] as $kq){ 
                    $tt = $kq[3] * $kq[4];                   
                    $tong += $tt;
            ?>
            <div class="card-body p-0">
                <div class="d-flex border text-center align-items-center">
                <input type="hidden" name="id" value="<?php ($i+1) ?>">
                <div class="p-2 fs-5 col-lg-1 col-1 d-lg-block  d-none"><img class="img-fluid" src="<?= $kq[2] ?>" alt=""></div>
                <div class="p-2 fs-5 col-lg-3 col-3 text-center"><span class="fs-5"><?= $kq[1] ?></span></div>
                <div class="p-2 fs-5 col-lg-2 col-2 text-center"><span class="fs-5"><?= number_format($kq[3]) ?></span></div>
                <div class="p-2 fs-5 col-lg-1 col-2 text-center"><span class="fs-5"><input class="p-1 form-control" type="number" step="1" min="1" value="<?= $kq[4]?>"></span></div>
                <div class="p-2 fs-5 col-lg-3 col-2 text-center"><span class="fs-5"><?= $tt ?></span></div>
                <div class="p-2 fs-5 col-lg-2 col-3 text-center"><a href="/live/cart/dellcart&id=<?=$i?>" class="bg-transparent text-dark"><i class="fa-solid fa-trash"></i></a></a> </div>
                <input type="hidden" name="sum">
            </div>
            <?php $i++;          
            } 
        }else echo "<br> Có tiếp tục <a href='/sanpham'>đặt hàng ko ?</a>";  ?>
        
        <div class="boxTTT container mt-5 w-50 float-end ">
            <h2>Tổng tiền thanh toán</h2>
            <table class="table boxCart w-100">
                <tr>
                    <td class="w-25">Tổng tiền</td>
                    <td class="w-50"><?= $tong ?></td>
                </tr>
                <tr>
                    <td class="w-25">Thanh toán</td>
                    <td class="w-50"><?= $tong ?></td>
                </tr>
            </table>
            <a class="btn btn-dark p-2 cursor-pointer text-light bg-dark nav-link" href="/live/bill">THANH TOÁN ĐƠN HÀNG</a> 
        </div>
    </div>
    <div style="clear:both"></div>
</div>
<br>