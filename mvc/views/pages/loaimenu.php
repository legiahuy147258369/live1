
<div class="container-fluid p-0 bg-menu">
    <div class="container text-center ">
        <div class="row p-3 bgh border-radius">
            <?php
                foreach(loai_select_all() as $row){
            ?>
            <div class="wrap col-2 py-2 fs-5">
            <img class="img-responsive img-width" src="<?=$row["hinh"];?>" alt="">
            <button id="defaultOpen" class="border-0 active-css bg-transparent" onclick="openTab('<?=$row['tabname'];?>')"><?=$row["tenLoai"];?> </button>
            </div>
            <?php
        }
            ?>
        </div>
            <?php 
                foreach(loai_select_all() as $value){
            ?>
                <div id="<?=$value["tabname"];?>" class="food" <?php if($value["maLoai"]>1) echo"style='display:none'" ?>>
                <?php 
                    $maLoai=$value["maLoai"];
                ?>
                    <div class="p-5 row">
                        <?php
                            foreach(hanghoa_select_by_maloai($maLoai) as $value1){
                        ?>
                        <div class="col-lg-4 col-sm-6 p-2">
                            <img class="img-responsive img-lg-width" src="<?=$value1["hinh"];?>" alt="">
                            <p class="fs-4 text-dark text-uppercase h-72"><?=$value1["tenHangHoa"];?></p>
                            <p class="fs-4 text-danger "><?=$value1["donGia"];?>đ</p>
                            <form action="index.php?page=cart" class="my-2" method="post">
                                <input type="hidden" name="hinhSpmua" value="<?=$value1['hinh']?>">
                                <input type="hidden" name="giaSpmua" value="<?=$value1['donGia']?>">
                                <input type="hidden" name="tenSpmua" value="<?=$value1['tenHangHoa']?>">
                                <input type="hidden" name="soLuong" value="1">
                                <input type="submit" name="addcart" class="btn btn-danger px-3 fs-5" value="Đặt hàng"></input>
                            </form>
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>

                    
            <?php
                }
            ?>
                
    
</div>
<script>
    function openTab(foodName) {
    var i;
    var x = document.getElementsByClassName("food");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(foodName).style.display = "block";
    }
    document.getElementById('defaultOpen').click();
</script>