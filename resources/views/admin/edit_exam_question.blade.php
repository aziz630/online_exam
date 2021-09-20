@extends('layouts.app')

@section('content')

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Edit Exam Question") }} <small>Filteration enabled</small>
            </h3>
        </div>
       
        
    </div>
    <div class="card-body">
        <form action="{{ url('update/exam/question') }}" method="post" >
           @csrf
            <div class="container-fluid">
                <div class="row">
                <input type="hidden" name="id" value="{{ $editQuestion[0]['id'] }}">
                    <div class="col-sm-12">
                        <label for="recipient-name" class="col-form-label">Enter Question:</label>
                        <input type="text" class="form-control" name="question" required="required" placeholder="Enter Exam Name"
                        value="{{ $editQuestion[0]['questions'] }}">
                        <span class="form-text text-muted">Please enter Question</span>
                    </div>
                </div>
                <?php 
                    $options = json_decode($editQuestion[0]['options'])
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="recipient-name" class="col-form-label">Enter Option 1:</label>
                        <input type="text" class="form-control" name="option1" required="required" value="{{ $options->option1 }}">
                        <span class="form-text text-muted">Please enter exam name</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="recipient-name" class="col-form-label">Enter Option 2:</label>
                        <input type="text" class="form-control" name="option2" required="required" value="{{ $options->option2 }}">
                        <span class="form-text text-muted">Please enter Option 2</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="recipient-name" class="col-form-label">Enter Option 3:</label>
                        <input type="text" class="form-control" name="option3" required="required" value="{{ $options->option3 }}">
                        <span class="form-text text-muted">Please enter Option 3</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="recipient-name" class="col-form-label">Enter Option 4:</label>
                        <input type="text" class="form-control" name="option4" required="required" value="{{ $options->option4 }}">
                        <span class="form-text text-muted">Please enter Option 4</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="recipient-name" class="col-form-label">Enter Right Answer:</label>
                        <input type="text" class="form-control" name="answer" required="required" value="{{ $editQuestion[0]['ans'] }}">
                        <span class="form-text text-muted">Please enter Right Answer</span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-pill">Update</button>
                    <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">cancle</button>
                </div>
            </div>   
        </form>
    </div>
</div>

@endsection