
<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a>
            </li>
            <li><a href="{{ route('admin.order.index') }}"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Order</span></a></li>   
            <li>
                <a href="{{ route('admin.category.index') }}"><i class="icon-envelope"></i><span class="hidden-tablet"> All Categories</span></a>
            </li>
            <li>
                <a href="{{ route('admin.category.create') }}"><i class="icon-tasks"></i><span class="hidden-tablet"> Add Categories</span></a>
            </li>
            <li>
                <a href="{{ route('admin.manufacture.index') }}"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Brands</span></a>
            </li>
            <li>
                <a href="{{ route('admin.manufacture.create') }}"><i class="icon-dashboard"></i><span class="hidden-tablet"> Add Brands</span></a>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products</span><span class="label label-important"> new </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('admin.product.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Products</span></a></li>
                    <li><a class="submenu" href="{{ route('admin.product.create') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Products</span></a></li>
                </ul>   
            </li>
            
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Sliders </span><span class="label label-important"> new </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('admin.slider.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Sliders</span></a></li>
                    <li><a class="submenu" href="{{ route('admin.slider.create') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Sliders</span></a></li>
                </ul>   
            </li>

          
          
            
           
        </ul>
    </div>
</div>