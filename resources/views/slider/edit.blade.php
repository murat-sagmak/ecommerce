@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Slider</h4>
                @if ($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @php
                  $routeName = !empty($slider->id) ? 'slider.update' : 'slider.store';
                  $routeParameters = !empty($slider->id) ? ['id' => $slider->id] : [];
                  $route = route($routeName, $routeParameters);
                @endphp    
                <form action="{{$route}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if (!empty($slider->id))
                      @method('PUT')
                  @endif
                  <div class="form-group">
                    <div class="input-group col-xs-12">
                      <img src="{{asset($slider->image ?? 'image')}}" alt="">
                    </div>
                  </div>
                  <div class="form-group">
                        <label>Image upload</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$slider->name ?? ''}}" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Content" rows="3">{!! $slider->content ?? '' !!}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="name">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{$slider->link ?? ''}}" placeholder="Link">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    @php
                        $status = $slider->status ?? '1';
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