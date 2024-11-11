<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h3 class="text-center  text-muted" style="font-weight:bold; font-size:40px;">Đăng ký</h3>
                        <form action="/register" method="post">
                            <input type="hidden" name="method" value="POST">

                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập.........." name="username">
                            </div>
                            <div class="form-group mt-4">
                                <label for="password">Mật Khẩu*</label>
                                <input type="password" class="form-control" id="password" onclick="eyepassword()" placeholder="Nhập mật khẩu.........." name="password">
                            </div>
                            <div class="form-group mt-4">
                                <label for="re_password">nhập lại mật khẩu*</label>
                                <input type="password" class="form-control" id="re_password" onclick="re_eyepassword()" placeholder="Nhập lại mật khẩu.........." name="re_password">
                            </div>
                            <div class="form-group mt-4">
                                <label for="email">Email*</label>
                                <input type="text" class="form-control" id="email" placeholder="Nhập email.........." name="email">
                            </div>
                            <div class="form-group mt-4">
                                <label for="name">Họ và tên*</label>
                                <input type="text" class="form-control" id="name" placeholder="Họ và tên.........." name="name">
                            </div>
                            <button type="reset" class="btn btn-outline-danger">nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">đăng ký</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
