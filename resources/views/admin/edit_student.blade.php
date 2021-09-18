@extends('layouts.app')

@section('content')

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Edit Student") }} <small>Filteration enabled</small>
            </h3>
        </div>
       
        
    </div>
    <div class="card-body">
      
        <form action="{{ url('update/Student', $students->id) }}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="name" required="required" value="{{ $students->name }}"
                        value="{{ old('name') }}">
                        <span class="form-text text-muted">Please enter name</span>
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="email" required="required" value="{{ $students->email }}"
                        value="{{ old('email') }}">
                        <span class="form-text text-muted">Please enter email number</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label><span class="text-danger">*</span>
                        <input type="password" class="form-control" name="password" required="required" value="{{ $students->password }}"
                        value="{{ old('password') }}">
                        <span class="form-text text-muted">Please enter password</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone:</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="phone" required="required" value="{{ $students->phone }}"
                        value="{{ old('phone') }}">
                        <span class="form-text text-muted">Please enter phone</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date Of Birth </label>
                        <input type="text" name="date" class="form-control form-control-solid" value="{{ $students->dob }}"
                        />
                        <span class="form-text text-muted"
                            >Please enter Exam date.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Exam:</label><span class="text-danger">*</span>
                        <select name="exam" class="form-control form-control-solid"
                        >
                            <option>Select exam</option>

                            @foreach($exams as $exam)
                            <option <?php if($students->exam == $exam->id) { echo 'selected'; }?>
                                value="{{ $exam->id }}" 
                                >{{ $exam->title }}</option
                            >
                            @endforeach
                        </select>
                        <span class="form-text text-muted">Please select Exam.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-pill">Update</button>
                    <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Back</button>
                </div>
            </div>     
        </div>
    </form>

    </div>
  
</div>

@endsection