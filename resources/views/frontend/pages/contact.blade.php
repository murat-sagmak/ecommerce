@extends('frontend.layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title text-center mb-0">Get In Touch</h5>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    @if (count($errors))
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif

                    <form action="{{ route('contact.save') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="c_fname" class="text-primary">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_fname" name="name">
                        </div>
                        <div class="form-group">
                            <label for="c_lname" class="text-primary">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_lname" name="lname">
                        </div>
                        <div class="form-group">
                            <label for="c_email" class="text-primary">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="c_email" name="email" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="c_subject" class="text-primary">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_subject" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="c_message" class="text-primary">Message <span class="text-danger">*</span></label>
                            <textarea name="message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
