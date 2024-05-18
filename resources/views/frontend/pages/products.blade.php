@extends('frontend.layout.layout')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  
                </div>
                <div class="btn-group">                 
                  <form action="{{ route('products') }}" method="GET">
                      <select class="form-control" name="order" onchange="this.form.submit()">
                        <option class="dropdown-item" hidden>Order</option>
                        <option class="dropdown-item" value="name" {{ request()->get('order') == 'name' && request()->get('sort') == 'asc' ? 'selected' : '' }}>A to Z</option>
                        <option class="dropdown-item" value="name" {{ request()->get('order') == 'name' && request()->get('sort') == 'desc' ? 'selected' : '' }}>Z to A</option>
                        <option class="dropdown-item" value="price" {{ request()->get('order') == 'price' && request()->get('sort') == 'asc' ? 'selected' : '' }}>Low to High</option>
                        <option class="dropdown-item" value="price" {{ request()->get('order') == 'price' && request()->get('sort') == 'desc' ? 'selected' : '' }}>High to Low</option>                        
                      </select>
                  </form>
                </div>
              </div>
            </div>
          </div>
      <div class="row">
        <div class="col-lg-12">
          @if (session()->get('success'))
              <div class="alert alert-success">{{session()->get('success')}}</div>
          @endif
        </div>
      </div>
          <div class="row mb-5">
            @if (!empty($products) && $products->count() > 0)
                @foreach ($products as $product)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="{{ route('productdetails', $product->slug) }}">
                                    @if ($product->image)
                                        <img src="{{ $product->image }}" alt="Image placeholder" class="img-fluid">
                                    @endif
                                </a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{ route('productdetails', $product->slug) }}">{{ $product->name }}</a></h3>
                                <p class="mb-0">{{ $product->text }}</p>
                                <p class="text-primary font-weight-bold">{{ $product->price }}</p>
                                <form action="{{route('cart.add')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="product_id" value="{{$product->id}}">
                                  <input type="hidden" name="product_color" value="{{$product->color}}">
                                  <button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
          </div>
        
        
        
        
          <div class="row" data-aos="fade-up">
            {{$products ->withQueryString() ->links('vendor.pagination.bootstrap-5')}}
            {{--<div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div> --}}
          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
              @if (!empty($categories) && $categories->count() > 0)
                        @foreach ($categories->where('cat_up', null) as $category)
                          <li class="mb-1"><a href="{{route($category->slug.'products')}}" class="d-flex"><span>{{$category->name}}</span> <span class="text-black ml-auto">({{$category->getTotalProductCount()}})</span></a></li>
    
                        @endforeach                        
              @endif
            </ul>
          </div>
          <form id="filterForm" action="{{ route('products') }}" method="get">
            <div class="border p-4 rounded mb-4">
                <div class="mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                    <div id="slider-range" class="border-primary"></div>
                    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                    <input type="text" name="priceBetween" id="priceBetween" class="form-control" />
                </div>
        
                @if (!empty($brandLists))
                    @foreach ($brandLists as $brand)
                        <label>
                            <input type="checkbox" name="brand[]" value="{{ $brand }}" 
                                   @if (in_array($brand, request()->input('brand', []))) checked @endif>
                            {{ $brand }}
                        </label><br>
                    @endforeach
                    <button type="submit" class="btn btn-block btn-primary">Filter</button>
                @endif
            </div>
        </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 site-section-heading pt-4">
                  <h2>Categories</h2>
                </div>
              </div>
              <div class="row">
                @if (!empty($categories))
                    @foreach ($categories->where('cat_up', null) as $category)
                      <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                        <a class="block-2-item" href="{{route($category->slug.'products')}}">
                          <figure class="image">
                            <img src="{{$category->image}}" alt="" class="img-fluid">
                          </figure>
                          <div class="text">
                            <span class="text-uppercase">Collections</span>
                            <h3>{{$category->name}}</h3>
                          </div>
                        </a>
                      </div>
                    @endforeach
                @endif
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('customjs')
<script>
     
      var maxprice = "{{$maxprice}}"

      var defaultminprice = "{{request()->min ?? 0}}";
      var defaultmaxprice = "{{request()->max ?? $maxprice}}";

      
      document.getElementById("filterForm").addEventListener("submit", function() {
        // Fiyat aralığı değerini al
        var priceBetweenValue = document.getElementById("priceBetween").value;
        // Hidden input ile değeri formda gönder
        var hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "priceBetween");
        hiddenInput.setAttribute("value", priceBetweenValue);
        this.appendChild(hiddenInput);
    });
    $(document).ready(function(){
    $('#orderList').change(function(){
        var selectedOrder = $(this).val(); // Seçilen sıralama bilgisini al

        // AJAX isteği oluştur
        $.ajax({
            url: 'products', // products rotasına istek yapılacak, gerekirse rotayı düzenleyin
            type: 'GET',
            data: {
                orderList: selectedOrder // seçilen sıralama seçeneğini gönder
            },
            success: function(response){
                // AJAX isteği başarılı olduğunda, gelen veriyi işle ve göster
                console.log(response); // gelen veriyi konsola yazdırma
                var productList = $('#productList');
                productList.empty(); // Önceki ürünleri temizle
                
                // Her bir ürün için liste öğesi oluştur ve productList'e ekle
                response.forEach(function(product){
                    productList.append('<div>' + product.name + '</div>'); // Örneğin, ürün adını kullanarak bir liste öğesi oluşturuyoruz
                });
            },

            error: function(xhr, status, error){
                // AJAX isteği başarısız olduğunda hata işleme
                console.error(error); // hata konsola yazdırma
                // Gerekirse hata durumunda kullanıcıya bilgi vermek için uygun işlemleri yapabilirsiniz
            }
        });
    });
});

    
</script>
@endsection