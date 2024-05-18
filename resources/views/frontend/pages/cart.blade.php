@extends('frontend.layout.layout')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{route('home')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-12">
          @if (session()->get('success'))
              <div class="alert alert-success">{{session()->get('success')}}</div>
          @endif
        </div>
      </div>
      <div class="row mb-5">
          <div class="col-lg-12 site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                @if ($cartItem)
                  @foreach ($cartItem as $key => $cart)
                    <tr>
                      <td class="product-thumbnail">
                        <img src="{{asset($cart['image'])}}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">{{$cart['name'] ?? ''}}</h2>
                      </td>
                      <td>{{$cart['price']}}</td>
                      <td>
                        <form class="quantity-update" action="{{ route('cart.add') }}" method="POST">
                          @csrf
                          <input type="hidden" name="product_id" value="{{$key}}">
                          <input type="hidden" name="initial_amount" value="{{$cart['amount']}}">
                          <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                              <button class="btn btn-outline-primary js-btn-action" type="button" data-action="minus" data-key="{{$key}}">&minus;</button>
                            </div>
                            <input type="number" class="form-control text-center cart-amount" name="amount" value="{{$cart['amount']}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                              <button class="btn btn-outline-primary js-btn-action" type="button" data-action="plus" data-key="{{$key}}">&plus;</button>
                            </div>
                          </div>
                        </form>
                      </td>
                      <td>{{$cart['price'] * $cart['amount']}}</td>
                      <td>
                        <form action="{{route('cart.delete')}}" method="POST">
                          @csrf
                          <input type="text" hidden name="product_id" value="{{$key}}">
                          <button type="submit" class="btn btn-primary btn-sm">X</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
              <button id="updateCartBtn" class="btn btn-primary btn-sm btn-block">Update Cart</button>
            </div>
            <div class="col-md-6">
              <button  class="btn btn-outline-primary btn-sm btn-block" onclick="window.location.href='products'">Continue Shopping</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">{{$totalPrice}}</strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg py-3 btn-block paymentButton">Proceed To Checkout</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('customjs')
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Update Cart button'a olay dinleyicisi ekleme
  document.getElementById('updateCartBtn').addEventListener('click', function (event) {
    // Prevent default button behavior
    event.preventDefault();

    // Set input values to their current displayed values
    document.querySelectorAll('.cart-amount').forEach(function(input) {
      input.setAttribute('value', input.value);
    });

    // Submit the form when the button is clicked
    document.querySelectorAll('form.quantity-update').forEach(function(form) {
      form.submit();
    });
  });

  // Artırma ve azaltma işlemleri için tek bir olay dinleyicisi
  document.querySelectorAll('.js-btn-action').forEach(function(button) {
    button.addEventListener('click', function() {
      var input = this.closest('.input-group').querySelector('.cart-amount');
      var currentValue = parseInt(input.value);
      var action = this.dataset.action;
      
      if (action === 'minus' && currentValue === 1) {
        var form = this.closest('form');
        form.submit();
        return; // Bu noktada işlemi sonlandırın, diğer işlemleri yapmayın
      }

      if (action === 'plus') {
        input.value = currentValue + 1;
      } else if (action === 'minus' && currentValue > 0) {
        input.value = currentValue - 1;
      }

      // Değeri güncelle
      input.setAttribute('value', input.value);
    });
  });

  document.querySelector('.paymentButton').addEventListener('click', function(e) {
    e.preventDefault();

    // Construct the URL with query parameters
    var url = "{{ route('cart.bill') }}?";
    var params = [];

    @foreach ($cartItem as $key => $cart)
      var amount = document.querySelector('input[name="amount"][value="{{$cart['amount']}}"]').value;
      params.push(`cart[{{$key}}][product_id]=${encodeURIComponent('{{$key}}')}`);
      params.push(`cart[{{$key}}][amount]=${encodeURIComponent(amount)}`);
    @endforeach

    // Redirect to the constructed URL
    window.location.href = url + params.join('&');
  });
});
</script>
@endsection
