@extends('frontend.layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h2 class="text-black">Payment Page</h2>
        </div>
        <div class="col-md-6">
            <h4>Items to be Paid:</h4>
            <ul>
                @foreach ($cartItems as $item)
                    <li>{{ $item['name'] }} - ${{ $item['price'] }}</li>
                @endforeach
            </ul>
            <h4>Total Amount: ${{ $totalPrice }}</h4>

            <form action="{{ route('payment.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" class="form-control @error('card_number') is-invalid @enderror" id="card_number" name="card_number" required>
                    @error('card_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="expiry_date">Expiry Date</label>
                    <input type="text" class="form-control @error('expiry_date') is-invalid @enderror" id="expiry_date" name="expiry_date" required>
                    @error('expiry_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control @error('cvv') is-invalid @enderror" id="cvv" name="cvv" required>
                    @error('cvv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Pay</button>
            </form>
        </div>
    </div>
</div>
@endsection
