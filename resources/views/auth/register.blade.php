<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
  <link rel="stylesheet" type="icon" href="{{url('template/dist/img/ujian_online.png')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('template/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
  <div class="register-box">


    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <form action="{{url('/post/register')}}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control {{ $errors->has('nis') ? ' is-invalid' : '' }}" placeholder="Nis/Nip" name="nis">
            @if($errors->has('nis'))
            <span class="invalid-feedback">{{ $errors->first('nis') }}</span>
            @endif
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email">
            @if($errors->has('email'))
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @endif
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>


          <div class="input-group mb-3">
            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="password" name="password">
            @if($errors->has('password'))
            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
            @endif
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
           <select class="form-control {{ $errors->has('levels') ? ' is-invalid' : '' }}" name="levels">
             <option value="" selected>Pilih Levels</option>
             <option value="admin">Admin</option>
             <option value="siswa">Siswa</option>
             <option value="guru">Guru</option>
           </select>
           @if($errors->has('levels'))
           <span class="invalid-feedback">{{ $errors->first('levels') }}</span>
           @endif
           <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <a href="{{url('/')}}" class="text-center">Login Account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{url('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('template/dist/js/adminlte.min.js')}}"></script>
</body>
@include('sweetalert::alert')
</html>
