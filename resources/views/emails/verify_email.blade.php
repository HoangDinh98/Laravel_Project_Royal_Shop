<!DOCTYPE html>

<html>

    <head>

        <title>Royal Shop Mail</title>

    </head>

    <body>

        <h3>Mail từ <a href="{{ env('APP_URL') }}">Royal Shop</a></h3>

        <p>
            Xin chào, <b>{{ $user->name }}</b>! <br>
            Bạn đã đăng ký tài khoản thành công!<br>
            <a href="{{ env('APP_URL').'user/verifyemail/'.$user->confirm_code }}">Vui lòng nhấn vào đây để xác nhận Email của bạn</a
            <br>
            <br>
            Nếu bạn không chủ động đăng ký tài khoản, xin vui lòng bỏ qua email này
            <br>
            <br>
            Trân trọng<br>
            <span style="color: #c70000">Royal Shop</span>
        </p>

    </body>

</html>