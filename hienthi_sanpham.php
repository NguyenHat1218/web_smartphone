<!-- <link rel="stylesheet" href="csseshop/main.css"> -->
<?php
$result = mysqli_query($conn, "SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE a.sp_ma = b.sp_ma LIMIT 0,1) as sp_hinhdaidien FROM sanpham a");
$count = 0; // Biến đếm số hình đã load
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    if ($count % 3 == 0) {
        echo '<div class="row">'; // Mở một hàng mới sau mỗi 3 hình
    }
    ?>
    <div class="col-md-4">
        <div class="single-product">
            <div class="product-f-image">
                <img src="product-imgs/<?php echo $row['sp_hinhdaidien']?>" class="product-image" title="product-imgs">
                <div class="product-hover">
                    <a href="?func=dathang&ma=<?php echo $row['sp_ma']?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    <a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>" class="view-details-link"><i class="fa fa-link"></i>See details</a>
                </div>
            </div>
            <h2><a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>"><?php echo $row['sp_ten']?></a></h2>
            <div class="product-carousel-price">
                <ins><?php echo $row['sp_gia']?></ins><del><?php echo $row['sp_giacu']?></del>
            </div>
        </div>
    </div>
    <?php
    $count++;
    if ($count % 3 == 0) {
        echo '</div>'; // Đóng hàng sau mỗi 3 hình
    }
}
if ($count % 3 != 0) {
    echo '</div>'; // Đóng hàng nếu số lượng hình không chia hết cho 3
}
?>
<!-- .product-image {
    width: 100%; /* Quy định kích thước cho hình ảnh */
    height: auto; /* Đảm bảo tỷ lệ khung hình được giữ nguyên */
    object-fit: cover; /* Đảm bảo hình ảnh được căn chỉnh và không bị vặn hoặc bóp méo */
} -->
