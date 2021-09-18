@extends('layouts.portal_app')

@section('content')


<!--begin::Dashboard-->
    <!--begin::Row-->
    @include('alerts.alerts')
    <div class="row">
        <div class="col-lg-12 col-xxl-8">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">Exams</h3>
                   
                </div>

                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 100px"></div>
                    <!--end::Chart-->
                    <!--begin::Stats-->
                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            @foreach($exams as $key => $exam)
                                
                            <?php 
                            $var = $key+1;
                            $currentDate = strtotime(date('m/d/y'));
                            $examDate = strtotime($exam['date']);

                            if($currentDate > $examDate)
                            {
                                $color = 'bg-danger';
                                $textColor = 'text-light-danger';

                            }
                            else
                            {

                                if($var%2 == 0){
                                    $color = 'bg-light-warning';
                                    $textColor = 'text-warning';
                                }else{
                                    $color = 'bg-light-success';
                                    $textColor = 'text-success';
                                }
                            }

                            ?>
                            <div class="col-md-4">
                                <div class="col {{ $color }} px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                    <h3 class="{{ $textColor }} font-weight-bold font-size-h3">{{ $exam['title'] }}</h3>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="#" class="{{ $textColor }} font-weight-bold font-size-h6">{{ $exam['date'] }}</a>
                                    <!-- <p>{{ $exam['date'] }}</p> -->
                                    <hr>
                                    @if($currentDate <= $examDate)
                                    <a class="float-right"  href="{{ url('student/exam/form', $exam['id']) }}">more info <i class="fa fa-arrow-circle-right"></i></a>
                                    @else
                                    <a class="float-right {{ $textColor }}">This exam is Ended</a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                        <!--end::Row-->
                      
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
        
       
        
      
       
    </div>
    <!--end::Row-->

    <!--end::Dashboard-->


@endsection()