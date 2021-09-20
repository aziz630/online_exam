@extends('layouts.student_app')

@section('content')

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-star text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Your Result") }} <small>Filteration enabled</small>
            </h3>
        </div>
        <div class="card-toolbar">
            <a
                href=""
                class="btn btn-primary font-weight-bolder" onclick="window.print();"
            >
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px"
                        height="24px"
                        viewBox="0 0 24 24"
                        version="1.1"
                    >
                        <g
                            stroke="none"
                            stroke-width="1"
                            fill="none"
                            fill-rule="evenodd"
                        >
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000"
                                opacity="0.3"
                            />
                        </g>
                    </svg>
                    <!--end::Svg Icon--> </span
                >download Result</a
            >
            <!--end::Button-->
        </div>
    </div>
    
    <div class="card-body">
       

            <div class="card" style="width: 40rem; " >
                <!-- <img class="card-img-top" src="{{ $persentage<50 ? url('upload/fail.jpg') : url('upload/congrates.jpg') }}" style="height: 16rem; "  alt="Card image cap"> -->
                <div class="card-body">
                    <!-- <p class="card-title"> <b> Your Result </b></p> -->
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