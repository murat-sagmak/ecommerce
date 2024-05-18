@extends('backend.layout.app')

@section('content')
<div class="content-wrapper">

    <div class="row">
      
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-12 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Month Total Count </p>
                <p class="fs-30 mb-2">{{isset($monthTotalCount)}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Mount Total Price</p>
                <p class="fs-30 mb-2">{{isset($monthTotalPrice)}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Total Count</p>
                <p class="fs-30 mb-2">{{isset($TotalCount)}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-12 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Total Price</p>
                <p class="fs-30 mb-2">{{isset($TotalPrice)}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection