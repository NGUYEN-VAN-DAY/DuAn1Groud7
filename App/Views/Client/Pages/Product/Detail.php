<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use Dotenv\Parser\Value;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        <style>
            p.card-text {
                white-space: nowrap;
                /* Ngăn chữ xuống dòng */
                overflow: hidden;
                /* Ẩn nội dung tràn */
                text-overflow: ellipsis;
                /* Hiển thị dấu 3 chấm */
                max-width: 500px;
                /* Đặt chiều rộng tối đa cho cột */
            }
        </style>
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
                    <p>Mô tả: <?= $data['product']['description'] ?></p>


                    <?php
                    if ($data['product']['discount_price'] > 0) :
                    ?>
                        <p>Giá gốc: <strike><?= number_format($data['product']['price']) ?> đ</strike></p>
                        <p id="price">Giá giảm: <strong class="text-danger"><?= number_format($data['product']['price'] - $data['product']['discount_price']) ?> đ</strong></p>

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
                        <!-- <form method="post"> -->
                        <!-- <input type="hidden" value="POST"> -->
                        <div class="quantity-control">
                            <button onclick="decreaseQuantity()" id="btn-">-</button>
                            <input type="text" id="quantity" value="1" min="1" onchange="updatePrice()" />
                            <!-- <span id="quantity" onchange="updatePrice()"> 1</span> -->
                            <button onclick="increaseQuantity()" id="btn">+</button>
                        </div>
                        <!-- </form> -->

                    </div>


                    <!-- <h1><?php echo ($_SESSION['quantity']['day']) ?></h1> -->

                    <form action="/cart/add" method="post">
                        <input type="hidden" name="method" value="POST">
                        <!-- <input type="text" name="quantity" id="quantityy" value="1" min="1" onchange="updatePrice()" /> -->


                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                        <input type="hidden" name="image" value="<?= $data['product']['image'] ?>">
                        <input type="hidden" name="name" value="<?= $data['product']['name'] ?>">
                        <input type="hidden" name="price" value="<?= $data['product']['price'] ?>">
                        <!-- <input type="hidden" name="price" value="<?= $data['product']['quantity'] ?>"> -->
                        <button type="submit" class="btn tbn-sm btn-success mt-3"></i>Thêm vào giỏ hàng</button>
                        <a class="btn tbn-sm btn-success mt-3 " href="/pay">Mua Ngay</a>
                    </form>


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
                            quantityInput.value = Math.max(1, quantityInput.value);

                            updatePrice();
                        }
                    </script>


                    
                    <form action="/cart/add" method="post">
                        <input type="hidden" name="method" value="POST">
                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                        <input type="hidden" name="image" value="<?= $data['product']['image'] ?>">
                        <input type="hidden" name="name" value="<?= $data['product']['name'] ?>">
                        <input type="hidden" name="price" value="<?= $data['product']['price'] ?>">
                        <!-- <input type="hidden" name="price" value="<?= $data['product']['quantity'] ?>"> -->
                        <button type="submit" class="btn tbn-sm btn-success mt-3"></i>Thêm vào giỏ hàng</button>
                        <a class="btn tbn-sm btn-success mt-3 " href="/pay">Mua Ngay</a>
                    </form>
                    



                    <br>
                    <div class="border border-danger p-3">
                        <h5>Tiêu chuẩn dịch vụ</h5>
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

                <div class="container mt-5">
                    <div class="text mb-4">
                        <h2 class="text-danger">Lưu ý khi sử dụng</h2>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <strong>Kiểm tra hạn sử dụng:</strong> Tuyệt đối không sử dụng sản phẩm đã hết hạn để đảm bảo an toàn cho sức khỏe. Nên kiểm tra kỹ thông tin hạn sử dụng trên bao bì trước khi dùng.
                        </li>
                        <li class="mb-3">
                            <strong>Phản ứng dị ứng:</strong> Nếu bạn có bất kỳ dấu hiệu dị ứng nào như mẩn ngứa, đỏ da, khó thở, hãy ngừng sử dụng sản phẩm ngay lập tức. Tham khảo ý kiến bác sĩ nếu cần thiết.
                        </li>
                        <li class="mb-3">
                            <strong>Bảo quản sản phẩm đúng cách:</strong> Lưu trữ sản phẩm ở nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và nhiệt độ cao. Đậy kín nắp sau khi sử dụng.
                        </li>
                        <li class="mb-3">
                            <strong>Hướng dẫn sử dụng:</strong> Sử dụng sản phẩm đúng mục đích, không lạm dụng hoặc sử dụng quá liều lượng khuyến nghị. Đọc kỹ hướng dẫn sử dụng kèm theo trước khi dùng.
                        </li>
                        <li class="mb-3">
                            <strong>Đối tượng sử dụng:</strong> Tránh xa tầm tay trẻ em nếu sản phẩm không phù hợp với trẻ nhỏ. Nếu bạn đang mang thai, cho con bú hoặc có vấn đề sức khỏe đặc biệt, nên tham khảo ý kiến bác sĩ trước khi sử dụng.
                        </li>
                        <li class="mb-3">
                            <strong>Lưu ý khác:</strong> Nếu sản phẩm có dấu hiệu biến đổi màu sắc, mùi vị hoặc kết cấu bất thường, không nên tiếp tục sử dụng.
                        </li>
                    </ul>
                </div>

                    <div class="col-md-12 mt-5">
                        <hr>
                        <h3>Mô tả sản phẩm</h3>
                        <!-- <hr> -->
                        <?= $data['product']['long_description'] ?>
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

                                                    <form action="/comments/<?= $item['id'] ?>" method="post"
                                                        onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                                        <input type="hidden" name="method" value="DELETE" id="">
                                                        <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                    </form>
                                                </div>
                                                
                                            <?php endif; ?>
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
                        if (isset($data) && isset($data['is_login']) && $data['is_login']):
                            ?>
                            <div class="d-flex flex-row comment-row">

                                <div class="p-4">
                                    <?php
                                    if ($_SESSION['user']['avatar']):
                                        ?>
                                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['avatar'] ?>" alt="user"
                                            width="50" class="rounded-circle">
                                        <?php
                                    else:
                                        ?>
                                        <img src="<?= APP_URL ?>/public/uploads/users/user1.jpeg" alt="user" width="50"
                                            class="rounded-circle">

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
                                            <textarea class="form-control rounded-0" name="content" id="" rows="3"
                                                placeholder="Nhập bình luận..."></textarea>
                                        </div>
                                        <div class="comment-footer">
                                            <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <?php
                        else:
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
