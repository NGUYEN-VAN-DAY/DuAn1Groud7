<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <form action="/login" method="post">
                            <input type="hidden" name="method" value="POST">
                            <h1 class="text-center text-muted mt-4 " style="font-weight:bold ;font-size:40px;">Đăng nhập</h1>

                            <div class="form-group mt-4">
                                <label class="tdnx" for="username">Tên đăng nhập*</label>
                                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập......" name="username" required>
                            </div>
                            <div class="form-group mt-4">
                                <div class="group">
                                    <label for="password">Mật Khẩu*</label>
                                    <input type="password" class="form-control " id="password" onclick="eyepassword()" placeholder="Nhập mật khẩu......" name="password">
                                </div>
                            </div>
                            <div class="form-check mt-4">
                                <label class="form-check-label" for="remember"></label>
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" check>
                                ghi nhớ đăng nhập
                                </label>
                            </div>
                            <button type="reset" class="btn btn-outline-danger mt-4">nhập lại</button>
                            <button type="submit" class="btn btn-outline-info mt-4">đăng nhập</button>
                            <br>
                            Bạn chưa có tài khoản?<a href="/register">Đăng ký</a><br>
                            <a href="/forgot-password" class="text-danger">Quên Mật Khẩu</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
