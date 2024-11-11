<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h3 class="text-center text-danger">Đặt lại mật khẩu</h3>
                        <form action="/reset-password" method="post">
                            <input type="hidden" name="method" value="PUT">
                            <div class="form-group">
                                <label for="password">Mật Khẩu*</label>
                                <input type="password" class="form-control" id="password" onclick="eyepassword()" placeholder="Nhập mật khẩu.........." name="password">
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật Khẩu*</label>
                                <input type="password" class="form-control" id="re_password" onclick="re_eyepassword()" placeholder="Nhập lại mật khẩu.........." name="re_password">
                            </div>
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Đặt lại mật khẩu</button>
                            <br>


                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
