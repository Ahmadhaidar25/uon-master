<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="{{url('template/dist/css/adminlte.css')}}">
  <script type="text/javascript" src="{{url('template/dist/js/adminlte.js')}}"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <style type="text/css">
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
    .h-custom {
      height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }

    .spinner {
      display: none;
    }
  </style>
</head>
<body>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="{{url('template/gambar/login.png')}}" alt="Login image" class="rounded float-start" style="object-fit: cover; object-position: left; width: 100%;">
        </div>
        <div class="col-sm-5 px-0 d-sm-block">
          <div class="container">
            <div class="card">

              <div class="card-body">
                <form action="{{url('/post/login')}}" method="post" class="form">
                  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">

                  </div>

                  <div class="divider d-flex align-items-center my-4">

                    <h3 class="text-center fw-bold mx-3 mb-0">Login</h3>
                  </div>
                  @if ($message = Session::get('error'))
                  <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong><i class="bi bi-x-circle-fill"></i>&nbsp;{{ $message }}</strong>
                  </div>
                  <script>
                    var audio = new Audio('{{url('sound/error-user.mp3')}}');
                    audio.play();
                  </script>
                  @endif
                  @csrf
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                   <label class="form-label" for="form3Example3">Nis</label>
                   <input type="text" name="nis" class="form-control form-control-lg"
                   placeholder="Nis" />

                 </div>

                 <!-- Password input -->
                 <div class="form-outline mb-3">
                  <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg"
                  placeholder="********" />

                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  <a href="#!" class="text-body">Lupa password?</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2 px-0 d-sm-block">
                  <button type="submit" class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem; float: left;">
                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i></div>
                  <div class="hide-text">Login</div>
                </button><br>
            <!--<p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
              class="link-danger">Register</a></p>-->
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</body>
<script src="{{url('template/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
 (function () {
  $('.form').on('submit', function () {
    $('.button-prevent').attr('disabled', 'true');
    $('.spinner').show();
    $('.hide-text').hide();
  })
})();

</script>
@include('sweetalert::alert')
</html>
