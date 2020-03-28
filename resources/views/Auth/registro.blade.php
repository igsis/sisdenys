<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SisDENYS | Cadastro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('css/sweetalert2.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Sis</b>DENYS</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Preencha o formulario para concluir seu o cadastro</p>
            <form action="{{ route('registrar.do') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="login" value="{{ $login }}" readonly>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-shield"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome completo">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="telefone" placeholder="Telefone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <select name="unidade" id="unidade" class="form-control mb-3" required>
                    <option value="">Selecione uma unidade</option>
                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}">{{ $unidade->unidade }}</option>
                    @endforeach
                </select>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-auto-replace-svg="nest"></script>
</body>
</html>
