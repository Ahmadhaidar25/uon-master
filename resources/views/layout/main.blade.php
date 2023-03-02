<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ujian Online</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="{{url('template/dist/img/ujian_online.png')}}" rel="icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('template/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('template/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('template/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('template/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="{{url('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('template/plugins/select2/css/select2.min.css')}}">
  <!-- Theme style -->

  <style type="text/css">
    /* The switch - the box around the slider */
    .switch {
     font-size: 17px;
     position: relative;
     display: inline-block;
     width: 62px;
     height: 35px;
   }

/* Hide default HTML checkbox */
.switch input {
 opacity: 1;
 width: 0;
 height: 0;
}

/* The slider */
.slider {
 position: absolute;
 cursor: pointer;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0px;
 background: #fff;
 transition: .4s;
 border-radius: 30px;
 border: 1px solid #ccc;
}

.slider:before {
 position: absolute;
 content: "";
 height: 1.9em;
 width: 1.9em;
 border-radius: 16px;
 left: 1.2px;
 top: 0;
 bottom: 0;
 background-color: white;
 box-shadow: 0 2px 5px #999999;
 transition: .4s;
}

input:checked + .slider {
 background-color: #5fdd54;
 border: 1px solid transparent;
}

input:checked + .slider:before {
 transform: translateX(1.5em);
}


.preloader {

  position: fixed;

  top: 0;

  left: 0;

  width: 100%;

  height: 100%;

  z-index: 9999;

  background-color: #fff;

}

.preloader .loading {

  position: absolute;

  left: 50%;

  top: 50%;

  transform: translate(-50%, -50%);

  font: 14px arial;

}

#showPassword {
  background-color: transparent;
  border: none;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}

#showPassword i {
  font-size: 1.2rem;
  color: #ccc;
}

#showPassword.active i {
  color: #000;
}
</style>
</head>
<body>
  <div class="wrapper">
    <div class="preloader">

      <div class="loading">

        <img src="{{url('template/dist/img/ujian_online.png')}}" alt="" class="img-fluid" style="width: 80px;">
        <div class="text-center mt-2">
          <div class="spinner-border" role="status">
          </div>
        </div>
      </div>
    </div>


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
          </i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

        </li>

      </ul>

      <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('home')}}" class="brand-link">
        <img src="{{url('template/dist/img/ujian_online.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UJIAN ONLINE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            
            @if(auth()->user()->levels=='guru')
            <img src="{{url('avatar/'.auth()->user()->guru->avatar)}}" class="img-circle elevation-2" alt="User Image">
            @elseif(auth()->user()->levels=='siswa')
            <img src="{{url('avatar/'.auth()->user()->siswa->avatar)}}" class="img-circle elevation-2" alt="User Image">
           
            @endif
           

            
           



          </div>
          <div class="info">
            @if(auth()->user()->levels=='guru')
            <a href="{{url('home')}}" class="d-block">{{auth()->user()->guru->nama_guru}}</a>
            @elseif(auth()->user()->levels=='siswa')
            <a href="{{url('home')}}" class="d-block">{{auth()->user()->siswa->nama_siswa}}</a>
            @endif
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item menu-open">
            <a href="{{url('home')}}" class="nav-link">
             <i class="bi bi-house"></i>
             <p>
              Home
              
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if(auth()->user()->levels=='siswa')
            <li class="nav-item">
              <a href="{{url('/pilih/mapel')}}" class="nav-link">
                <i class="bi bi-list-check"></i>
                <p>Pilih Mata Pelajaran</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('/ujian/online')}}" class="nav-link">
               <i class="bi bi-pencil-square"></i>
               <p>Ujian Online</p>
             </a>
           </li>

           <li class="nav-item">
            <a href="{{url('/riwayat/presensi')}}" class="nav-link">
              <i class="bi bi-clock-history"></i>
              <p>Riwayat Presensi</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/riwayat/tugas')}}" class="nav-link">
              <i class="bi bi-clock-history"></i>
              <p>Riwayat Tugas</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('profil')}}" class="nav-link">
              <i class="bi bi-person-fill"></i>
              <p>Profil Anda</p>
            </a>
          </li>
          @elseif(auth()->user()->levels=='guru')
          <li class="nav-item">
            <a href="{{url('/soal/ujian')}}" class="nav-link">
             <i class="bi bi-upload"></i>
             <p>Upload Soal</p>
           </a>
         </li>

         <li class="nav-item">
          <a href="{{url('/hasil/ujian/siswa')}}" class="nav-link">
            <i class="bi bi-people"></i>
            <p>Tugas Siswa</p>
          </a>
        </li>
        @elseif(auth()->user()->levels=='admin')
        <li class="nav-item">
          <a href="{{url('mapel')}}" class="nav-link">
            <i class="bi bi-server"></i>
            <p> Data Mata pelajaran</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{url('pengguna')}}" class="nav-link">
           <i class="bi bi-server"></i>
           <p>Data Pengguna</p>
         </a>
       </li>

       <li class="nav-item">
        <a href="{{url('/data/guru')}}" class="nav-link">
         <i class="bi bi-server"></i>
         <p>Data Guru</p>
       </a>
     </li>

     <li class="nav-item">
      <a href="{{url('/data/siswa')}}" class="nav-link">
       <i class="bi bi-server"></i>
       <p>Data Siswa</p>
     </a>
   </li>

   @endif

   <li class="nav-item">
    <a href="{{url('logout')}}" class="nav-link btn2">
      <i class="bi bi-box-arrow-right"></i>
      <p>Logout</p>
    </a>
  </li>
</ul>
</li>





</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
     @yield('content')
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; Ahmad Haidar  </strong>
  2022
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 0.1
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{url('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('template/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->

<!-- JQVMap -->
<script src="{{url('template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('template/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- daterangepicker -->
<script src="{{url('template/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('template/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('template/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('template/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{url('template/plugins/sweetalert2/sweetalert2.all.js')}}">
</script>



<script src="{{url('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{url('template/plugins/select2/js/select2.min.js')}}"></script>

<!-- AdminLTE App -->
<script>

  $("#mapel").DataTable({
    language: {
      "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
    }
  });

  $("#table-pengguna-guru").DataTable({
    language: {
      "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
    }
  });

  $("#table-pengguna-siswa").DataTable({
    language: {
      "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
    }
  });


  

  $(".btn1").click(function(e){
   e.preventDefault();
   var hapus = $(this).attr('href');
   Swal.fire({
    title: 'Yakin ?',
    text: "Data Akan Dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#00cc00',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya'

  }).then((result) => {
    if (result.isConfirmed) {

      window.location = hapus;
    }
  })
})

  $(".btn2").click(function(e){
   e.preventDefault();
   var logout = $(this).attr('href');
   Swal.fire({
    title: 'Yakin ({{auth()->user()->nama}})',
    text: "Akan keluar dari aplikasi",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#00cc00',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = logout;
    }
  })
})


  $(document).ready(function() {
   $('.mapel').select2({
     theme: 'bootstrap4',
     placeholder: "--pilih--",

   });

   $('#guru').select2({
     theme: 'bootstrap4',

   });


 });

  $('#select-guru').select2({
   theme: 'bootstrap4',
   dropdownParent: $("#modal-guru")
 });

  $('#select-siswa').select2({
   theme: 'bootstrap4',
   dropdownParent: $("#modal-siswa")
 });

  window.onload=function(){
    $('#tgl_lahir').on('change', function() {
      var dob = new Date(this.value);
      var today = new Date();
      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
      $('#umur').val(age);

    });

  }
  const passwordInput = document.getElementById("password");
  const showPasswordButton = document.getElementById("show-password-btn");

  showPasswordButton.addEventListener("click", function () {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";

    } else {
     passwordInput.type = "password";

   }
 });

  const textarea = document.getElementById("myTextarea");
  textarea.focus();
</script>
</body>
@include('sweetalert::alert')
</html>
