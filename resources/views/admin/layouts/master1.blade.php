<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="{{asset('')}}">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="public/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="public/backend/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="public/backend/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="public/backend/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    	@include('admin.blocks.sidebar');
    	@include('admin.blocks.main-nav');
    </div>
  </nav>

  <div class="content-wrapper">
    <!--container-fluid-->
	@yield('content')
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('admin.blocks.footer')
    <!-- Bootstrap core JavaScript-->
    <script src="public/backend/vendor/jquery/jquery.min.js"></script>
    <script src="public/backend/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="public/backend/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="public/backend/vendor/chart.js/Chart.min.js"></script>
    <script src="public/backend/vendor/datatables/jquery.dataTables.js"></script>
    <script src="public/backend/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="public/backend/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="public/backend/js/sb-admin-charts.min.js"></script>
    <script src="public/backend/js/main.js"></script>
    <script type="text/javascript" language="javascript" src="public/backend/ckeditor/ckeditor.js" ></script>
  </div>
</body>

</html>
