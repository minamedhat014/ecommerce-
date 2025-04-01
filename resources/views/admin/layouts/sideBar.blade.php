<aside class="main-sidebar sidebar-light-light  elevation-4 custom-theme col-lg-3" >
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 ml-3 pb-1 mb-3 d-flex" >
        <img src="{{Auth::user()->getFirstMediaUrl('profile')}}" alt="" class="profile" > 
        <div class="info mt-2">
          <a style=" color:rgb(0, 0, 100)"> {{ucfirst(Auth::user()->name)}} </a> 
        
        </div>
      </div>
     

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     
               @can('view system settings')
          <li class="nav-item has-treeview menu-close">
            <a href="" class="nav-link active">
              <i class="fa-solid fa-gears"></i>
              <p>
                  General Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
            <ul class="nav nav-treeview">
              
          <li>
      
              <a href="{{route('systemActivity.index')}}" class="nav-link">
                <i class="fa-solid fa-laptop-file"></i>
                <p> System Activity Log </p>
              </a>
         
            </li>

            <li>
            
                <a href="{{route('dropdown.index')}}" class="nav-link">
                  <i class="fa-solid fa-circle-chevron-down"></i>
                  <p> dropdown lists</p>
                </a>
              
              </li>

              <li>
              
                  <a href="{{route('siteInfo.index')}}" class="nav-link">
                    <i class="fa-solid fa-globe"></i>
                    <p> Site info </p>
                  </a>
                
                </li>

                <li>
                    <a href="{{route('socialLinks.index')}}" class="nav-link">
                      <i class="fa-solid fa-share-nodes"></i>
                      <p> Social links </p>
                    </a>      
                  </li>

                  <li>
                      <a href="{{route('bannerImages.index')}}" class="nav-link">
                        <i class="fa-solid fa-image"></i>
                        <p> Banner images</p>
                      </a>
                    </li>

                    <li>
                      <a href="{{route('pageLinks.index')}}" class="nav-link">
                        <i class="fa-solid fa-share"></i>
                        <p>manage page links</p>
                      </a>
                    </li>
        </ul>
      </li>
   @endcan

   @can('view users')
 <li class="nav-item has-treeview menu-close">

  <a class="nav-link active">
    <i class="fa-solid fa-users-gear"></i>
    <p>
      Users
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">     
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="fa-regular fa-id-card"></i>
                  <p> Users </p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="fa-solid fa-circle-user"></i>
                  <p> Roles </p>
                </a>
              </li>
    
              <li class="nav-item">     
                <a href="{{route('permissions.index')}}" class="nav-link">
                  <i class="fa-solid fa-unlock-keyhole"></i>
                  <p> Permissions </p>
                </a>
              </li>
            </ul>
          </li>
          @endCan

          
          <li class="nav-item has-treeview menu-close">
            @can('view products')
            <a href="" class="nav-link active">
              <i class="fa-solid fa-couch"></i>
              <p>
               Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @endcan
            <ul class="nav nav-treeview">


              @can('view suppliers')
              <li class="nav-item">
                <a href="{{route('suppliers.index')}}" class="nav-link">
                  <i class="fa-solid fa-plane"></i>
                  <p> Suppliers List </p>
                </a>
              </li>
              @endcan

              @can('view product categories')
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="fa-solid fa-boxes-packing"></i>
                  <p> Product categories List </p>
                </a>
              </li>
           @endcan

              @can('view products')
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="fa-brands fa-product-hunt"></i>
                  <p> Product List </p>
                </a>
              </li>
           @endcan

            @can('view offers')
              <li class="nav-item">
                <a href="{{route('offers.index')}}" class="nav-link">
                  <i class="fa-solid fa-tags"></i>
                  <p> offers List </p>
                </a>
              </li>     
              @endCan
            </ul>
          </li>
      
       
        @can('view stocks')
    <li class="nav-item has-treeview menu-close">
    <a class="nav-link active">
    <i class="fa-solid fa-truck-ramp-box"></i>
    <p>
   Inventory Management
      <i class="right fas fa-angle-left"></i>
    </p>
     </a>

     <ul class="nav nav-treeview">  

              <li class="nav-item">
                <a href="{{route('stock.index')}}" class="nav-link">
                  <i class="fa-solid fa-boxes-stacked"></i>
                  <p> Stock List </p>
                </a>
              </li>
            
            
            </ul>
          </li>
          @endCan

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
