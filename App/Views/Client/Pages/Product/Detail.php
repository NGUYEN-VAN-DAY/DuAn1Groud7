<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>


        <div class="container mt-5 mb-5">

            <div class="row">
                <div class="col-md-8">
                    <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="" width="80%" class="img-padding">
                    <div>
                    </div>
                </div>
                <div class="col-md-4">

                    <h1 class="fs-1"><?= $data['product']['name'] ?></h1>
                    <!-- <h4>trạng thái: <button class="btn btn-success">còn hàng</button></h4> -->
                    <h5>Mô tả: <?= $data['product']['description'] ?></h5>


                    <?php
                    if ($data['product']['discount_price'] > 0) :
                    ?>
                        <h5>Giá gốc: <strike><?= number_format($data['product']['price']) ?> đ</strike></h5>
                        <h5 id="price">Giá giảm: <strong class="text-danger"><?= number_format($data['product']['price'] - $data['product']['discount_price']) ?> đ</strong></h5>

                    <?php
                    else :
                    ?>
                        <h5>Giá tiền: <?= number_format($data['product']['price']) ?> đ</h5>
                    <?php
                    endif;
                    ?>

                    <div class="product-detail">
                        <!-- <h2 class="product-name">Tên sản phẩm</h2> -->
                        <!-- <p class="product-price" id="price">2000,00 VND</p> -->
                        <div class="quantity-control">
                            <button onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" value="1" min="1" onchange="updatePrice()" />
                            <!-- <span id="quantity" onchange="updatePrice()"> 1</span> -->
                            <button onclick="increaseQuantity()">+</button>
                        </div>
                    </div>
                    <script>
                        var basePrice = <?php echo $data['product']['price'] - $data['product']['discount_price'] ?> ; // Giá cơ bản cho 1 sản phẩm
                        console.log(basePrice);
                        
                        function updatePrice() {
                            var quantity = document.getElementById("quantity").value;
                            var price = basePrice * quantity;
                            document.getElementById("price").innerText = price.toLocaleString() + " VND /kg";
                        }

                        function increaseQuantity() {
                            let quantityInput = document.getElementById("quantity");
                            quantityInput.value = parseInt(quantityInput.value) + 1;
                            updatePrice();
                        }

                        function decreaseQuantity() {
                            var quantityInput = document.getElementById("quantity");
                            quantityInput.value = parseInt(quantityInput.value) - 1
                           console.log(quantityInput.value);
                          quantityInput.value=Math.max(1,quantityInput.value);
                           
                            updatePrice();
                        }
                    </script>


                    <form action="#" method="post">
                        <input type="hidden" name="method" id="" value="POST">
                        <input type="hidden" name="id" id="" value="<?= $data['product']['id'] ?>" required>

                        <button type="submit" class="btn btn-sm btn-outline-success mt-3 "> Thêm vào giỏ hàng</button>
                       
                        <button type="submit" class="btn btn-sm btn-outline-success mt-1 "> Mua ngay</button>
                    </form>

                    <br>
                    <div class="border border-danger p-3">
                        <h4>Tiêu chuẩn dịch vụ</h4>
                        <div><img src="https://baobihuuco.com/wp-content/uploads/2019/04/icon-giao-hang-toan-quoc.jpg" alt="" width="10%"> giao hàng nội thành từ 2-4 giờ</div>
                        <div><img src="https://png.pngtree.com/png-vector/20220611/ourlarge/pngtree-gold-star-medal-png-image_4994571.png" width="10%"> Đổi trả trong vòng 48 giờ nếu sản phẩm không đạt chất lượng cam kết</div>
                    </div>
                    <br>
                    <!-- <div class="border border-warning p-3">
                        <h4>Đánh giá sản phẩm ...</h4>

                    </div> -->

                </div>
            </div>
            <hr>
            <!-- ----------------------- -->
            <div class="row">
                <div class="col-md-6">
                    <h3>Lưu ý khi sử dụng</h3>
                    <!-- <hr> -->
                    <span>không sử dụng sản phẩm đã hết hạn</span>
                    <br><br>
                    <span>Nếu bạn có dị ứng với bất kỳ thành phần nào của sản phẩm, hãy ngừng sử dụng và tham khảo ý kiến bác sĩ.</span>
                </div>

                <div class="col-md-12 mt-5">
                    <hr>
                    <h3>Mô tả sản phẩm</h3>
                    <!-- <hr> -->
                    <?= $data['product']['logDescription'] ?>
                </div>
                <br>

            </div>
            <!-- -------------- -->
            <div class="row d-flex justify-content-center mt-100 mb-100">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Bình luận mới nhất</h4>
                        </div>
                        <div class="comment-widgets">
                            <?php
                            if (isset($data) && isset($data['comments']) && $data && $data['comments']) :
                                foreach ($data['comments'] as $item) :
                            ?>
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-4">
                                            <?php
                                            if ($item['avatar']) :
                                            ?>
                                                <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="user" width="50" class="rounded-circle">
                                            <?php
                                            else :
                                            ?>
                                                <img src="<?= APP_URL ?>/public/uploads/users/user1.jpeg" alt="user" width="50" class="rounded-circle">

                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                        <div class="product_review_form">
                                            <h6 class="font-medium"><?= $item['name'] ?> <?= $item['username'] ?></h6>
                                            <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-right"><?= $item['date'] ?></span>
                                                <?php
                                                if (isset($data) && isset($data['is_login']) && $data['is_login'] && ($_SESSION['user']['id'] == $item['user_id'])) :
                                                ?>
                                                    <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>" aria-expanded="false" aria-controls="<?= $item['username'] ?><?= $item['id'] ?>">Sửa</button>

                                                    <form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                                        <input type="hidden" name="method" value="DELETE" id="">
                                                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                    </form>
                                                    <div class="collapse" id="<?= $item['username'] ?><?= $item['id'] ?>">
                                                        <div class="card card-body mt-5">
                                                            <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                <input type="hidden" name="method" value="PUT" id="">
                                                                <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="">
                                                                <div class="form-group">
                                                                    <label for="">Bình luận</label>
                                                                    <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>

                                                <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                            else :
                                ?>
                                <h6 class="text-center text-danger">
                                    Chưa có bình luận
                                </h6>
                            <?php
                            endif;

                            ?>
                            <?php
                            if (isset($data) && isset($data['is_login']) && $data['is_login']) :
                            ?>
                                <div class="d-flex flex-row comment-row">

                                    <div class="p-4">
                                        <?php
                                        if ($_SESSION['user']['avatar']) :
                                        ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['avatar'] ?>" alt="user" width="50" class="rounded-circle">
                                        <?php
                                        else :
                                        ?>
                                            <img src="<?= APP_URL ?>/public/uploads/users/user1.jpeg" alt="user" width="50" class="rounded-circle">

                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?= $_SESSION['user']['name'] ?> <?= $_SESSION['user']['username'] ?></h6>
                                        <form action="/comments" method="post">
                                            <input type="hidden" name="method" value="POST" id="">
                                            <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="product_id">
                                            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>" id="user_id">

                                            <div class="form-group">
                                                <label for="">Bình luận</label>
                                                <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."></textarea>
                                            </div>
                                            <div class="comment-footer">
                                                <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            <?php
                            else :
                            ?>
                                <a href="/login">
                                    <h6 class="text-center text-danger">
                                        Vui lòng đăng nhập để bình luận
                                    </h6>
                                </a>

                            <?php
                            endif;
                            ?>
                        </div>


                    </div>


                </div>
            </div>
        </div>
        </div>



<?php

    }
}
