<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
      <li class="active"><a href="{{ url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categoies</span> <span class="label label-important">2</span></a>
        <ul>
          <li><a href="{{ url('/admin/add-category')}}">Add Category</a></li>
          {{-- <li><a href="{{ url('/admin/edit-categories')}}">Edit Categories</a></li> --}}
          <li><a href="{{ url('/admin/view-categories')}}">View Categories</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
        <ul>
          <li><a href="{{ url('/admin/add-product')}}">Add Products</a></li>
          {{-- <li><a href="{{ url('/admin/edit-categories')}}">Edit Categories</a></li> --}}
          <li><a href="{{ url('/admin/view-products')}}">View Products</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Settings</span> <span class="label label-important">1</span></a>
        <ul>
          <li><a href="{{ url('/admin/settings')}}">Settings</a></li>
          {{-- <li><a href="{{ url('/admin/edit-categories')}}">Edit Categories</a></li> --}}
          {{-- <li><a href="{{ url('/admin/view-products')}}">View Products</a></li> --}}
        </ul>
      </li>

    </ul>
  </div>
  <!--sidebar-menu-->