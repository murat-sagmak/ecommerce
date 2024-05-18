@extends('frontend.layout.layout')
@section('content')
    
<div class="site-blocks-cover" style="background-image: url({{asset($slider->image)}});" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">{{$slider->name ?? __('Hello')}}</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">{{$slider->content ?? ''}}</p>
              <p>
                <a href="{{url('/').'/'.$slider->link}}" class="btn btn-sm btn-primary">Our Products</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="{{$about->shipping_icon}}"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">{{$about->shipping}}</h2>
              <p>{!! $about->shipping_content !!}</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="{{$about->returning_icon}}"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">{{$about->returning}}</h2>
              <p>{!! $about->returning_content !!}</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="{{$about->support_icon}}"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">{{$about->support}}</h2>
              <p>{!! $about->support_content !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="{{route('smartproducts')}}">
              <figure class="image">
                <img src="images/smartphone.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Smart Phones & Smart Watches</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="{{route('computersproducts')}}">
              <figure class="image">
                <img src="images/laptop.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Laptops and Computers</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="{{route('homesproducts')}}">
              <figure class="image">
                <img src="images/homeapp.jpg" alt="" class="img-fluid" width="500">
              </figure>
              <div class="text">
                <h3>Home appliances & Living</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              @if (!empty($featuredproducts) && $featuredproducts->count()>0)
              @foreach ($featuredproducts as $item)
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{asset($item->image)}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="{{route('products')}}">{{$item->name}}</a></h3>
                    <p class="text-primary font-weight-bold">{{$item->price}}</p>
                  </div>
                </div>
              </div>
              @endforeach     
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Discount!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="{{route('products')}}"><img src="images/electronics.jpeg" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2>50% less in all items</h2>
            <p>Buy Right Now</p>
            <p><a href="{{route('discountproducts')}}" class="btn btn-primary btn-sm">Shop Now</a></p>
          </div>
        </div>
      </div>
    </div>



@endsection