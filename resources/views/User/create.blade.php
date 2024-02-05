<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <!-- Masukkan di dalam tag <head> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      
      <!-- Notifications Dropdown Menu -->
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">RSIA Puri Bunda</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/welcome" class="nav-link active">
              <p>
                Dashboard
              </p>
            </a>
            <a href="/user" class="nav-link active">
              <p>
                Karyawan
              </p>
            </a>
            <a href="/unit" class="nav-link active">
              <p>
                Unit
              </p>
            </a>
            <a href="/jabatan" class="nav-link active">
              <p>
                Jabatan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <!-- /.card -->
            <div class="card-header">
                <h3>Create Data Karyawan</h3>
            </div>

            <div class="card">
              <form action="{{ route('user.store') }}" method="post">
              @csrf
                <div class="form-group">
                  <input type="text" class="mx-4 my-4 border-light" name="nama" placeholder="Input nama">
                </div>
                <div class="form-group">
                  <input type="text" class="mx-4 my-4 border-light" name="username" placeholder="Input username">
                </div>
                <div class="form-group">
                  <input type="text" class="mx-4 my-4 border-light" name="password" placeholder="Input password">
                </div>
                <div class="form-group">
                  <select class="mx-4 my-4 border-light select2" name="unit_id" id="unitDropdown" placeholder="Input unit">
                    <option value="1">Unit A</option>
                    <option value="2">Unit B</option>
                    <option value="3">Unit C</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="mx-4 my-4 border-light select2" name="jabatan" id="unitDropdown" placeholder="Input jabatan">
                      <!-- Options akan diisi menggunakan data dari tabel unit -->
                      <option value="1">Manager</option>
                      <option value="2">Programmer</option>
                      <option value="3">Designer</option>
                   </select>
                </div>
                <div class="form-group">
                  <input type="text" class="mx-4 my-4 border-light" name="tanggal_bergabung" placeholder="Input tanggal bergabung">
                </div>
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-sm btn-info float-left">Add</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script>
   $(document).ready(function () {
    $('#unitDropdown').select2({
         placeholder: 'Pilih unit',
         allowClear: true,
         minimumInputLength: 1,
         ajax: {
            url: 'http://127.0.0.1:8000/unit',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
               return {

                  results: $.map(data, function (item) {
                     return {
                        id: item.id,
                        text: item.nama
                     };
                  })
               };
            },
            cache: true
         }
      });

      $('#jabatanDropdown').select2({
         placeholder: 'Pilih unit',
         allowClear: true,
         minimumInputLength: 1,
         ajax: {
            url: 'http://127.0.0.1:8000/jabatan',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
               return {
                  results: $.map(data, function (item) {
                     return {
                        id: item.id,
                        text: item.nama
                     };
                  })
               };
            },
            cache: true
         }
      });
   });
</script>

<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/dist/js/pages/dashboard3.js') }}"></script>
</body>
</html>
