@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Contact</h4>
                @if ($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                
                <form action="{{route('inbox.update', $inbox->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"  value="{{$inbox->name ?? ''}}" placeholder="Name" readonly>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"  value="{{$inbox->email ?? ''}}" placeholder="Email" readonly>
                  </div>
                  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" value="{{$inbox->subject ?? ''}}" placeholder="Subject" readonly>
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message"  placeholder="Message" rows="3" readonly>{!! $inbox->message ?? '' !!}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    @php
                        $status = $inbox->status ?? '1';
                    @endphp
                    <select name="status" id="status" class="form-control">
                        <option value="0"{{$status == '0' ? 'selected' : ''}}>Off</option>
                        <option value="1" {{$status == '1' ? 'selected' : ''}}>On</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection