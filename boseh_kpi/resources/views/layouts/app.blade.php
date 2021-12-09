<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boseh KPI</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="shortcut icon" type="image/jpg" href="{{asset('public/img/favicon.jpg')}}"/>

    <!-- Styles -->
    <!-- Meta, title, CSS, favicons, etc. -->
  
    <!-- Bootstrap -->
    <link href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{asset('public/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public/build/css/custom.min.css')}}" rel="stylesheet">
	
	
		<script src=" {{ asset('public/js/highcharts.js') }}"></script>
		<script src=" {{ asset('public/js/drilldown.js') }}"></script>
		<script src=" {{ asset('public/js/exporting.js') }}"></script>

</head>
<body  class="nav-md">
   

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('/testcapture')}}" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>
            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
			  
                @if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1' or Auth::user()->role_id == '4')
					<a href="{{url('/testcapture')}}"><h3>HOME</h3></a>
					
				@endif
                <ul class="nav side-menu">
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1')
					<li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{url('dashboard1')}}">Dashboard 1</a></li>
							@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1')
							<li><a href="{{url('dashboard2')}}">Dashboard2</a></li>
							<li><a href="index3.html">Dashboard3</a></li>
							@endif
						</ul>
					</li>
				@endif
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1'or Auth::user()->role_id == '4')
					<li><a href="{{ url('/reportkpi') }}"><i class="fa fa-sticky-note"></i> Reporting KPI</a></li>
					<li><a href="{{url('/absen_harian')}}"><i class="fa fa-file-o"></i> Daftar Absen</a></li>
				@endif
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1' or Auth::user()->role_id == '2')
					<li><a><i class="fa fa-edit"></i> Kinerja <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ url('/absensi') }}">Absensi</a></li>
							<li><a href="{{url('point_karyawan')}}">Point Karyawan</a></li>
							<li><a href="{{url('rekap_absen')}}">Rekap Absensi</a></li>
							<li><a href="{{url('view_input_absensi')}}">Input Absensi</a></li>
						</ul>
					
					</li>
				@endif
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1')
					<li><a><i class="fa fa-edit"></i> Penilian <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ url('/hrd') }}">HRD</a></li>
							<li><a href="{{url('/spv')}}">SPV</a></li>
							<li><a href="{{url('/team_leader')}}">Team Leader</a></li>
							<li><a href="{{url('target')}}">Target KPI</a></li>
						</ul>
					</li>
				@endif
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1')
					<li><a><i class="fa fa-edit"></i> Given Point <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ url('/input_given_point') }}">Input Given Point</a></li>
							<li><a href="{{url('edit_given_point')}}">Edit Given Point</a></li>

						</ul>
					</li>
                @endif
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1' or Auth::user()->role_id == '2')
					<li><a><i class="fa fa-bicycle"></i>Storing Harian <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ url('/view_input_storing') }}">Input storing Harian</a></li>
							<li><a href="{{ url('/rekap_storing') }}">Rekap Data</a></li>
						</ul>
					</li>
				@endif
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1')
					<li><a><i class="fa fa fa-archive"></i> Lainnya <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ url('/data_pegawai') }}">Data Pegawai</a></li>
							<li><a href="{{ url('/hari_kerja') }}"> Input hari kerja</a></li>
							<li><a href="{{ url('/v_hari_kerja') }}">Hari kerja</a></li>
						</ul>
					</li> 
				@endif
				@if (Auth::user()->role_id == '5' or Auth::user()->role_id == '1')
					<li><a><i class="fa fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ url('/register_user') }}">Buat User</a></li>
							<li><a href="{{ url('/view_user') }}">Lihat User</a></li>
						</ul>
					</li>
				@endif
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
              </form>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                          <img src="{{asset('public/production/images/img.jpg')}}" alt="">{{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item"  href="javascript:;"> Profile</a>
							<a class="dropdown-item"  href="{{url('/gantipass')}}">Ganti Password</a>
							<!--a class="dropdown-item"  href="javascript:;">Help</a-->
							<a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </div>
                     </li>
  
					<li role="presentation" class="nav-item dropdown open">
                   
                    </a>
                   </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               <main>

               </main>
              </div>
                @yield('content')

            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('public/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('public/vendors/nprogress/nprogress.js')}}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{asset('public/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('public/build/js/custom.min.js')}}"></script>
    @yield('js')

</body>
</html>
