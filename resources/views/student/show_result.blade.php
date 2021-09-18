@extends('layouts.student_app')

@section('content')

<div class="card card-custom mb-7">
    <!-- <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-star text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Your Result") }} <small>Filteration enabled</small>
            </h3>
        </div>
        
    </div> -->
    <div class="card-body">
       

            <div class="card" style="width: 40rem; " >
                <!-- <img class="card-img-top" src="{{ $persentage<50 ? url('upload/fail.jpg') : url('upload/congrates.jpg') }}" style="height: 16rem; "  alt="Card image cap"> -->
                <div class="card-body">
                    <p class="card-title"> <b> Your Result </b></p>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Exam Name</th>
                            <th>Exam Date</th>
                        </tr>
                        <tr>
                            <td class="text-success">{{ $student_info->name }}</td>
                            <td class="text-success">{{ $student_info->email }}</td>
                            <td class="text-success">{{ $student_info->title }}</td>
                            <td class="text-success">{{$student_info->date}}</td>
                        </tr>
                    </table>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li  class="list-group-item flaticon-star text-success"> <b> Correct Answer </b> <span class="float-right">{{ $result_info->yes_ans }}</span> </li>
                        <li class="list-group-item flaticon-star text-warning"><b> Incorrect Answer </b> <span class="float-right">{{ $result_info['no_ans'] }}</span></li>
                        <li class="list-group-item flaticon-star text-primary"><b> Total marks </b> <span class="float-right">{{ $result_info['yes_ans']+$result_info['no_ans'] }}</span></li>
                        <li class="list-group-item flaticon-star text-primary"><b> Persentage </b> <span class="float-right">{{ $persentage }}</span></li>
                    </ul>
                </div>
                
        </div>

    </div>
  
</div>

@endsection