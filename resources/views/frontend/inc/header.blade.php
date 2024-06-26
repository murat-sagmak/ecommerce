<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="" class="site-block-top-search">
              <span class="icon icon-search2"></span>
              <input type="text" class="form-control border-0" placeholder="Search">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="{{route('home')}}" class="js-logo-clone">{{config('app.name')}}</a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
                <ul>
                    <li class="nav-item nav-profile dropdown">
                      @auth <!-- Kullanıcı oturum açtıysa -->
                          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                              <span class="icon icon-person"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <button type="submit" class="dropdown-item">
                                      <i class="ti-power-off text-primary"></i>
                                      Logout
                                  </button>
                              </form>
                          </div>
                      @else <!-- Kullanıcı oturum açmadıysa -->
                          <a class="nav-link" href="{{ route('login') }}">
                              <span class="icon icon-person"></span>
                              Login
                          </a>
                      @endauth
                  </li>
                
                    <li>
                        <a href="{{ route('cart') }}" class="site-cart">
                            <span class="icon icon-shopping_cart"></span>
                            <span class="count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                        </a>
                    </li>
                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
            </div>
        </div>

        </div>
      </div>
    </div> 
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
        <li class="active"><a href="{{route('home')}}">Home</a></li>
          <li class="has-children">
            <a href="#">Category</a>
            <ul class="dropdown">

              @if (!@empty($categories) && $categories->count() >0)
                @foreach ($categories->where('cat_up', null) as $category)
                  <li class="has-children">
                    <a href="{{route($category->slug.'products')}}">{{$category->name}}</a>
                    <ul class="dropdown">
                      @foreach ($category->subcategory as $subCategory)
                            <li><a href="{{route($category->slug.'products', $subCategory->slug)}}">{{$subCategory->name}}</a></li>
                      @endforeach
                    </ul>
                  </li>      
                @endforeach
              @endif
              
            </ul>
          </li>
          <li>
            <a href="{{route('about')}}">About</a>
          </li>
          <li><a href="{{route('products')}}">Products</a></li>
          
          <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
      </div>
    </nav>
  </header>