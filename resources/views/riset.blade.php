
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login 2</title>

    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="col-md-8 col-md-offset-2 animated fadeInDown" style="box-shadow: 0px 0px 10px #b2bec3; background: red; margin-top: 4rem; ">
        <div class="row" style="background: white;">
            <div class="col-md-7" style="background: red; padding: 0px; border-top: 6px solid #27c34a;">
                <img src="{{ asset('public/css/patterns/login.jpg') }}" alt="Login Pic" width="100%">
            </div>
            <div class="col-md-5" style="border-left: 1px solid #eee;">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="index.html">
                        <div class="col-md-12" style="padding: 0px;">
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="email" placeholder="masukkan nama pengguna" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="email" placeholder="masukkan password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary block full-width m-b">
                                Masuk &nbsp;<i class="fa fa-sign-in"></i>
                            </button>

                            <a href="#">
                                <small>Lupa Password ?</small>
                            </a>
                        </div>
                    </form>

                    <div class="col-md-12" style="margin-top: 40px; background: #2f4050; padding: 10px; border-radius: 5px;">
                        <p class="text-center" style="color: #ecf0f1;">
                            <small>Belum Punya Akoontan ??</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">
                            Buat Akun Sekarang &nbsp; <i class="fa fa-bullhorn"></i>
                        </a>

                        <p class="m-t" style="color: #ecf0f1;">
                            <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="background: white; border-top: 1px solid #ddd">
            <div class="col-md-6" style="padding: 10px 20px; font-size: 9pt;">
                Copyright © <a href="#"> akoontan.id </a> | <small>2019-2020</small>
            </div>
            <div class="col-md-6 text-right" style="padding: 10px 20px; font-size: 9pt;">
               <!-- <small>2019-2020</small> -->
            </div>
        </div>
    </div>

</body>

<script src="{{ asset('public/js/app.js') }}"></script>

</html>
