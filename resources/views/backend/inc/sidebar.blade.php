<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
      <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
          </a>
      </li>
      <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-orders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('order.index')}}">Orders</a></li>
                </ul>
            </div>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-slider" aria-expanded="false" aria-controls="ui-slider">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Slider</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-slider">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('slider.index')}}">Slider</a></li>
              </ul>
          </div>
      </li>

      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-category">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-category">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">Category</a></li>
              </ul>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-item" aria-expanded="false" aria-controls="ui-item">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Item</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-item">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('item.index')}}">Item</a></li>
            </ul>
        </div>
    </li>

      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-inbox" aria-expanded="false" aria-controls="ui-inbox">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Inbox</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-inbox">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('inbox.index')}}">Inbox</a></li>
              </ul>
          </div>
      </li>
  </ul>
</nav>
