@extends('frontend.layout.layout')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{route('home')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{!! $product->name !!}</strong></div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          @if (session()->get('success'))
              <div class="alert alert-success">{{session()->get('success')}}</div>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset($product->image) }}" alt="{{$product->name}}" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$product->name ?? ''}}</h2>
          {!! $product->content ?? '' !!}
          <p><strong class="text-primary h4">{{$product->price ?? ''}}</strong></p>
          <form action="{{route('cart.add')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="mb-1 d-flex">
              <label for="option-w" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-w" name="color" {{$product->color == 'White' ? 'checked' : ''}} value="White"></span> <span class="d-inline-block text-black">White</span>
              </label>
              <label for="option-b" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-b" name="color" {{$product->color == 'Black' ? 'checked' : ''}} value="Black"></span> <span class="d-inline-block text-black">Black</span>
              </label>
              <label for="option-g" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-g" name="color" {{$product->color == 'Gray' ? 'checked' : ''}} value="Gray"></span> <span class="d-inline-block text-black">Gray</span>
              </label>
              <label for="option-r" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-r" name="color" {{$product->color == 'Red' ? 'checked' : ''}} value="Red"></span> <span class="d-inline-block text-black"> Red</span>
              </label>
            </div>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" name="amount" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>
            </div>
            <p><button type="submit" class="buy-now btn btn-sm btn-primary">Add to Cart</button></p>
        </form>
        </div>
      </div>
    </div>
  </div>
  @if (!empty($products) && $products->count()>0)
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
                  @foreach ($products as $product)
                    <div class="item">
                      <div class="block-4 text-center">
                        <figure class="block-4-image">
                          <img src="{{ asset($product->image) }}" alt="{{$product->name}}" class="img-fluid">
                        </figure>
                        <div class="block-4-text p-4">
                          <h3><a href="{{route('productdetails',$product->slug)}}">{{$product->name}}</a></h3>
                          <p class="text-primary font-weight-bold">{{$product->price}}</p>
                        </div>
                      </div>
                    </div>
                  @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection