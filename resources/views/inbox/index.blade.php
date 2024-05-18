@extends('backend.layout.app')

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Contact Table</h4>
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
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>IP</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @if (!empty($inbox) && $inbox->count() > 0)
                        @foreach ($inbox as $inbox)
                            <tr>
                                <td>{{$inbox->name}}</td>
                                <td>{{$inbox->email ?? ''}}</td>
                                <td>{{$inbox->subject}}</td>
                                <td>{{$inbox->message}}</td>

                                <td>
                                  <label class="badge badge-{{$inbox->status == '1' ? 'success' : 'danger'}}">{{$inbox->status == '1' ? 'On' : 'Off'}}</label>
                                  
                                </td>
                                <td>1{{$inbox->ip}}</td>

                                <td class="d-flex">
                                    <a href="{{route('inbox.edit',$inbox->id )}}" class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{route('inbox.destroy',$inbox->id )}}" method="POST">
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