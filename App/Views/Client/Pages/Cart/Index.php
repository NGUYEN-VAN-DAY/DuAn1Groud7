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
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        

                    </tr>
                </tbody>
            </table>


            <div class="mt-5">
                <div class="d-flex justify-content-between">
                    <form action="/cart/delete-all" method="post">
                        <input type="hidden" name="method" id="" value="DELETE">
                        <button class="btn btn-outline-danger" name="delete-cart" type="submit">Xoá giỏ hàng</button>
                    </form>

                    <?php
                    if ($is_login) :
                    ?>
                        <a href="/checkout" class="btn btn-outline-dark">Thanh toán</a>

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
