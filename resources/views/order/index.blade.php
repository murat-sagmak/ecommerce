@extends('backend.layout.app')

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category Table</h4>
            <p class="card-description">
              <a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
            </p>
            @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Content</th>
                    <th>Amount</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @if (!empty($orders) && $orders->count() > 0)
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{ $order->email ?? ''}}</td>
                                <td>{{ $order->phone ?? ''}}</td>
                                <td>{{ $order->address ?? ''}}</td>
                                <td>{{ $order->content ?? ''}}</td>
                                <td>{{ $order->orders_count ?? ''}}</td>

                                <td class="d-flex">
                                    <a href="{{route('order.edit',$order->id )}}" class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{route('category.destroy',$order->id )}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr> 
                        @endforeach
                        
                    @endif
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection