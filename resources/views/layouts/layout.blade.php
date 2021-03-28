@include('layouts.header')
    <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b></span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Payment</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('payment.create') }}"><i class="fa fa-circle-o"></i>Add Payment</a></li>
                  <li><a href="{{ route('payment.index') }}"><i class="fa fa-circle-o"></i>Payment History</a></li>
                  <li><a href="{{ route('monthly.payment') }}"><i class="fa fa-circle-o"></i>Monthly Payment History</a></li>
                  <li><a href="{{ route('yearly.payment') }}"><i class="fa fa-circle-o"></i>Yearly Payment History</a></li>


                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('monthly.report') }}"><i class="fa fa-circle-o"></i>Monthly Report</a></li>
                  <li><a href="{{ route('yearly.report') }}"><i class="fa fa-circle-o"></i>yearly Report</a></li>
                </ul>
              </li>

              <li><a href="{{ route('customer.due') }}"><i class="fa fa-book"></i> <span>Manage Due Amount</span></a></li>

              <li><a href="{{ route('customer.index') }}"><i class="fa fa-book"></i> <span>Manage Customer</span></a></li>

              <li><a href="{{ route('year.index') }}"><i class="fa fa-book"></i> <span>Manage Year</span></a></li>
              <li><a href="{{ route('month.index') }}"><i class="fa fa-book"></i> <span>Manage Month</span></a></li>
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>

       @yield('admin-content')
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.2.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </footer>
      </div><!-- ./wrapper -->
@include('layouts.footer')
