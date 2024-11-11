<?php
// sản phẩm theo loại

namespace App\Views\Client\Pages\Product;


use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;


class Category extends BaseView
{
    public static function render($data = null)
    {

?>
        <section class="shop_section layout_padding">

            <div class="row">
                <div class="col-md-3">
                    <?php
                    ComponentsCategory::render($data['categories']);
                    ?>
                </div>
                <div class="col-md-9">
                    <?php
                    if (isset($data) && isset($data['products']) && $data && $data['products']) :
                    ?>
                        <h1 class="container"><?= $data['products'][0]['category_name'] ?></h1>

                        <div class="row">
                            <?php
                            foreach ($data['products'] as $item) :
                            ?>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="box">
                                        <a href="/products/<?= $item['id'] ?>" class="">
                                            <div class="card mb-4 shadow-sm">
                                                <img class="img-index" src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="card-img-top" alt="" style="width: 100%; display: block;" data-holder-rendered="true">
                                            </div>
                                            <div class="">
                                                <h6>
                                                    <p class="card-text"><?= $item['name'] ?></p>
                                                </h6>
                                                <h6>
                                                    <?php
                                                    if ($item['discount_price'] > 0) :
                                                    ?>
                                                        <p>Giá gốc: <strike><?= number_format($item['price']) ?> đ</strike></p>
                                                        <p>Giảm giá: <strong class="text-danger"><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <p>Giá tiền: <?= number_format($item['price']) ?> đ</p>

                                                    <?php
                                                    endif;
                                                    ?>
                                                </h6>
                                            </div>
                                            <div class="new">
                                                <span>
                                                    <?= ($item['is_feature'] == 1) ? 'Mới' : (($item['is_feature'] == 2) ? 'Hot' : '') ?>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            <?php
                            endforeach;
                            ?>
                        </div>
                    <?php
                    else :
                    ?>
                        <h3 class="text-center text-danger">Không có sản phẩm</h3>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            </div>
        </section>
<?php

    }
}
