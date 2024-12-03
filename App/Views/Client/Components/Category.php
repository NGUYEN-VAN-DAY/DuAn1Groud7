<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="col-md-11">
            <form action="/products/seach" method="get" >
                <input type="hidden" name="method" value="GET">

                <div class="input-group w-100 mx-auto d-flex mb-3">
                    <input type="search" class="form-control " name="query" id="query" placeholder="TÌM KIẾM" aria-describedby="search-icon-1" onchange="this.form.submit()">
                    <span id="search-icon-1" class="input-group-text p-2"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Search_Icon.svg/20px-Search_Icon.svg.png" alt=""></span>
                </div>
            </form>
            <table class="table table-bordered table-striped " id="table">
                <tr>
                    <td>
                        <h5 class="text-center text-danger">Danh mục</h5>
                    </td>
                </tr>
                <tr>
                    <td class="table-light"><a class="nav-link active" href="/products">Tất cả</a> </td>

                </tr>

                <?php
                foreach ($data as $item) :
                ?>
                    <tr>
                        <td class="table-light"><a class="nav-link" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a></td>
                    </tr> <?php
                        endforeach;
                            ?>




            </table>

            <!-- <nav class="nav flex-column border-right">
            <a class="nav-link active" href="/products">Tất cả</a>
            <?php
            foreach ($data as $item) :
            ?>
                <a class="nav-link" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a>
            <?php
            endforeach;
            ?>
        </nav> -->
        
            <h4 class="mb-2">Lọc giá</h4>
            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="100000" value="0" oninput="amount.value=rangeInput.value">
            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>


            <h4>Additional</h4>
            <div class="mb-2">
                <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
                <label for="Categories-1"> Organic</label>
            </div>
            <div class="mb-2">
                <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
                <label for="Categories-2"> Fresh</label>
            </div>
            <div class="mb-2">
                <input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages">
                <label for="Categories-3"> Sales</label>
            </div>
            <div class="mb-2">
                <input type="radio" class="me-2" id="Categories-4" name="Categories-1" value="Beverages">
                <label for="Categories-4"> Discount</label>
            </div>
            <div class="mb-2">
                <input type="radio" class="me-2" id="Categories-5" name="Categories-1" value="Beverages">
                <label for="Categories-5"> Expired</label>
            </div>
            <h4 class="mb-3">Featured products</h4>
            <div class="d-flex align-items-center justify-content-start">
                <div class="rounded me-4" style="width: 100px; height: 100px;">
                    <img src="/public/uploads/products/20241110211155.jpg" class="img-fluid rounded" alt="">
                </div>
                <div>
                    <h6 class="mb-2">Big Banana</h6>
                    <div class="d-flex mb-2">
                        <img src="https://png.pngtree.com/png-clipart/20190614/original/pngtree-star-vector-icon-png-image_3725282.jpg" width="20px" alt="">
                        <img src="https://png.pngtree.com/png-clipart/20190614/original/pngtree-star-vector-icon-png-image_3725282.jpg" width="20px" alt="">
                        <img src="https://png.pngtree.com/png-clipart/20190614/original/pngtree-star-vector-icon-png-image_3725282.jpg" width="20px" alt="">
                        <img src="https://png.pngtree.com/png-clipart/20190614/original/pngtree-star-vector-icon-png-image_3725282.jpg" width="20px" alt="">
                        <img src="https://png.pngtree.com/png-clipart/20190614/original/pngtree-star-vector-icon-png-image_3725282.jpg" width="20px" alt="">
                    </div>
                    <div class="d-flex mb-2">
                        <h5 class="fw-bold me-2">2.99 $</h5>
                        <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
