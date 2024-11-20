<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-edit"></i> Place Name <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('admin.add.place') }}">Add place</a></li>
            <li><a href="{{ route('admin.all.place') }}">All place</a></li>
          </ul>
        </li>   
        <li><a><i class="fa fa-home"></i> Carosel <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('admin.add.carosel') }}">Add Carosel</a></li>
            <li><a href="{{ route('admin.all.carosel') }}">All Carosel</a></li>
          </ul>
        </li>
                
      </ul>
    </div>

  </div>