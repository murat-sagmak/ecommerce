@extends('frontend.layout.layout')

@section('content')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">About</strong></div>
      </div>
    </div>
  </div>  

  <div class="site-section border-bottom" data-aos="fade">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6">
          <div class="block-16">
            <figure>
              <img src="{{$about->image ?? 'images/x-kom_logo.png'}}" alt="Image placeholder" class="img-fluid rounded">

            </figure>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
          
          <h1 class="text-black">{{$about->name}}</h1>

          <div class="site-section-heading pt-3 mb-4">
            <h3 class="text-black">About</h3>
            <p><strong>x-kom</strong> is a technology retail company founded in 2002 with the goal of providing technology enthusiasts with the latest and highest quality products. Our mission is to make technology shopping a delightful and easy experience by offering a wide range of products, competitive prices, and excellent customer service.</p>

          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
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
@endsection