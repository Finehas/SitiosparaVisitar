<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="token" id="token" value="{{ csrf_token() }}">
   <script type="text/javascript" src="js/vue.js"></script>
  <script type="text/javascript" src="js/vue-resource.js"></script>

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
              <div class="col-lg-6 d-none d-lg-block bg-login-image"><img src="img/login.jpg" width="470px" height="450px"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                  </div>
                  <form class="user" method="GET" action="{{url('validar')}}">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Ingresa tu email" name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Contraseña" name="password">
                    </div>
                      <input type="submit" value="Ingresar" class="btn btn-primary btn-user btn-block">
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{url('registro')}}">Registrate</a>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<input type="hidden" name="route" value="{{url('/')}}">