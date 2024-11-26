<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer  text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand bg-gradient-primary m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <img src="../adminmate/assets/img/eshop-logo.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">E-shop</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white  {{ Request::is('dashboard')? 'active':'' }}" href="{{ url('dashboard') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">notifications</i>
          </div>
          <span class="nav-link-text ms-1">Notifications</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white  {{ Request::is('categories')? 'active':'' }} " href="{{ url('categories') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">list</i>
          </div>
          <span class="nav-link-text ms-1">Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('add-category')? 'active':'' }} " href="{{ url('add-category') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">category</i>
          </div>
          <span class="nav-link-text ms-1">Add Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white  {{ Request::is('products')? 'active':'' }} " href="{{ url('products') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">inventory</i>
          </div>
          <span class="nav-link-text ms-1">Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('add-product')? 'active':'' }} " href="{{ url('add-products') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">shopping_cart</i>
          </div>
          <span class="nav-link-text ms-1">Add Product</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('orders')? 'active':'' }} " href="{{ url('orders') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">content_paste</i>
          </div>
          <span class="nav-link-text ms-1">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('users')? 'active':'' }} " href="{{ url('users') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">people</i>
          </div>
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a class="nav-link text-white" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">logout</i>
          </div>
          <span class="nav-link-text ms-1">Logout</span>
        </a>
      </li>

    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
      <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div>
  </div>
</aside>