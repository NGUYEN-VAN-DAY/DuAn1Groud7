<?php

namespace App\Views\Client\Pages\Cart;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {

        $is_login = AuthHelper::checkLogin();


?>


        <div class="container mt-5 mb-5">
            <h1 class="text-center">Giỏ hàng</h1>


            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tống tiền</th>
                                <th scope="col">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $item) {
                                    $total += $item['price'] * $item['quantity'];
                            ?>
                                    <tr>
                                        <th scope="row"><?= $key ?></th>
                                        <td><img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" alt="" style="width: 100px; height: 100px;"></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><?= number_format($item['price']) ?></td>
                                        <td><?= number_format($item['price'] * $item['quantity']) ?></td>
                                        <td>
                                            <a href="/cart/remove/<?= $item['product_id'] ?>" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="6" scope="col">Tổng tiền</td>
                                <td><?= number_format($total) ?> Vnd</td>
                                
                            </tr>
                        </tbody>


            </table>


            <div class="mt-5">
                <div class="d-flex justify-content-between">
                    <form action="/cart/delete-all" method="post">
                        <input type="hidden" name="method" id="" value="DELETE">

                    </form>

                    <?php
                    if ($is_login) :
                    ?>
                        <a href="/pay" class="btn btn-outline-dark">Thanh toán</a>

                    <?php
                    else :
                    ?>
                    <a href="/login">
                        <h4 class="text-center text-danger">
                            <button type="button" class="btn btn-outline-dark"> Vui lòng đăng nhập để thanh toán</button>

                        </h4>
                        </a>
                    <?php
                    endif;
                    ?>


                </div>


            </div>

        </div>





<?php

    }
}
