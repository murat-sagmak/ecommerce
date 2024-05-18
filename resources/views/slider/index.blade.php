@extends('backend.layout.app')

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Slider Table</h4>
            <p class="card-description">
              <a href="{{route('slider.create')}}" class="btn btn-primary">Create</a>
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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @if (!empty($sliders) && $sliders->count() > 0)
                        @foreach ($sliders as $slider)
                            <tr>
                                <td class="py-1">
                                    <img src="{{asset($slider->image)}}" alt="image"/>
                                </td>
                                <td>{{$slider->name}}</td>
                                <td>{{$slider->content ?? ''}}</td>
                                <td>1{{$slider->link}}</td>
                                <td>
                                  <label class="badge badge-{{$slider->status == '1' ? 'success' : 'danger'}}">{{$slider->status == '1' ? 'On' : 'Off'}}</label>
                                  
                                </td>
                                
                                <td class="d-flex">
                                    <a href="{{route('slider.edit',$slider->id )}}" class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{route('slider.destroy',$slider->id )}}" method="POST">
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