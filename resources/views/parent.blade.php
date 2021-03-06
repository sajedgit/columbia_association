<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Columbia Assosiation </title>

  <!-- Custom fonts for this template-->
  <link href="{{ URL::to('/public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ URL::to('/public/css/sb-admin-2.min.css')  }}" rel="stylesheet">
   <!-- Custom styles for this page -->
  <link href="{{ URL::to('/public/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- For datetime picker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="http://www.jonthornton.com/jquery-timepicker/jquery.timepicker.css">

  <style>

    .sidebar .nav-item .collapse .collapse-inner .collapse-item, .sidebar .nav-item .collapsing .collapse-inner .collapse-item {

      white-space: inherit;
    }
    .tox
    {
      display: none;
    }
  </style>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo url('/'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Columbia Assosiation  </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo url('/home'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Member</span>
        </a>
        <div id="collapseTwo" class="collapse  {{ (request()->is('memberships*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Member:</h6>
            <a class="collapse-item" href="{{ route('memberships.index') }}">View All Members</a>
            <a class="collapse-item" href="{{ route('memberships.create') }}">Add New Member</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Ess Members Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseEss" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Ess Members</span>
        </a>
        <div id="collapseEss" class="collapse {{ (request()->is('ess_members*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ess Members:</h6>
            <a class="collapse-item" href="{{ route('ess_members.index') }}">View All Ess Members</a>
            <a class="collapse-item" href="{{ route('ess_members.create') }}">Add New Ess Members</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Events</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ (request()->is('events*')) ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Events:</h6>
            <a class="collapse-item" href="{{ route('events.index') }}">View All Events</a>
            <a class="collapse-item" href="{{ route('events.create') }}">Add New Events</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-memory"></i>
          <span>Memories</span>
        </a>
        <div id="collapsePages" class="collapse {{ (request()->is('memories*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Memories:</h6>
            <a class="collapse-item" href="{{ route('memories.index') }}">View All Memories</a>
            <a class="collapse-item" href="{{ route('memories.create') }}">Add New Memories</a>
            <a class="collapse-item" href="{{ route('memories_photos.create') }}">Add Photo For Memories</a>
          </div>
        </div>
      </li>



      <!-- Nav Item - Board Members Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Board Members</span>
        </a>
        <div id="collapsePages2" class="collapse {{ (request()->is('board_members*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Board Members:</h6>
            <a class="collapse-item" href="{{ route('board_members.index') }}">View All Board Members</a>
            <a class="collapse-item" href="{{ route('board_members.create') }}">Add New Board Members</a>
            <h6 class="collapse-header">Board Members Category:</h6>
            <a class="collapse-item" href="{{ route('board_members_categories.index') }}"> All Board Members Category</a>
            <a class="collapse-item" href="{{ route('board_members_categories.create') }}">Add Board Members Category</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages_msg" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Messages</span>
        </a>
        <div id="collapsePages_msg" class="collapse {{ (request()->is('messages*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Messages:</h6>
            <a class="collapse-item" href="{{ route('messages.index') }}">View All  Messages</a>
            <a class="collapse-item" href="{{ route('messages.create') }}">Add New  Messages</a>
          </div>
        </div>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages_sponsor" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Sponsor</span>
        </a>
        <div id="collapsePages_sponsor" class="collapse {{ (request()->is('sponsors*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Messages:</h6>
            <a class="collapse-item" href="{{ route('sponsors.index') }}">View All  Sponsor</a>
            <a class="collapse-item" href="{{ route('sponsors.create') }}">Add New  Sponsor</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages_product" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Shop</span>
        </a>
        <div id="collapsePages_product" class="collapse {{ (request()->is('products*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products:</h6>
            <a class="collapse-item" href="{{ route('products.index') }}">View All  Products</a>
            <a class="collapse-item" href="{{ route('products.create') }}">Add New  Product</a>
          </div>
        </div>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages_vote" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Vote</span>
        </a>
        <div id="collapsePages_vote" class="collapse {{ (request()->is('votes*')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Vote:</h6>
            <a class="collapse-item" href="{{ route('votes.index') }}">View All  Vote</a>
            <a class="collapse-item" href="{{ route('votes.create') }}">Add New  Vote</a>
            <h6 class="collapse-header">Vote Position:</h6>
            <a class="collapse-item" href="{{ route('votes_position.index') }}">View All  Position</a>
            <a class="collapse-item" href="{{ route('votes_position.create') }}">Add New  Position</a>
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>




            <!-- Nav Item - User Information -->
			 @guest
			  <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			  </li>
				@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
				@endif


			 @else

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('img/user_blank.png') }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
			@endguest



          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @yield('main')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >Logout</a>

		   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ URL::to('/public/vendor/jquery/jquery.min.js')  }}"></script>
  <script src="{{ URL::to('/public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ URL::to('/public/vendor/jquery-easing/jquery.easing.min.js')  }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ URL::to('/public/js/sb-admin-2.min.js')   }}"></script>

   <!-- Page level plugins -->
  <script src="{{ URL::to('/public/vendor/datatables/jquery.dataTables.min.js')  }}"></script>
  <script src="{{ URL::to('/public/vendor/datatables/dataTables.bootstrap4.min.js')  }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ URL::to('/public/js/demo/datatables-demo.js') }}"></script>

  <!-- For datetime picker-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="http://www.jonthornton.com/jquery-timepicker/jquery.timepicker.js"></script>

  <script>
      $( function() {
          $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
          $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
          $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
          $( "#datepicker4" ).datepicker({ dateFormat: 'yy-mm-dd' });

          $('#basicExample').timepicker({ 'timeFormat': 'H:i:s' });
          $('#timepicker1').timepicker({ 'timeFormat': 'H:i:s' });
          $('#timepicker2').timepicker({ 'timeFormat': 'H:i:s' });
          $('#timepicker3').timepicker({ 'timeFormat': 'H:i:s' });
          $('#timepicker4').timepicker({ 'timeFormat': 'H:i:s' });
      } );

  </script>


@stack('scripts')




</body>

</html>
