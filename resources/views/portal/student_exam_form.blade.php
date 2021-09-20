@extends('layouts.portal_app')

@section('content')

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Application Form") }} <small>Filteration enabled</small>
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div>
            <h2 style='display:inline'>{{ $exam_title }}</h2><span style='display:inline' class="float-right"><h6>Exam date : {{ date('d M,Y', strtotime($exam_date)) }}</h6></span>
        </div>
        
        <br> 
        <form action="{{ url('save/student/exam/form') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="name" required="required"
                        value="{{ old('name') }}">
                        <span class="form-text text-muted">Please enter name</span>
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="email" required="required"
                        value="">
                        <span class="form-text text-muted">Please enter email number</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label><span class="text-danger">*</span>
                        <input type="password" class="form-control" name="password" required="required"
                        value="{{ old('password') }}">
                        <span class="form-text text-muted">Please enter password</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone:</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="phone" required="required"
                        value="{{ old('phone') }}">
                        <span class="form-text text-muted">Please enter phone</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date Of Birth </label>
                        <input type="text" name="dob" class="form-control form-control-solid"
                        />
                        <span class="form-text text-muted"
                            >Please enter Exam date.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-pill add_category">Submit</button>
                    <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Back</button>
                </div>
            </div>     
        </div>
    </form>

    </div>
  
</div>

@endsection