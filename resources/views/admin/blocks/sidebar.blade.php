
<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item mt-3" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link h5" href="{{route('index')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link h5" href="{{route('theloai.index')}}">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Quản lý Thể loại</span>
          </a>
        </li>
        <li class="nav-item text-light" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link h5" href="{{route('tintuc.index')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Quản lý Tin tức</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link h5" href="{{route('user.index')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Quản lý Thành Viên</span>
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