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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @if (!empty($categories) && $categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td class="py-1">
                                  <img src="{{asset($category->image)}}" alt="image"/>
                                </td>
                                <td>{{$category->name}}</td>
                                <td>{{ $category->$category->name ?? ''}}</td>
                                
                                <td>
                                  <label class="badge badge-{{$category->status == '1' ? 'success' : 'danger'}}">{{$category->status == '1' ? 'On' : 'Off'}}</label>
                                  
                                </td>
                                
                                <td class="d-flex">
                                    <a href="{{route('category.edit',$category->id )}}" class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{route('category.destroy',$category->id )}}" method="POST">
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