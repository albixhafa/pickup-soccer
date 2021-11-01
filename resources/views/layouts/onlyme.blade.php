<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Welcome : {{Auth::user()->username}}</title>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('libsback/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('libsback/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('libsback/css/sb-admin.css')}}" rel="stylesheet">
</head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="/onlyme/users">Welcome : {{Auth::user()->username}}</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('posts.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Posts</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('users.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Users</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('status.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Status</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('roles.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Roles</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('formats.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Formats</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('genders.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Genders</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('teamgenders.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Team Genders</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('sizes.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Team Sizes</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{route('teams.index')}}">
              <i class="fa fa-fw fa-tags"></i>
              <span class="nav-link-text">Number of Teams</span>
            </a>
          </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
              <a class="nav-link" href="/logout">
                <i class="fa fa-fw fa-sign-out"></i>
              <span class="nav-link-text">Logout</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @yield('content')
          </div>
        </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>Copyright © DealTapper 2017</small>
          </div>
        </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="{{asset('libsback/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('libsback/vendor/popper/popper.min.js')}}"></script>
      <script src="{{asset('libsback/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{asset('libsback/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('libsback/js/sb-admin.min.js')}}"></script>
      <script>
        document.getElementById("stat").onchange = function() {
          if (this.selectedIndex!==0) {
            window.location.href = this.value;
          }        
        };
      </script>
    @yield('footer')
    </div>
</body>
</html>
