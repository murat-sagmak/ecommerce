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
     <form id="paymentForm" method="POST" action="{{route('cart.cartSave')}}">
        @csrf  
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="country" class="text-black">Country <span class="text-danger">*</span></label>
                <select id="country" class="form-control">
                  <option value="1">Select a country</option>    
                  <option value="2" selected>Turkiye</option>    
                  <option value="3">Holland</option>    
                  <option value="4">Poland</option>    
                  <option value="5">Austria</option>    
                  <option value="6">Spain</option>    
                  <option value="7">Germany</option>     
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="name" class="text-black">Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="companyname" class="text-black">Company Name </label>
                  <input type="text" class="form-control" id="companyname" name="companyname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Home/Company Address">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="city" class="text-black">City <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="col-md-6">
                  <label for="zip_code" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="zip_code" name="zip_code">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6">
                  <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="phon" name="phone" placeholder="Phone Number">
                </div>
              </div>


              <div class="form-group">
                <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
                <div class="collapse" id="ship_different_address">
                  <div class="py-2">

                    <div class="form-group">
                      <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
                      <select id="c_diff_country" class="form-control">
                        <option value="1">Select a country</option>    
                        <option value="2" selected>Turkiye</option>    
                        <option value="3">Holland</option>    
                        <option value="4">Poland</option>    
                        <option value="5">Austria</option>    
                        <option value="6">Spain</option>    
                        <option value="7">Germany</option>    
    
                      </select>
                    </div>


                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Company Name </label>
                        <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Home/Company address">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                      </div>
                    </div>

                    <div class="form-group row mb-5">
                      <div class="col-md-6">
                        <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="form-group">
                <label for="note" class="text-black">Order Notes</label>
                <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Your Order</h2>
                    <div class="p-3 p-lg-5 border">
                        <table class="table site-block-order-table mb-5">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach (session()->get('cart') as $key => $cart)
                                    @php
                                        $totalPrice = $cart['price'] * $cart['amount'];
                                        $subtotal += $totalPrice;
                                    @endphp
                                    <tr>
                                        <td>{{$cart['name']}} <strong class="mx-2">x</strong> {{$cart['amount']}}</td>
                                        <td>${{ number_format($totalPrice, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                    <td class="text-black">${{ number_format($subtotal, 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                    <td class="text-black font-weight-bold"><strong>${{ number_format($subtotal, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
        
                        <!-- Payment Options -->
                        <div class="border p-3 mb-3">
                            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
                            <div class="collapse" id="collapsebank">
                                <div class="py-2">
                                        <div class="form-group">
                                            <label for="card_number">Card Number</label>
                                            <input type="text" class="form-control" id="card_number" placeholder="Enter your card number">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="expiry_date">Expiry Date</label>
                                                <input type="text" class="form-control" id="expiry_date" placeholder="MM/YY">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cvv">CVV</label>
                                                <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="submitPaymentBtn">Place Order</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
      
    </div>
  </div>
@endsection

@section('customjs')
<script>
  document.addEventListener("DOMContentLoaded", function() {
      var paymentForm = document.getElementById("paymentForm");
      var submitPaymentBtn = document.getElementById("submitPaymentBtn");

      submitPaymentBtn.addEventListener("click", function(event) {
          event.preventDefault(); // Formun normal submit işlemini engelle
          paymentForm.submit(); // Formu gönder
      });
  });
</script>

  
@endsection

